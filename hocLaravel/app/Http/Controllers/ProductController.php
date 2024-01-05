<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(){

    }
    public function index(){
        
        //  return view('categories');
        
         return view('products');
    }

    public function Product(){
        return view('products');
    }

    public function  Categories(){
        return view('categories');
    }

    public function AddCategories(Request $request){
        $nameCategory = $request -> get('nameCategory');
        $decript = $request -> get('decript');
        $statuss = $request -> get('statuss');


        $query = " INSERT INTO categories (name, description, status,created_at, updated_at)
        VALUES (?, ?,?, NOW(), NOW()) ";

        DB::insert($query, [$nameCategory, $decript ,$statuss]);
        return 'Category added successfully!';
    }
    
    public function showCategories(){
      
        $categories = DB::table('categories')->get();
        // dd($categories);
        return view('categories', ['categ' => $categories]);
    }

}
