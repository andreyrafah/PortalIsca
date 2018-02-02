<?php
namespace Isca\Repositories;

    class Geo 
    {
        public $ipaddress ='';
        public $location = '';
        public $browser = '';

         public function setIPAddress()
         {
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $this->ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $this->ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $this->ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $this->ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $this->ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $this->ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $this->ipaddress = 'UNKNOWN';
         }

        public function getClientIP() { 
            $this->setIPAddress();
            return $this->ipaddress;
        }

        public function setLocation(){
            $this->getClientIP();
            $this->location = file_get_contents("https://ipinfo.io/".$this->ipaddress."/json");
        }

        public function getLocation(){
            $this->setLocation();
            return $this->location;
        }

        public function setBrowser() {
		    $ip = $this->ipaddress;

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
		        }
		        else {
		            $version= $matches['version'][1];
		        }
		    }
		    else {
		        $version= $matches['version'][0];
		    }

		    // check if we have a number
		    if ($version==null || $version=="") {$version="?";}

		    $this->browser = array(
		            'userAgent' => $u_agent,
		            'name'      => $bname,
		            'version'   => $version,
		            'platform'  => $platform,
		            'pattern'    => $pattern
		    );
		   
		}

		public function getBrowser(){
			$this->setBrowser();
			return $this->browser;
		}
    }

?>