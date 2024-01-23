$(function(){
    let cart = $.cookie("cart");
   
    if(cart){
       let cartItems = JSON.parse(cart);
        let keys = Object.keys(cartItems);
       console.log(keys);
   
        axios.get('showcart', {
          params: {
            productIDs: keys
          }
        }).then(function(response){
          if(response.data.status===200){
            let data='';
            let quantity;
            for(let v of response.data.data){
               quantity= cartItems[v.id].quantity;
              data+=` <tr class="odd">
                          <td class="action-icon text-center">
                              <input type="checkbox" class="order-checkbox" value="${v.id}">
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
                              <input type="text" class="soluong form-control" value="${quantity} " data-id="${v.id}">
                          </td>
                          <td>${v.price*quantity}</td>

                          <td class="action-icon text-center">
                              <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top" 
                              data-original-title="Delete" onclick="deleteCart(this)" data-id="${v.id}"><i class="icofont icofont-delete-alt"></i></a>
                          </td>
                      </tr>`
            }
            $('#e-product-list tbody').append(data);
           
            console.log(response.data.data);
            console.log(cartItems);
          }else{
            console.log(response.data.message);
          }

        })
   
    }

      
  $(document).on('input paste','.soluong',function(){

    let soluong = parseInt($(this).val());
    if(isNaN(soluong)){
      return;
    }
    let idXoa= $(this).data('id');
    let donGia= $(this).parents('tr').find('td:eq(2)').text();

    let thanhTien = donGia*soluong;
    $(this).parents('tr').find('td:eq(4)').text(thanhTien);
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

function deleteCart(button){
  let cartItems = JSON.parse($.cookie('cart'));
  delete cartItems[button.getAttribute('data-id')];
  
  let expiresDate = new Date();
  expiresDate.setMonth(expiresDate.getMonth()+3);
  $.cookie("cart",JSON.stringify(cartItems),{expires:expiresDate});

  console.log(cartItems);

  CustomPNotify('Thông báo thành công', 'Sản phẩm đã được xóa khỏi giỏ hàng','success');
  setTimeout(function() {
    window.location.href = "/cart";
    }, 1000);
}

// hàm custom pnotify
function CustomPNotify(title, text,type){
  new PNotify({
      title: title,
      text: text,
      icon: 'icofont icofont-info-circle',
      type: type
  });
}