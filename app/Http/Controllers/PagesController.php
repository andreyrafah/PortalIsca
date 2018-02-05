<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function error(Request $request)
    {
        return 'Minha página de erro com controller'; 
    }
}
