<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    // ham tao moi don hang
    public function saveOrder(Request $request){
        try{

            $selectProducts = $request->get('selectedProducts');

            // tạo instance mới để thêm vào order
            $order = new Order();
            $order->customer_name =  $request->get('name');
            $order->prefix_name =Str::slug(Str::lower($request->get('name')),'');
            $order->customer_phone = $request->get('phone');
            $order->customer_addres = $request->get('address');
            $order->total_price = $request->get('total_price');
            $order->total_quantity = $request->get('quantityProducts');
            $order->status = 1;
            $order->save();

            foreach( $selectProducts as $a){
                $order_detail = new Order_detail();
                $order_detail->order_id = $order->id; // gắn liên kết với id của order
                $order_detail->product_id =  $a['id'];
                $order_detail->quantity  = $a['quantity'];
                $order_detail->original_price = $a['price'];
                $order_detail->price = $a['original_price'];
                $order_detail->total_price = $a['total_priceProduct'];
                $order_detail->save();
            }
            $response =[
                'status'=> 200,
                'message'=> 'success',
                'data'=> $request->all(),
            ];
        }catch(Exception $ex){
            $response =[
                'status'=> 500,
                'message'=> $ex->getMessage(),
                'data'=> null,
            ];
        }
        return $response;
    }
}
