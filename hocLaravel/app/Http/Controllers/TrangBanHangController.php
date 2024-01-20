<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
class TrangBanHangController extends Controller
{
    public function index(){
        return view('trangbanhang');
    }

    public function showProductSale(){
        try{
            $product = Product::where('status',1)
            ->orderByDesc('id')->limit(15)->get();

            $response =[
                'status'=> 200,
                'message'=>'success',
                'data'=>$product,
            ];
           

        }catch(Exception $ex){
            $reposponse=[
                'status' =>500,
                'message' =>$ex->getMessage(),
                'data' =>null
            ];
          
        } 
        return $response;
    }
}
