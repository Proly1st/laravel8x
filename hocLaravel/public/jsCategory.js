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
                let statusID;
                let statusDescript;
                switch (cate.status) {
                    case '1':
                        status = '<td>Đang hoạt động </td> ';
                        statusID=0;
                        statusDescript='Tạm ngưng';
                        break;
                    case '0':
                        status = '<td>Tạm ngưng </td>';
                        statusID=1;
                        statusDescript='Đang hoạt động ';
                        
                        break;
                    default:
                        status = '<td>Dừng hoạt động</td>';
                        break;
                }
                data+=`<tr><td> ${cate.id} </td>
                        <td>${cate.name}</td>
                        <td>${cate.description}</td>
                        ${status}
                        <td><button class="btn btn-primary" onclick="statusButtonClick(this)" data-id= "${cate.id}" data-status="${statusID}" >${statusDescript}</button></td>
                        <td><button class="updCategory icon-button button-spacing" title="Sửa" onclick="updateCategory(this)" data-id="${cate.id}" data-name="${cate.name}" data-desript ="${cate.description}" data-status ="${cate.status}"><i class="fas fa-edit"></i></button>
                        <span> </span>
                        <button class="icon-button button-spacing" title="Xóa" onclick="deleteCategory(this)"  data-id="${cate.id}"><i class="fas fa-trash-alt"></i></button></td>
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
        let name = $('#editName').val() ;
        let decript = $('#editDecript').val();
        let status = $('#editStatus').val();
        if(!isValidName(name)){
            CustomPNotify('Thông báo lỗi!','Tên danh mục phải lớn hơn 3 ký tự','error');
            return;
        }else if(!isValidStatus(status)){
            CustomPNotify('Thông báo lỗi!','Status danh mục không hợp lệ','error');
            return;
        }else if(!isValidDescription(decript)){
            CustomPNotify('Thông báo lỗi!','Mô tả danh mục phải lớn hơn 10 ký tự ','error');
            return;
        }else{
            axios({
            'method':'POST',
            'url':'editcategory',
            'data': {
                cateID: categoryId,
                nameCategory : name ,
                decript : decript ,
                statuss : status
            }
            }).then(function(res){
                if(res.data.status===200){
                    document.getElementById("modal-container").style.display = "none";
            
                    CustomPNotify('Thông báo thành công','Danh mục đã được sữa thành công!','success');

                setTimeout(function() {
                    window.location.href = "/categories";
                }, 2000);
                }else{
                    console.log(res.data.data);
                    CustomPNotify('Thông báo lỗi!',res.data.message,'error');
                }
            })
        }
        
    })
})

// hàm sửa trạng thái status 
function statusButtonClick(button){
    
    Swal.fire({
        title: 'Bạn có chắc chắn muốn thay đổi trạng thái không?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ',
        reverseButtons: true,
        position: 'center',
        }).then((result) => {
            let status = button.getAttribute("data-status");
        if (result.isConfirmed) {
            if(!isValidStatus(status)){
            CustomPNotify('Thông báo lỗi!','Status danh mục không hợp lệ','error');
            }else{
                axios({
                    'method':'POST',
                    'url':'/update-status-category',
                    'data':{
                        id : parseInt(button.getAttribute("data-id")),
                        status : status
                    }
                    
                }).then(function(res){
                    if(res.data.status ===200){
                        
                    CustomPNotify('Thông báo thành công','Danh mục đã được sửa thành công!','success');

                    console.log(res.data.message);
                    
                    setTimeout(function() {
                    window.location.href = "/categories";
                    }, 1500);
                    }else if(res.data.status ===500){
                        CustomPNotify('Thông báo thất bại!', res.data.message,'error');

                        console.log(res.data.message);
                        console.log(parseInt(button.getAttribute("data-id")));
                    }
                })
            }
           
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Hủy bỏ xóa
            console.log("Hủy bỏ sửa status");
        }
        });
}


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
                      
                CustomPNotify('Thông báo thành công','Danh mục đã được xóa thành công!','success');

                console.log(res.data.message);
                console.log(res.data.status);

                setTimeout(function() {
                window.location.href = "/categories";
                }, 1000);
                }else if(res.data.status ===500){
                     CustomPNotify('Thông báo thất bại!', res.data.message,'error');
                   
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
$(function(){
    $('#saveCategory').on('click',function(){
        let name = $('#CategoryName').val();
        let decript = $('#decript').val();
        let statuss = $('#statuss').val();
        
        if(!isValidName(name)){
            CustomPNotify('Thông báo lỗi!','Tên danh mục phải lớn hơn 3 ký tự ','error');
            return;
        }else if(!isValidStatus(statuss)){
            CustomPNotify('Thông báo lỗi!','Status danh mục không hợp lệ','error');
            return;
        }else if(!isValidDescription(decript)){
            CustomPNotify('Thông báo lỗi!','Mô tả danh mục phải lớn hơn 10 ký tự ','error');
            return;
        }else{
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
                if(res.data.status===200){
                console.log(res.data.message);
                CustomPNotify('Thông báo thành công','Danh mục đã được thêm mới thành công!','success');
                
                setTimeout(function() {
                    window.location.href = "/categories";
                }, 1500);
                }else{
                    console.log(res.data.message);
                    CustomPNotify('Thông báo lỗi!',res.data.message,'error');

                }
            })
        }

    })
});

function isValidName(name){
    
    if( name.length<1 || name.length <3 ){
        return false;
    }
    return true;
}


function isValidStatus(status){
   
    if(status.length<1 ||  status !="0" && status !="1" && status !="-1"){
        return false;
    }
    return true;
}

function isValidDescription(descript){
  
    if(descript.length <10  ){
        return false;
    }
    return true;
}




 