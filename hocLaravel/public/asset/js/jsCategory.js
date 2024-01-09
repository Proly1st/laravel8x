$(function(){
    $('#saveCategory').on('click',function(){
         let name = $('#CategoryName').val();
         let decript = $('#decript').val();
         let statuss = $('#statuss').val();
     
         $('.md-modal').removeClass('md-show');

         axios({
            'method':'POST',
            'url':'AddCategory',
            'data': {
                nameCategory :name ,
                decript :decript ,
                statuss :statuss
            }
        }).then(function(res){
            new PNotify({
                title: 'Thông báo thành công',
                text: 'Danh mục đã được thêm mới thành công!',
                icon: 'icofont icofont-info-circle',
                type: 'success'
            });

            setTimeout(function() {
                window.location.href = "/Categories";
              }, 3000);
           
        })
        
    })
});

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

$(function(){
    $('.edit-btn').on('click', function(){
        // e.preventDefault();
        // console.log('a');
        
        // var $editInput = $(this).siblings('.edit-input');
        // if ($editInput.is(':hidden')) {
        //     $editInput.show();
        //     $(this).hide();
        // }

        new PNotify({
            title: 'Thông báo thành công',
            text: 'Danh mục đã được thêm mới thành công!',
            icon: 'icofont icofont-info-circle',
            type: 'success'
        });

    });
});

 