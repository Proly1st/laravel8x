
$(function() {
    axios({
        method: 'GET',
        url: 'trang-ban-hang',
    }).then(function(response) {
        if (response.data.status === 200) {
            const products = response.data.data;
            const itemsPerPage = 6;
            const totalPages = Math.ceil(products.length / itemsPerPage);
            let currentPage = 1;

            function displayProducts(page) {
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const currentProducts = products.slice(startIndex, endIndex);

                let data = '';

                for (const v of currentProducts) {
                    data += `<div class="col-xl-2 col-md-6 col-sm-6 col-xs-12">
                                <div class="card prod-view">
                                    <div class="prod-item text-center">
                                        <div class="prod-img">
                                            <div class="option-hover">
                                                <button type="button" onclick="addCart(${v.id})"   class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-cart-alt f-20"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-eye-alt f-20"></i>
                                                </button>
                                            </div>
                                            <a href="#!" class="hvr-shrink">
                                                <img src="${v.image}" class="img-fluid o-hidden" alt="${v.image}">
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

                $('#sale ').html(data);
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
                                 <a class="page-link" href="#" data-page="${i}">${i}</a>
                             </li>`;
            }
            pagination += '</ul>';

            $('.pagination-container').html(pagination);

            // Thay đổi trang khi nhấp vào liên kết
            $('.pagination').on('click', 'a.page-link', function(e) {
                e.preventDefault();
                currentPage = parseInt($(this).attr('data-page'));
                displayProducts(currentPage);
            });

        } else {
            console.log(response.data.message);
        }

    })

})
    let cookieCart = [];
 // $.removeCookie('cart',{path:'/'});
    function addCart(productID) {
        CustomPNotify('Thông báo thành công', 'Sản phẩm đã được thêm vào giỏ hàng','success');

        let cart = $.cookie("cart")
        let cartItems;
        if (cart) {
             cartItems = JSON.parse(cart);
            if(cartItems.hasOwnProperty(productID)){
                cartItems[productID].quantity+=1;

            }else{
                cartItems[productID]={
                    quantity:1
                };


            }
        }else{
             cartItems = {
                [productID]:{
                    quantity:1
                }
            };


        }
        let expiresDate = new Date();
        expiresDate.setMonth(expiresDate.getMonth()+3);
        $.cookie("cart",JSON.stringify(cartItems),{expires:expiresDate});

        console.log(cartItems);
    }

    // ham xoá dấu tiếng việt
function removeDiacritics(str) {
    return str
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/đ/g, "d")
        .replace(/Đ/g, "D");
}
// hàm search sản phẩm
$('#searchProduct').on('click',function (){

    let inputSearch = removeDiacritics($('#inputSearch').val()).replace(/ /g, "").toLowerCase();

    if(inputSearch){
        axios({
            'method':'GET',
            'url':'search-product',
            params: {
                inputSearch: inputSearch
            }
        }).then(function (response){
            if (response.data.status === 200) {
                const products = response.data.data;
                const itemsPerPage = 6;
                const totalPages = Math.ceil(products.length / itemsPerPage);
                let currentPage = 1;

                function displayProducts(page) {
                    const startIndex = (page - 1) * itemsPerPage;
                    const endIndex = startIndex + itemsPerPage;
                    const currentProducts = products.slice(startIndex, endIndex);

                    let data = '';

                    for (const v of currentProducts) {
                        data += `<div class="col-xl-2 col-md-6 col-sm-6 col-xs-12">
                                <div class="card prod-view">
                                    <div class="prod-item text-center">
                                        <div class="prod-img">
                                            <div class="option-hover">
                                                <button type="button" onclick="addCart(${v.id})"   class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-cart-alt f-20"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                                    <i class="icofont icofont-eye-alt f-20"></i>
                                                </button>
                                            </div>
                                            <a href="#!" class="hvr-shrink">
                                                <img src="${v.image}" class="img-fluid o-hidden" alt="${v.image}">
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

                    $('#sale ').html(data);
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
                                 <a class="page-link" href="#" data-page="${i}">${i}</a>
                             </li>`;
                }
                pagination += '</ul>';

                $('.pagination-container').html(pagination);

                // Thay đổi trang khi nhấp vào liên kết
                $('.pagination').on('click', 'a.page-link', function(e) {
                    e.preventDefault();
                    currentPage = parseInt($(this).attr('data-page'));
                    displayProducts(currentPage);
                });


            }else if(response.data.status===500){
                CustomPNotify('Thông báo lỗi!', response.data.message, 'error')
            }else{
                CustomPNotify('Thông báo!!','Không tìm thấy sản phẩm phù hợp!', 'error')

            }
        })
    }else{
        CustomPNotify('Thông báo','Vui lòng nhập thông tin cần tìm kiếm!','error');
    }
})

// hàm custom pnotify
function CustomPNotify(title, text,type){
    new PNotify({
        title: title,
        text: text,
        icon: 'icofont icofont-info-circle',
        type: type
    });
}
