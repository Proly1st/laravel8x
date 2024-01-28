$(function(){
    let cart = $.cookie("cart");

    if(cart){
       let cartItems = JSON.parse(cart);
        let keys = Object.keys(cartItems);
       if(keys.length==0){
        return;
       }

        axios.get('showcart', {
          params: {
            productIDs: keys
          }
        }).then(function(response){
          if(response.data.status===200){
            let data='';
            let quantity=0;
            for(let v of response.data.data){
               quantity= cartItems[v.id].quantity;

              data+=` <tr class="odd">
                          <td class="action-icon text-center">
                              <input type="checkbox" class="order-checkbox" value="${v.id}" data-quantity="${quantity}" data-price="${v.price}" >
                          </td>
                          <td class="pro-list-img" tabindex="0">
                              <img src="${v.image}" class="img-fluid" alt="tbl">
                          </td>
                          <td class="pro-name">
                              <h6>${v.name}</h6>
                              <span>${v.description}</span>

                          </td>
                          <td>${v.price*1}</td>
                          <td>
                              <input type="text" class="soluong form-control" value="${quantity}" data-id="${v.id}" data-price="${v.price}" >
                          </td>
                          <td>${v.price*quantity}</td>

                          <td class="action-icon text-center">
                              <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top"
                              data-original-title="Delete" onclick="deleteCart(this)" data-id="${v.id}"><i class="icofont icofont-delete-alt"></i></a>
                          </td>
                      </tr>`
            }
            $('#e-product-list tbody').append(data);

          }else{
            console.log(response.data.message);
          }

        })

    }

  // hàm xử lý xóa sản phẩm hoặc tổng tiền khi khách hàng thay đổi số lượng
  $(document).on('input paste ','.soluong',function(){

    let soluong = parseInt($(this).val());
    if(isNaN(soluong)){
      return;
    }
    let idXoa= $(this).data('id');
    let donGia= $(this).parents('tr').find('td:eq(3)').text();

    let thanhTien = donGia*soluong;
    $(this).parents('tr').find('td:eq(5)').text(thanhTien);
    let cartItems = JSON.parse($.cookie("cart"));

    if(soluong<1){
      Swal.fire({
        title: 'Bạn có chắc chắn muốn bỏ sản phẩm này không?',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ',
        reverseButtons: true,
        position: 'center',
        }).then((result) => {
          if(result.isConfirmed){
            console.log(idXoa);
            // xóa cookie
            delete cartItems[idXoa] ;
            //tạo ngày và cập nhật lại cookie
            let expiresDate = new Date();
            expiresDate.setMonth(expiresDate.getMonth()+3);
            $.cookie("cart",JSON.stringify(cartItems),{expires:expiresDate});

            CustomPNotify('Thông báo thành công', 'Sản phẩm đã được xóa khỏi giỏ hàng','success');
            setTimeout(function() {
              window.location.href = "/cart";
              }, 1000);
          }else if(result.dismiss === Swal.DismissReason.cancel){
            $(this).val('1');
          }


        });
    }

  })
})

// hàm xóa sản phẩm khỏi giỏ hàng
function deleteCart(button){
  let cartItems = JSON.parse($.cookie('cart'));
  delete cartItems[button.getAttribute('data-id')];

  let expiresDate = new Date();
  expiresDate.setMonth(expiwresDate.getMonth()+3);
  $.cookie("cart",JSON.stringify(cartItems),{expires:expiresDate});

  console.log(cartItems);

  CustomPNotify('Thông báo thành công', 'Sản phẩm đã được xóa khỏi giỏ hàng','success');
  setTimeout(function() {
    window.location.href = "/cart";
    }, 1000);
}

// hàm lưu thông tin đơn hàng
let selectedProducts = [];
let total_price;
let quantityProducts;
$(document).on('click', '.order-checkbox:checked', function() {
  selectedProducts=[];
  quantityProducts=0;
  total_price=0;
  $('.order-checkbox:checked').each(function() {
      total_price += parseInt( $(this).parents('tr').find('td:eq(5)').text());
      quantityProducts+= parseInt( $(this).parents('tr').find('td:eq(4) input').val());
      selectedProducts.push({
      id: $(this).val(),
      quantity: parseInt( $(this).parents('tr').find('td:eq(4) input').val()),
      price :$(this).data('price'),
      original_price : $(this).data('price'),
      total_priceProduct : parseInt( $(this).parents('tr').find('td:eq(5)').text())
    });
  });



});

$(document).on('click','#submitCart',function(){

  console.log(total_price);
  if(selectedProducts.length ==0){
    console.log('hàm rỗng');
    CustomPNotify('Thông báo', 'Vui lòng tích chọn sản phẩm cần đặt','error');
    return;
  }else{
    axios({
      'method':'POST',
      'url':'luu-order',
      'data': {
        name: $('#name-2').val(),
        address: $('#address').val(),
        phone: $('#phone-2').val(),
        total_price : total_price,
        quantityProducts :quantityProducts,
        selectedProducts : selectedProducts
      }
    }).then(function(res){
        if(res.data.status==200){
          console.log(res.data);
          CustomPNotify('Thông báo', 'Đặt hàng thành công!','success');
          // xóa cookie của những sản phẩm đã đặt.
          let cartItems = JSON.parse($.cookie('cart'));
          $.each(selectedProducts,(index,product)=>{

            delete cartItems[product.id];

          })

          let expiresDate = new Date();
          expiresDate.setMonth(expiresDate.getMonth()+3);
          $.cookie("cart",JSON.stringify(cartItems),{expires:expiresDate});
            setTimeout(function (){
                window.location.href="/cart";
            },3000);
        }else{
          console.log(res.data.message);
          CustomPNotify('Thông báo', 'Đặt hàng thất bại','error');
        }

    });


    // console.log(selectedProducts);

  }

});


// hàm custom pnotify
function CustomPNotify(title, text,type){
  new PNotify({
      title: title,
      text: text,
      icon: 'icofont icofont-info-circle',
      type: type
  });
}
