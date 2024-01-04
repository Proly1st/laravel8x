$(function(){
    $('#buttonxd').on('click',function(){
        let input1 = $('#input1').val();
        let arr1= input1.split(',');

        let input2 = $('#input2').val();
        let arr2 = input2.split(',');

        // dùng axios gọi guzzle để kết nối tới client2
        // axios.get('/call-client2-api')
        // .then(function(response) {
        //   // Xử lý phản hồi từ controller
        //   console.log(response.data);
        // })
        // .catch(function(error) {
        //   // Xử lý lỗi (nếu có)
        //   console.log(error);
        // });

         // axios({
        //     'method':'POST',
        //     'url':'xuLyRandom',
        //     'data': {
        //         arrRamdom :arr1
        //     }
        // }).then(function(res){
        //     console.log(res);
        //     $('#result').text('Số ngẫu nhiên: '+res.data);
        // })
        

        // axios({
        //     'method':'POST',
        //     'url':'xuLyRandom',
        //     'data': {
        //         arrRamdom :arr1
        //     }
        // }).then(function(res){
        //     console.log(res);
        //     $('#result').text('Số ngẫu nhiên: '+res.data);
        // })

        // axios({
        //     'method':'POST',
        //     'url':'mangTangDan',
        //     'data':{
        //         array : arr1
        //     }
        // }).then(function(res1){
        //     $('#MangTangDan').text('Mảng tăng dần: '+res1.data);
        // })

       

        // axios({
        //     'method':'POST',
        //     'url':'mangGiamDan',
        //     'data':{
        //         array:arr1
        //     }
        // }).then(function(res2){
        //     $('#MangGiamDan').text('Mảng giảm dần: '+res2.data);
        // })

        // axios({
        //     'method':'POST',
        //     'url':'tongMang',
        //     'data':{
        //         array : arr1
        //     }

        // }).then(function(res3){
        //     $('#tongmang').text('Tong cac gia tri cua mang: '+res3.data);
        // })

        // axios({
        //     'method':'POST',
        //     'url':'maxMang',
        //     'data':{
        //         array: arr1
        //     }
        // }).then(function(res4){
        //     $('#maxmang').text('Số lớn nhất của mảng: '+ res4.data);
        // })

        // axios({
        //     'method':'POST',
        //     'url':'mangGiong',
        //     'data':{
        //         array1: arr1 ,
        //         array2: arr2
        //     }

        // }).then(function(res5){
        //     $('#mangGiong').text('Phần tử giống nhau của 2 mảng: '+res5.data);
        // })

        // axios({
        //     'method':'POST',
        //     'url': 'mangKhac',
        //     'data':{
        //         array1: arr1 ,
        //         array2: arr2
        //     }
        // }).then(function(res6){
        //     $('#mangKhac').text('Phần tử khác nhau của 2 mảng: '+ res6.data );
        // })

        // axios({
        //     'method':'POST',
        //     'url':'soNguyenTo',
        //     data:{
        //         array1:arr1
        //     }

        // }).then(function(res7){
        //     $('#soNguyenTo').text('Số nguyên tố trong mãng 1: '+res7.data);
        // })

        // axios ({
        //     'method': 'POST',
        //     'url': 'phanTuLe',
        //     'data':{
        //         array1 : arr1
        //     }
        // }).then(function( res8){
        //     $('#phanTuLe').text('Phần tử lẻ của mảng 1: '+res8.data);
        // })

    });
});
