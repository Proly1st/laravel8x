<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function __construct(){

    }
    public function index(){
        
         return view('categories');
        
        //  return view('products');
    }

    public function Product(){
        return view('products');
    }

    public function  Categories(){
        return view('categories');
    }
}
