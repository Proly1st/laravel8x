$(function(){
    $('#saveCategory').on('click',function(){
         let name = $('#CategoryName').val();
         let decript = $('#decript').val();
         let statuss = $('#statuss').val();
     

         axios({
            'method':'POST',
            'url':'AddCategory',
            'data': {
                nameCategory :name ,
                decript :decript ,
                statuss :statuss
            }
        }).then(function(res){
            alert(res.data);
            // Tự động đóng cửa sổ popup sau 3 giây (3000 milliseconds)
            if (popupWindow && !popupWindow.closed) {
                popupWindow.close();
              }
        })
        
    })
})
