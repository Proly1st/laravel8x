<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function index(){
        return view('product-cart');
    }

    public function showCart(Request $request){
        try{ 
            $productIDs = $request->input('productIDs');
            $products = Product::whereIn('id', $productIDs)->get();
            $response=[
                'status'=>200,
                'message'=>'Success query products',
                'data'=> $products
            ];
            
        }catch(Exception $ex){
            $response=[
                'status'=>500,
                'message'=> $ex->getMessage(),
                'data'=>null
            ];
        }
       
        return $response;
       
    }
}
