<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function index(){
        // $response = new Response;
        // $response->withCookie(
        //     'name1',
        //     'laravel',
        //     1
        // );
        return view('cookie');
    }

    public function getCookie(Request $request){
 
        return $request->cookie('input1Value');

    }
}
