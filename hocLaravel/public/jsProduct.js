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
                        <a href="#!" class="m-r-15 text-muted edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update()"><i class="icofont icofont-ui-edit"></i></a>
                        <a href="#!" class="text-muted delete-btn" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete()"><i class="icofont icofont-delete-alt"></i></a>
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
        }else{
            
            console.log(response.data.message);
        }
    })
    
})

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
                if(response.data.data ){
                    
                    new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Sản phẩm đã được thêm mới thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location.href = "/";
                      }, 5000);
                }
              
            })
            .catch(function(error) {
                // Xử lý lỗi (nếu có)
                console.log(error);

                new PNotify({
                    title: 'Thông báo thất bại',
                    text: 'Thêm mới thất bại',
                    icon: 'icofont icofont-info-circle',
                    type: 'error'
                });
            });
            
    })

})