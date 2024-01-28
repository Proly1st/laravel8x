<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public  function searchProduct(Request $request)
    {
        try{
            $searchInput = $request->get('inputSearch');
            $searchResult = Product::where(function ($query) use ($searchInput) {
                $query->where('name','like','%'.$searchInput.'%')
                    ->orWhere('prefix', 'like', '%' . $searchInput . '%');
            })->orderByDesc('id')->get();
            //cau truc tra ve
            $response = [
                'status' => 200,
                'message' => 'success',//thong tin muon tra ve
                'data' => $searchResult,
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
}
