<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramdom</title>
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
   
</head>
<body>

<div>
    <div id="arr1">
    <label for="inputText">Nhập vào một dãy số 1:</label>
    <input type="text" id="input1" name="inputText">
    <br>
    </div>
    
    <div id="arr2">
    <label for="inputText">Nhập vào một dãy số 2:</label>
    <input type="text" id="input2" name="inputText">
    <br>
    </div>
   

    <button type="button" id="buttonxd">Xác nhận</button>
    <div id="result"></div>
    <div id="MangTangDan"></div>
    <div id="MangGiamDan"></div>
    <div id="tongmang"></div>
    <div id="maxmang"></div>
    <div id="mangGiong"></div>

    <div id="mangKhac"></div>
    <div id="soNguyenTo"></div>
    <div id="phanTuLe"></div>


</div>
   

</body>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('asset/js/random.js') }}" ></script>

</html>