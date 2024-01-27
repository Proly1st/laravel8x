
$(function(){
    axios({
        'method':'GET',
        'url':'select-order'
    })
        .then(function(response) {
            if(response.data.status ===200){
                let data='';
                for(const v of response.data.data){
                    let status = '';
                    switch (v.status) {
                        case 0:
                            status = '<td>Đang đặt</td>';
                            break;
                        case 2:
                            status = '<td>Đã duyệt</td> ';
                            break;

                        case 3:
                            status = '<td>Hoàn tất</td>';

                            break;
                        default:
                            status = '<td>Chờ duyệt</td>';
                            break;
                    }
                    data+=`<tr><td> ${v.id} </td>
                        <td>${v.customer_name}</td>
                        <td>${v.customer_phone}</td>
                        <td>${v.customer_addres}</td>
                        <td>${v.total_price}</td>
                        <td>${v.total_quantity}</td>
                        ${status}

                        <td><button class="updCategory icon-button button-spacing" title="Sửa" onclick="updateCategory(this)" data-id="${v.id}" data-name="${v.customer_name}"  data-status ="${v.status}"><i class="fas fa-edit"></i></button>
                        <span> </span>
                        </tr>`;

                }
                $('#example-2 tbody').append(data);

            }else {
                console.log(response.data.message);
                console.log('lỗi');
            }

        })

})

// hàm hiển thị modal update categories
let orderID;
function updateCategory(button) {
    orderID = button.getAttribute('data-id');
    document.getElementById("modal-container").style.display = "block";
    axios({
        'mothod':'GET',
        'url': 'select-orderDetail',
        params:{
            id: button.getAttribute('data-id')
        }
    }).then(function (res){

        if(res.data.status==200){
            console.log(res.data.data)
            let dataOrderDetail='';
            for(const v of res.data.data){
                dataOrderDetail +=`<tr><td data-orderID="${v.order_id}"> ${v.order_id} </td>
                        <td>${v.name}</td>
                        <td><img src="${v.image}" style="width: 100px; height: 100px;"> </td>
                        <td>${v.quantity}</td>
                        <td>${v.original_price}</td>
                        <td>${v.price}</td>
                        <td>${v.total_price}</td>
                        <td>${v.note}</td>

                        </tr>`;

            }


            $('#order-detail tbody').html(dataOrderDetail);
            // console.log(res.data);
        }else{
            console.log(res.data.message);
        }
    })
}

function hideModal() {

    document.getElementById("modal-container").style.display = "none";
}

// hàm duyet don hang
$(function() {
    $('#saveStatus').on('click', function () {

        console.log(orderID);
        axios({
            'method': 'POST',
            'url': 'duyetdonhang',
            'data': {
                orderID : orderID
            }
        }).then(function (res) {
            if (res.data.status === 200) {
                document.getElementById("modal-container").style.display = "none";
                console.log(res.data.data);
                CustomPNotify('Thông báo thành công', 'Đơn hàng đã được duyệt thành công!', 'success');

                setTimeout(function () {
                    window.location.href = "/order";
                }, 2000);
            } else {
                document.getElementById("modal-container").style.display = "none";

                console.log(res.data);
                CustomPNotify('Thông báo lỗi!', res.data.message, 'error');
            }
        })
    })
})






// ? tìm hiểu folder database, và controller model, cái seeder
// dùng để làm j ( model , migratios, seeders)
//làm view

// hàm custom pnotify
function CustomPNotify(title, text,type){
    new PNotify({
        title: title,
        text: text,
        icon: 'icofont icofont-info-circle',
        type: type
    });
}

// hàm thêm
// $(function(){
//     $('#saveCategory').on('click',function(){
//         let name = $('#CategoryName').val();
//         let decript = $('#decript').val();
//         let statuss = $('#statuss').val();
//
//         if(!isValidName(name)){
//             CustomPNotify('Thông báo lỗi!','Tên danh mục phải lớn hơn 3 ký tự ','error');
//             return;
//         }else if(!isValidStatus(statuss)){
//             CustomPNotify('Thông báo lỗi!','Status danh mục không hợp lệ','error');
//             return;
//         }else if(!isValidDescription(decript)){
//             CustomPNotify('Thông báo lỗi!','Mô tả danh mục phải lớn hơn 10 ký tự ','error');
//             return;
//         }else{
//             $('.md-modal').removeClass('md-show');
//
//             axios({
//                 'method':'POST',
//                 'url':'addcategory',
//                 'data': {
//                     nameCategory :name ,
//                     decript :decript ,
//                     statuss :statuss
//                 }
//             }).then(function(res){
//                 if(res.data.status===200){
//                     console.log(res.data.message);
//                     CustomPNotify('Thông báo thành công','Danh mục đã được thêm mới thành công!','success');
//
//                     setTimeout(function() {
//                         window.location.href = "/categories";
//                     }, 1500);
//                 }else{
//                     console.log(res.data.message);
//                     CustomPNotify('Thông báo lỗi!',res.data.message,'error');
//
//                 }
//             })
//         }
//
//     })
// });









