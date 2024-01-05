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
            $("#modal-13").hide();
            alert(res.data);
            setTimeout(function() {
                window.location.href = "/Categories";
              }, 0);
           
        })
        
    })
})
