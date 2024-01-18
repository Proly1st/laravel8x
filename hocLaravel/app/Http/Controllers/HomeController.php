<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
   
    public function index(){
        
        // return view('categories');
        
        //  return view('products');
    }

    public function Random(Request $request){
        $arr = $request -> get('arrRamdom');
        $randomNumber = $arr[array_rand($arr)];

       return $randomNumber;
    }

    public function MangTangDan( Request $request){
        $arr = $request -> get('array');
         sort($arr) ;
        return $arr;
    }

    public function MangGiamDan(Request $request){
        $arr = $request -> get('array');
        rsort($arr);
        return $arr;
    }

    public function TongMang(Request $request){
        $arr = $request -> get('array');
        $sum =0;
        foreach ( $arr as $abc){
            $sum+= $abc;
        }
        return $sum;
    }

    public function MaxMang(Request $request){
        $arr = $request -> get('array');
        $max=0;
        foreach( $arr as $a){
            if($a > $max){
                $max = $a;
            }
        }
        return $max;
    }

    public function MangGiong(Request $request){
        $arr1 = $request -> get('array1');
        $arr2 = $request -> get('array2');

        $array = array_intersect($arr1, $arr2);
        $arr = array_values($array);
        return $arr;
        
    }

    public function MangKhac(Request $request){
        $arr1 = $request -> get('array1');
        $arr2 = $request -> get('array2');

        $arrayKhac1 = array_diff($arr1, $arr2);
        $arrayKhac2 = array_diff($arr2, $arr1);


        $arrTong = array_merge($arrayKhac1,$arrayKhac2);
        return $arrTong;
    }

    public function SoNguyenTo(Request $request){
        $arr1 = $request -> get('array1');
        $array=[];
        foreach( $arr1 as $a){
            if($this -> checkSoNguyenTo($a)){
                $array[] = $a;
            }
        }
        return $array;
    }

    public function checkSoNguyenTo($a){
        
        if($a <2){
            return false;

        }
        for($i =2;$i <= sqrt($a); $i++){
            if($a % $i===0){
                return false;
            }
        }
        return true;
    }

    public function PhanTuLe(Request $request){
        $arr = $request -> get('array1');
        $array=[];
        foreach ($arr as $a){
            if($a %2 !=0){
                $array[] =$a;
            }
        }
        return $array;
    }

    public function callApiClient2(){
        $client = new Client();
        $res = $client -> request('GET','http://localhost:8001/api/number');
        $data = json_decode($res->getBody(), true);
        // json_decode : hàm php chuyển đổi Json thành chuỗi
        // $res->getBody(), true : trả về nội dung phản hồi dưới dạng luồn or chuỗi. phương thức phản hồi
        return response()->json($data);
    }





}
