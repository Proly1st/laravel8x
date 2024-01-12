$(function(){
    axios({
        'method':'GET',
        'url':'showproduct',
    }).then(function(response){
        if(response.status===200){
           let data='';
            for(const v of response.data.data){
                let status = '';
                switch (v.status) {
                    case '1':
                        status = '<td>Đang hoạt động</td>';
                        break;
                    case '0':
                        status = '<td>Tạm ngưng</td>';
                        break;
                    default:
                        status = '<td>Dừng hoạt động</td>';
                        break;
                }
                data+=`<tr><td><img src="${v.image}" class="img-fluid" alt="tbl"style="width: 72px; height: auto;"></img></td></td>
                        <td>${v.name}</td>
                        <td>${v.inventory}</td>
                        <td>${v.description}</td> 
                        ${status}
                        <td>${v.price}</td>
                        <td>${v.promotion}</td>
                        <td>${v.promotion_type}</td>
                        <td class="action-icon">
                        <a href="#!" class="m-r-15 text-muted edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" onclick="updateProduct(this)" 
                        data-id="${v.id}",
                        data-name="${v.name}",
                        data-inventory="${v.inventory}",
                        data-description="${v.description}",
                        data-status="${v.status}",
                        data-price="${v.price}"><i class="icofont icofont-ui-edit"></i></a>
                        <a href="#!" class="text-muted delete-btn" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteProduct(this)" data-id="${v.id}"><i class="icofont icofont-delete-alt"></i></a>
                     </td></tr>`;

            }
            $('#e-product-list').append(data);

        }else{
            console.log(response.data.message);
        }
 
    })
})
// hàm trả về tên danh mục trong phần thêm mới sản phẩm
$(function(){
    axios({
        'method':'GET',
        'url':'select-categories',
    }).then(function(response){
        if(response.data.status===200){
            let data='';
            for(const v of response.data.data){
                    data+=`<option value="${v.id}">${v.name}</option>`
            }
            $('#select-category').append(data);
            $('#select-category-edit').append(data);
        }else{
            
            console.log(response.data.message);
        }
    })
    
})

let id_product;
// hàm sửa sản phẩm
function updateProduct(button){
    document.getElementById("modal-container").style.display = "block";
    id_product = button.getAttribute("data-id");
    $('#editname-product').val(button.getAttribute("data-name"));
    $('#editinventory-product').val(button.getAttribute("data-inventory"));
    $('#editdescript-product').val(button.getAttribute("data-description"));
    $('#editselect-status').val(button.getAttribute("data-status"));
    $('#editprice-product').val(button.getAttribute("data-price"));
   
}

// hàm sửa khi click vào nút save
$(function(){
    $('#saveEdit').on('click',function(){
        axios({
            'method':'POST',
            'url':'updateproduct',
            'data': {
                id : id_product,
                name:  $('#editname-product').val(),
                inventory : $('#editinventory-product').val() ,
                description : $('#editdescript-product').val() ,
                // image : $("#editImageFile").prop("files")[0],
                status : $('#editselect-status').val(),
                price : $('#editprice-product').val(),
                
            }
        }).then(function(res){
            if(res.data.status===200){
                 document.getElementById("modal-container").style.display = "none";
                new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Sản phẩm đã được sữa thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });
                console.log(res.data.message);    
            setTimeout(function() {
                window.location.href = "/";
              }, 5000);
            }else{
                console.log(res.data.message);
            }
        })
    })
})

function hideModal() {
    document.getElementById("modal-container").style.display = "none";
}

// hàm xóa sản phẩm theo id
function deleteProduct (button){
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
                'url':'/deleteproduct',
                'data':{
                    id : button.getAttribute("data-id")
                }
                
            }).then(function(res){
                if(res.data.status ===200){
                    new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Sản phẩm đã được xóa thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    
                });
                console.log(res.data.message);
                console.log(res.data.status);

                setTimeout(function() {
                window.location.href = "/";
                }, 5000);
                }else if(res.data.status ===500){
                    new PNotify({
                        title: 'Thông báo thất bại',
                        text: res.data.message,
                        icon: 'icofont icofont-info-circle',
                        type: 'error'
                    
                });
                    console.log(res.data.message);
                }
            })

           
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Hủy bỏ xóa
            console.log("Hủy bỏ xóa");
        }
        });
}
// hàm thêm mới sản phẩm
$(function(){
    $('#save-product').on('click',function(){
       
        let formData = new FormData();
        formData.append('name', $('#name-product').val());
        formData.append('id_category', $('#select-category').val());
        formData.append('inventory', $('#inventory-product').val());
        formData.append('description', $('#descript-product').val());
        formData.append('image', $("#imageFile").prop("files")[0]);
        formData.append('status', $('#select-status').val());
        formData.append('price', $('#price-product').val());
       
        $('.md-modal').removeClass('md-show');
            axios.post('/addproduct', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                // Xử lý phản hồi từ máy chủ sau khi tệp tin được tải lên thành công
                if(response.data.status ===200 ){
                    console.log(response.data.message);
                    new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Sản phẩm đã được thêm mới thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location.href = "/";
                      }, 5000);
                }else{
                    console.log(response.data.message);
                    new PNotify({
                    title: 'Thông báo thất bại',
                    text: 'Thêm mới thất bại',
                    icon: 'icofont icofont-info-circle',
                    type: 'error'
                });
                }
                
              
            })
          
            
    })

})