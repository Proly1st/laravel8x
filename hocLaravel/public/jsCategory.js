 // if else (nếu thành công thì for, error thì báo lỗi)
       //phải có phân trang. có limit 
       // ten route là chữ thường, -
       // ten function,tên biến,.. : chữ đầu viết thường chữ sau viết hoa.
       //ten element của html viết y như route
       //tìm hiểu 2 dạng DB orm và query builder
$(function(){
    axios({
        'method':'GET',
        'url':'select-categories'
    })
    .then(function(response) {
        if(response.data.status ===200){
            let data='';
            for(const cate of response.data.data){
                let status = '';
                switch (cate.status) {
                    case '1':
                        status = '<td>Đang hoạt động</td>';
                        break;
                    case '0':
                        status = '<td>Tạm ngưng</td>';
                        break;
                    default:
                        status = '<td>Đã bị xóa</td>';
                        break;
                }
                data+=`<tr><td> ${cate.id} </td>
                        <td>${cate.name}</td>
                        <td>${cate.description}</td>
                        ${status}
                        <td><button class="updCategory icon-button button-spacing" title="Sửa" onclick="updateCategory(this)" data-id="${cate.id}" data-name="${cate.name}" data-desript ="${cate.description}" data-status ="${cate.status}"><i class="fas fa-edit"></i></button>
                        <span> </span>
                        <button class="icon-button button-spacing" title="Xóa" onclick="deleteCategory(this)"  data-id="${cate.id}"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>`;
               
            }
            $('#example-2').append(data);
            
        }else {
            console.log(response.data.message);
            console.log('lỗi');
        }

    })
    
})

// hàm hiển thị modal update categories
let categoryId;
function updateCategory(button) {
    document.getElementById("modal-container").style.display = "block";
    categoryId = button.getAttribute("data-id");
    $('#editName').val(button.getAttribute("data-name"));
    $('#editDecript').val(button.getAttribute("data-desript"));
    $('#editStatus').val(button.getAttribute("data-status"));
}

function hideModal() {
    document.getElementById("modal-container").style.display = "none";
}

// hàm xác nhận sửa
$(function(){
    $('#saveEdit').on('click',function(){
        axios({
            'method':'POST',
            'url':'editcategory',
            'data': {
                cateID: categoryId,
                nameCategory : $('#editName').val() ,
                decript :$('#editDecript').val() ,
                statuss :$('#editStatus').val()
            }
        }).then(function(res){
            if(res.data.status===200){
                 document.getElementById("modal-container").style.display = "none";
            new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Danh mục đã được sữa thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });
            setTimeout(function() {
                window.location.href = "/categories";
              }, 5000);
            }else{
                console.log(res.data.message);
            }
        })
    })
})

// hàm xóa
function deleteCategory(button){
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ',
        reverseButtons: true,
        position: 'center',
        }).then((result) => {
        if (result.isConfirmed) {
            axios({
                'method':'POST',
                'url':'/deletecategory',
                'data':{
                    cateID : button.getAttribute("data-id")
                }
                
            }).then(function(res){
                if(res.data.status ===200){
                    new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Danh mục đã được xóa thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    
                });
                console.log(res.data.message);
                console.log(res.data.status);

                setTimeout(function() {
                window.location.href = "/categories";
                }, 5000);
                }else{
                    console.log(res.data.message);
                }
            })

           
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Hủy bỏ xóa
            console.log("Hủy bỏ xóa");
        }
        });
}

function showConfirmation() {
   
}



// ? tìm hiểu folder database, và controller model, cái seeder
// dùng để làm j ( model , migratió, seeders)
//làm view

$(function(){
    $('#saveCategory').on('click',function(){
         let name = $('#CategoryName').val();
         let decript = $('#decript').val();
         let statuss = $('#statuss').val();
     
         $('.md-modal').removeClass('md-show');
       
         axios({
            'method':'POST',
            'url':'addcategory',
            'data': {
                nameCategory :name ,
                decript :decript ,
                statuss :statuss
            }
        }).then(function(res){
            console.log(res.data.message);
            new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Danh mục đã được thêm mới thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });
            setTimeout(function() {
                window.location.href = "/categories";
              }, 5000);
           
        })
        
    })
});





 