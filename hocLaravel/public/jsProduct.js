$(function(){
    axios({
        'method':'GET',
        'url':'showproduct',
    }).then(function(response){
        if(response.status===200){
            let products = response.data;
            products.data.forEach(function(product) {
                let img =$('<td> <img src="'+product.image +'" class="img-fluid" alt="tbl"style="width: 72px; height: auto;"></img></td>');
                let name = $('<td>'+product.name+'</td>');
                let inventory = $('<td>'+product.inventory+'</td>');
                let description = $('<td>'+product.description+'</td>');
                
                let status;
                switch(product.status){
                    case '1':
                        status = $('<td>Đang hoạt động</td>');
                        break;

                    case '0':
                        status = $('<td>Tạm ngưng</td>');
                        break; 

                    case '-1':
                        status = $('<td>Dừng hoạt động</td>');
                        break;

                } 
                let price = $('<td>'+product.price+'</td>');
                let promotion = $('<td>'+product.promotion+'</td>');
                let promotion_type = $('<td>'+product.promotion_type+'</td>');

                let action= $('<td class="action-icon"></td>');
                let editaction = $(' <a href="#!" class="m-r-15 text-muted edit-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icofont icofont-ui-edit"></i></a>');
                editaction.on('click',function(){
                    console.log('edit hàng');
                })

                let deleteaction = $('<a href="#!" class="text-muted delete-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icofont icofont-delete-alt"></i></a>');
                deleteaction.on('click',function(){
                    console.log('xoa hàng');
                })
                
                action.append(editaction);
                action.append(deleteaction);
               
                let newRow = $('<tr></tr>');
            
                newRow.append(img);
                newRow.append(name);
                newRow.append(inventory);
                newRow.append(description);
                newRow.append(status);
                newRow.append(price);
                newRow.append(promotion);
                newRow.append(promotion_type);
               newRow.append(action);
                
              
                newRow.append(action);
                $('#e-product-list').append(newRow);
            });
        }else{
            console.log(response.message);
        }
             
        
      
    })
})

$(function(){
    $('#save-product').on('click',function(){
       
        let name = $('#name-product').val();
        let id_category = $('#select-category').val();
        let inventory= $('#inventory-product').val();
        let description =$('#descript-product').val();
        let image= $("#imageFile").prop("files")[0];
        let status= $('#select-status').val();
        let price= $('#price-product').val();
       
        let formData = new FormData();
        formData.append('name', name);
        formData.append('id_category', id_category);
        formData.append('inventory', inventory);
        formData.append('description', description);
        formData.append('image', image);
        formData.append('status', status);
        formData.append('price', price);
        
        $('.md-modal').removeClass('md-show');
            axios.post('/addProduct', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                // Xử lý phản hồi từ máy chủ sau khi tệp tin được tải lên thành công
                if(response.data ){
                    console.log(response.data)
                    new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Sản phẩm đã được thêm mới thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });

                    setTimeout(function() {
                        window.location.href = "/";
                      }, 3000);
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