 // if else (nếu thành công thì for, error thì báo lỗi)
       //phải có phân trang. có limit 
       // ten route là chữ thường, -
       // ten function,tên biến,.. : chữ đầu viết thường chữ sau viết hoa.
       //ten element của html viết y như route
       //tìm hiểu 2 dạng DB orm và query builder
$(function(){
    axios({
        'method':'GET',
        'url':'Categories'
    })
    .then(function(response) {
      
        if(response.status ===200){
            let catigoreis = response.data;
            catigoreis.data.forEach( function(cate) {
                let id= $('<td>'+ cate.id +'</td>');
                let name = $('<td>'+ cate.name +'</td>');
                let description = $('<td>'+cate.description +'</td>');
              let status;
                switch(cate.status){
                    case '1': 
                        status =$('<td>Đang hoạt động</td>');
                        break;
                    case '0':
                        status =$('<td>Tạm ngưng</td>');

                        break;
                    case '-1':
                        status =$('<td>Đã bị xóa</td>');

                        break;
                }
               
                let actions = $('<td></td>');
                let editButton = $('<button class="icon-button button-spacing" title="Sửa" ><i class="fas fa-edit"></i></button>');
                editButton.on('click',function(){
                    console.log('edit hàng');
                })
                actions.append(editButton);

                actions.append($('<span> </span>'));
                let deleteButton = $('<button class="icon-button button-spacing" title="Xóa"><i class="fas fa-trash-alt"></i></button>');
                deleteButton.on('click',function(){
                    console.log('xoa hàng');
                })
                actions.append(deleteButton);

                let newRow=$('<tr></tr>');
                newRow.append(id);
                newRow.append(name);
                newRow.append(description);
                newRow.append(status);
                newRow.append(actions);
                $('#example-2').append(newRow);

            });
        }else {
            // console.log(response.message);
            console.log('lỗi');
        }

    })
    
})

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
            'url':'addCategory',
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

 