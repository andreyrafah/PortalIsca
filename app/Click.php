<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class click extends Model
{

    public $browser = '';
    public $location = '';
    public $socket;
	public $error;
	//public $amiHost = "200.160.122.65";
	public $amiHost = "192.168.1.221";
	public $amiPort = "5038";
	public $amiUsername = "clicktocall";
	public $amiPassword = "cp1145rmvnz";

    public function link(){
    	return $this->belongsTo('App\Link');
    }

    public function __construct()
    {
        $this->socket = false;
        $this->error = "";
        
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $this->ip = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $this->ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $this->ip = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $this->ip = $_SERVER['REMOTE_ADDR'];
        else
            $this->ip = 'UNKNOWN';

        $this->ip = '177.79.68.25';
        $this->location = file_get_contents("https://ipinfo.io/".$this->ip."/json");
        $this->location = json_decode($this->location);
        $this->cidade       = $this->location->city;
        $this->uf           = $this->location->region;
        $this->pais         = $this->location->country;
        $this->coordenadas  = $this->location->loc;

        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'Linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'Mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'Windows';
        }


        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/AppleWebKit/i',$u_agent))
        {
            $bname = 'AppleWebKit';
            $ub = "Opera";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }

        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
        }


        $i = count($matches['browser']);
        if ($i != 1) {
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }/*
            else {
                $version= $matches['version'][1];
            }*/
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        $this->navegador    =   $bname;
        $this->so           =   $platform;
        $this->browser = array(
                'userAgent' => $u_agent,
                'name'      => $bname,
                'version'   => $version,
                'platform'  => $platform,
                'pattern'    => $pattern
        );
       
    }

    public function Login() {

       
		$this -> socket = fsockopen($this -> amiHost,$this -> amiPort, $errno, $errstr, 1);
		if (!$this -> socket) {
			$this -> error =  "Could not connect: $errstr ($errno)";
			return false;
		}else{
			stream_set_timeout($this -> socket, 1);
			$amiUsername = $this -> amiUsername;
			$amiPassword = $this -> amiPassword;
			$wrets = $this -> Q("Action: Login\r\nUserName: $amiUsername\r\nSecret: $amiPassword\r\nEvents: off\r\n\r\n");
			if (strpos($wrets, "Message: Authentication accepted") !== false) {
				return true;
			}else{
				$this -> error = "Could not login: Authentication failed.";
				fclose($this -> socket); 
				$this -> socket = false;
				return false;
			}
		}
	}
	
	public function Logout() {
        
		$wrets = "";
		if ($this -> socket) {
			fputs($this -> socket, "Action: Logoff\r\n\r\n");
			while (!feof($this -> socket)) {
				$wrets .= fread($this -> socket, 4096);
			}
			fclose($this -> socket);
			$this -> socket = false;
		}
		return; 
	}

	public function SendSMS($canal,$numero,$mensagem){
		if ($this -> socket === false) {
			$this -> error = "No connection.";
			return false;
		}

		$r = $this->Q("Action: KSendSMS\r\nDevice:$canal\r\nDestination:$numero\r\nLinefeed: true\r\nEncoding:16\r\nMessage:$mensagem\r\nConfirmation: true\r\n\r\n");
		$r = explode("\r\n", $r);
		for ($i=0; $i < count($r); $i++) { 
			$rr = explode(":", $r[$i]);
			if($rr[0] <> null)
				$dados[$rr[0]] = trim($rr[1]);
		}
		return $dados;

	}

	public function clicktocall($numero,$queue,$callerid){

		if ($this -> socket === false) {
			$this -> error = "No connection.";
			return false;
		}

		$r = $this->Q("Action: Originate\r\nChannel: Local/$queue@from-internal\r\nContext: from-internal\r\nExten: $numero\r\nCallerid: $callerid\r\nPriority: 1\r\n\r\n");
		$r = explode("\r\n", $r);
		for ($i=0; $i < count($r); $i++) { 
			$rr = explode(":", $r[$i]);
			if($rr[0] <> null)
				$dados[$rr[0]] = trim($rr[1]);
		}
        return $dados;

	}
	
	public function Q($query) {
		$wrets = "";
		if ($this -> socket === false) {
			$this -> error = "No connection.";
			return false;
		}	
		fputs($this -> socket, $query);
		do {
			$line = fgets($this -> socket, 4096);
			$wrets .= $line;
			$info = stream_get_meta_data($this -> socket);
		} while ($line != "\r\n");
			return $wrets;
	}

	public function Reload() {
		$query = "Action: Command\r\nCommand: Reload\r\n\r\n";
		$wrets = "";
		
		if ($this -> socket === false) {
			$this -> error = "No connection.";
			return false;
		}
			
		fputs($this -> socket, $query);
		do
		{
			$line = fgets($this -> socket, 4096);
			$wrets .= $line;
			$info = stream_get_meta_data($this -> socket);
		}while ($line != "\r\n" && $info["timed_out"] === false );
		return $wrets;
	}
	
	public function GetError() {
		return $this -> error;
	}


}
