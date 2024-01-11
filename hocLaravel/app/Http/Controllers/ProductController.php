<?php


namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  
    public function index(){
        
        
        return view('products');
    }


    public function  Categories(){
        return view('categories');
    }

    
    // ham them category
    public function addCategories(Request $request){
        try {
            $cate = new Categories;
            $cate->name = $request -> get('nameCategory'); 
            $cate->description= $request -> get('decript');
            $cate->status = $request -> get('statuss');
            $cate->created_at =NOW();
            $cate->updated_at =NOW();

             $cate->save();
            $response=[
                'message'=>200,
                'status'=>'success',
                'data'=>$request,
            ];

        return $response;

        }catch(Exception $ex){
            $response =[
                'status' => 500,
                'message' => $ex->getMessage(),
                'data' => null,
            ];
            return $response;
        }
 
    }

    // ham sửa categories
    public function editCategories(Request $request){
        try {
            $cate = new Categories;
            $cate->name = $request -> get('nameCategory'); 
            $cate->description= $request -> get('decript');
            $cate->status = $request -> get('statuss');
            $cate->created_at =NOW();
            $cate->updated_at =NOW();

            $cate->save();
            $response=[
                'message'=>200,
                'status'=>'success',
                'data'=>$request,
            ];

        return $response;

        }catch(Exception $ex){
            $response =[
                'status' => 500,
                'message' => $ex->getMessage(),
                'data' => null,
            ];
            return $response;
        }
 
    }

    // hàm trả về category
    public function showCategories(){
        try{
        $categories = Categories::orderByDesc('id')->get();
       //cau truc tra ve
        $response = [
            'status' => 200,
            'message' => 'success',//thong tin muon tra ve
            'data' => $categories,

        ];
        return $response;
        }
        catch (Exception $ex){
            //200 thành công
            //400 server k chấp nhận nhưng vẫn thành công
            //500 controller bị lỗi
            $response = [
                'status' => 500,
                'message' => $ex->getMessage(),//thong tin muon tra ve
                'data' => null

            ];
            return $response;
        }
       
    }

    // ham show product
    public function showProduct(){
        try{
            $product = Product::orderByDesc('id')->get();
            $response =[
                'status'=> 200,
                'message'=>'success',
                'data'=>$product,
            ];
            return $response;

        }catch(Exception $ex){
            $reposponse=[
                'status' =>500,
                'message' =>$ex->getMessage(),
                'data' =>null
            ];
            return $reposponse;
        }

    }

    // ham them product
    public function AddProduct(Request $request){
       
        if ($request->hasFile('image')) {
            $product = new Product();

            $image = $request->file('image')->store('public/images');
            $product->image  = Storage::url($image);
            $product->name = $request->get('name');
            $product->category_id = $request->get('id_category');
            $product->inventory = $request->get('inventory');
            $product->description = $request->get('description');
            $product->status = $request->get('status');
            $product->price = $request->get('price');
            $product->promotion = '1';
            $product->promotion_type = 'khuyến mãi';
            $product->created_at = NOW();
            $product->updated_at = NOW();
            $product->save();
            return true;
        } else {
            return false;

        }
    

    }

}
