// $(function(){
    
//     axios({
//         'method':'GET',
//         'url':'trang-ban-hang',
//     }).then(function(response){
//         if(response.data.status===200){
//            let data='';
//            console.log(response.data);
//             for(const v of response.data.data){
               
//                 data+=`<div class="col-xl-2 col-md-6 col-sm-6 col-xs-12">
//                             <div class="card prod-view">
//                                 <div class="prod-item text-center">
//                                     <div class="prod-img">
//                                         <div class="option-hover">
//                                             <button type="button" class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
//                                                 <i class="icofont icofont-cart-alt f-20"></i>
//                                             </button>
//                                             <button type="button" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
//                                                 <i class="icofont icofont-eye-alt f-20"></i>
//                                             </button>
                                        
//                                         </div>
//                                         <a href="#!" class="hvr-shrink">
//                                             <img src="${v.image}" class="img-fluid o-hidden" alt="prod1.jpg"  >
//                                         </a>
//                                         <div class="p-new"><a href=""> New </a></div>
//                                     </div>
//                                     <div class="prod-info">
//                                         <a href="#!" class="txt-muted"><h4>${v.name}</h4></a>
                                       
//                                         <span class="prod-price"><i class="icofont icofont-cur-dollar"></i>${v.price*v.promotion} <small class="old-price"><i class="icofont icofont-cur-dollar"></i>${v.price}</small></span>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>`;

//             }
//             $('#sale').append(data);

//         }else{
//             console.log(response.data.message);
//         }
 
//     })
// })
$(function(){
    
    axios({
        'method':'GET',
        'url':'trang-ban-hang',
    }).then(function(response){
        if(response.data.status === 200){
           let data = '';
           console.log(response.data);
           const products = response.data.data;
           const itemsPerPage = 15;
           const totalPages = Math.ceil(products.length / itemsPerPage);
           let currentPage = 1;

           function displayProducts(page) {
               const startIndex = (page - 1) * itemsPerPage;
               const endIndex = startIndex + itemsPerPage;
               const currentProducts = products.slice(startIndex, endIndex);

               for (const v of currentProducts) {
                   data += `<div class="col-xl-2 col-md-6 col-sm-6 col-xs-12">
                                <div class="card prod-view">
                                    <div class="prod-item text-center">
                                        <div class="prod-img">
                                            <div class="option-hover">
                                                <button type="button" class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-cart-alt f-20"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-eye-alt f-20"></i>
                                                </button>
                                            </div>
                                            <a href="#!" class="hvr-shrink">
                                                <img src="${v.image}" class="img-fluid o-hidden" alt="prod1.jpg">
                                            </a>
                                            <div class="p-new"><a href=""> New </a></div>
                                        </div>
                                        <div class="prod-info">
                                            <a href="#!" class="txt-muted"><h4>${v.name}</h4></a>
                                            <span class="prod-price"><i class="icofont icofont-cur-dollar"></i>${v.price * v.promotion} <small class="old-price"><i class="icofont icofont-cur-dollar"></i>${v.price}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
               }

               $('#sale').html(data);
           }

           displayProducts(currentPage);

           // Xử lý sự kiện khi người dùng chuyển trang
           $('.pagination').on('click', 'a.page-link', function(e) {
               e.preventDefault();
               currentPage = parseInt($(this).text());
               displayProducts(currentPage);
           });

           // Tạo danh sách phân trang
           let pagination = '<ul class="pagination">';
           for (let i = 1; i <= totalPages; i++) {
               pagination += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                                 <a class="page-link" href="#">${i}</a>
                             </li>`;
           }
           pagination += '</ul>';

           $('.pagination-container').html(pagination);

        } else {
            console.log(response.data.message);
        }
 
    })
})