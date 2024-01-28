<?php


namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

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
            $name = $request -> get('nameCategory');
            $exitstingCategory = Categories::where('name',$name)->first();
            if($exitstingCategory){
                $response = [
                    'status' => 500,
                    'message' => 'Tên danh mục đã tồn tại',
                    'data' => $name
                ];
                 return $response;

            }

            $cate = new Categories;
            $cate->name = $name;
            $cate->description= $request -> get('decript');
            $cate->status = $request -> get('statuss');
            $cate->created_at =NOW();
            $cate->updated_at =NOW();

            $cate->save();
            $response=[
                'status'=>200,
                'message'=>'success',
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

            $name = $request -> get('nameCategory');
            $exitstingCategory = Categories::where('name',$name)->first();
            if($exitstingCategory && $exitstingCategory !== $request->get('cateID')  ){
                $response = [
                    'status' => 500,
                    'message' => 'Tên danh mục đã tồn tại',
                    'data' => $name
                ];
                 return $response;

            }

            $cate =  Categories::findOrFail($request->get('cateID'));
            $cate->name = $name;
            $cate->description= $request -> get('decript');
            $cate->status = $request -> get('statuss');
            $cate->created_at =NOW();
            $cate->updated_at =NOW();

            $cate->save();
            $response=[
                'status'=>200,
                'message'=>'success',
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


    // ham sửa status product
    public function updateStatusCategory(Request $request){
        try{
            $category= Categories::findOrFail($request->get('id'));
            $category->status = $request->get('status');

            $category->save();
            $response=[
                'status'=>200,
                'message'=>'update status category success',
                'data'=>$request->all()
            ];
        }catch (Exception $ex){
            $response=[
                'status'=>500,
                'message'=> $ex->getMessage(),
                'data'=>null
            ];
        }
        return $response;
    }


    // hàm xóa categories
    public function deleteCategories( Request $request){
        try{

             // Kiểm tra xem category có tồn tại không
            $categoryId = $request->get('cateID');
            $category = Categories::find($categoryId);
            if (!$category) {
            // Category không tồn tại, xử lý và trả về thông báo lỗi
                $response=[
                    'status'=>500,
                    'message'=> 'danh mục không tồn tại',
                    'data'=>null
                ];

            }else{
                $hasProducts = Product::where('category_id', $categoryId)->exists();
                if ($hasProducts) {
                // Có sản phẩm sử dụng category này, xử lý và trả về thông báo lỗi
                    $response=[
                        'status'=>500,
                        'message'=> 'Không thể xóa category vì có sản phẩm sử dụng nó',
                        'data'=>null
                    ];
                }else{
                    // Xóa category
                    $category->delete();
                    $response=[
                        'status'=>200,
                        'message'=>'delete success',
                        'data'=>null
                    ];
                }

            }

        }catch(Exception $ex){
            $response=[
                'status'=>500,
                'message'=> $ex->getMessage(),
                'data'=>null
            ];

        }

       return $response;
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

    // ham sua product
    public function updateProduct(Request $request){
        try{
            $exitstingCategory = Product::where('name',$request -> get('name'))->first();
            if($exitstingCategory && $exitstingCategory->id != $request->get('id')  ){
                $response = [
                    'status' => 500,
                    'message' => 'Tên sản phẩm đã tồn tại',

                    'data' => null
                ];
                 return $response;

            }
            $product = Product::findOrFail($request->get('id'));
            $product->name = $request -> get('name');
            $product->prefix=Str::slug(Str::lower($request->get('name')),'');
            $product->inventory = $request -> get('inventory');
            $product->description= $request -> get('description');
            $product->status = $request -> get('status');
            $product->price = $request -> get('price');

            $product->save();
            $response=[
                'status'=>200,
                'message'=>'update success',
                'data'=>null
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

    // ham sửa status product
    public function updateStatusProduct(Request $request){
        try{
            $product= Product::findOrFail($request->get('id'));
            $product->status = $request->get('status');

            $product->save();
            $response=[
                'status'=>200,
                'message'=>'update status product success',
                'data'=>$request->all()
            ];
        }catch (Exception $ex){
            $response=[
                'status'=>500,
                'message'=> $ex->getMessage(),
                'data'=>null
            ];
        }
        return $response;
    }

    // ham them product
    public function AddProduct(Request $request){
       try{
            if ($request->hasFile('image')) {
                $exitstingCategory = Product::where('name',$request->get('name'))->first();
                if($exitstingCategory){
                    $response = [
                        'status' => 500,
                        'message' => 'Tên sản phẩm đã tồn tại',
                        'data' => null
                    ];
                     return $response;
                }
                $product = new Product();

                $image = $request->file('image')->store('public/images');
                $product->image  = Storage::url($image);

                $product->name = $request->get('name');
                $product->prefix=Str::slug(Str::lower($request->get('name')),'');
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
                $response =[
                    'status'=>200,
                    'message'=>'Successfull',
                    'data'=>$request->all(),

                ];
            } else {
                $response =[
                    'status'=>500,
                    'message'=>'error',
                    'data'=>null

                ];
            }
       }catch(Exception $ex){
        $response =[
            'status'=>500,
            'message'=>$ex->getMessage(),
            'data'=>null
        ];
       }

    return $response;

    }


    // ham xóa product
    public function deleteProduct( Request $request){
        try{

            // Kiểm tra xem product có tồn tại không

            $product = Product::find( $request->get('id'));
            if (!$product) {
            // product không tồn tại, xử lý và trả về thông báo lỗi
                $response=[
                    'status'=>500,
                    'message'=> 'id does not exits',
                    'data'=>null
                ];

            }else{
                    // Xóa category
                    $product->delete();
                    $response=[
                        'status'=>200,
                        'message'=>'delete success',
                        'data'=>null
                    ];
                }

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
