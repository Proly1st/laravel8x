$(function(){
    $('#saveCategory').on('click',function(){
         let name = $('#CategoryName').val();
         let decript = $('#decript').val();
         let statuss = $('#statuss option:selected');

         axios({
            'method':'POST',
            'url':'AddCategory',
            'data': {
                nameCategory :name ,
                decript :decript ,
                statuss :statuss
            }
        }).then(function(res){
            console.log(res.data);
            
        })
        
    })
})
