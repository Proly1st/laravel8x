<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){

    }
    public function index(){
        
        $categories = DB::table('categories')->orderByDesc('created_at')->get();
        $products = DB::table('products')->orderByDesc('created_at')->get();
        
        return view('products',['categ' => $categories, 'queryProducts'=>$products]);
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
      
        $categories = DB::table('categories')->orderByDesc('created_at')->get();
        // dd($categories);
        return view('categories', ['categ' => $categories]);
    }

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
