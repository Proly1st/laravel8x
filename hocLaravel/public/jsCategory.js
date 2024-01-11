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
        if(response.status ===200){
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
                        status = '<td>Dừng hoạt động</td>';
                        break;
                }
                data+=`<tr><td> ${cate.id} </td>
                        <td>${cate.name}</td>
                        <td>${cate.description}</td>
                        ${status}
                        <td><button class="updCategory icon-button button-spacing" title="Sửa" onclick="updateCategory()" data-name="${cate.name}" data-desript ="${cate.description}"><i class="fas fa-edit"></i></button>
                        <span> </span>
                        <button class="icon-button button-spacing" title="Xóa" onclick="deleteCategory()"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>`;
               
              
            }
            $('#example-2').append(data);
            
        }else {
            console.log(response.message);
            console.log('lỗi');
        }

    })
    
})

function updateCategory() {
    document.getElementById("modal-container").style.display = "block";
    
}

function hideModal() {
    document.getElementById("modal-container").style.display = "none";
}

$(function(){
    $('#saveEdit').on('click',function(){
        let id = $('.updCategory') 
        axios({
            'method':'POST',
            'url':'editcategory',
            'data': {
                nameCategory : $('#editName').val() ,
                decript :$('#editDecript').val() ,
                statuss :$('#editStatus').val()
            }
        }).then(function(res){
            console.log(res);
            new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Danh mục đã được sữa thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });
            setTimeout(function() {
                window.location.href = "/categories";
              }, 3000);
           
        })
    })
})

function deleteCategory(){
    console.log('Xóa');
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
            console.log(res);
            new PNotify({
                        title: 'Thông báo thành công',
                        text: 'Danh mục đã được thêm mới thành công!',
                        icon: 'icofont icofont-info-circle',
                        type: 'success'
                    });
            setTimeout(function() {
                window.location.href = "/categories";
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

 