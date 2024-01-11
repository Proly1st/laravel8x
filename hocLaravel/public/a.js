let products = response.data;
products.data.forEach(function (product) {
    let img = $('<td> <img src="' + product.image + '" class="img-fluid" alt="tbl"style="width: 72px; height: auto;"></img></td>');
    let name = $('<td>' + product.name + '</td>');
    let inventory = $('<td>' + product.inventory + '</td>');
    let description = $('<td>' + product.description + '</td>');

    let status;
    switch (product.status) {
        case '1':
            status = $('<td>Đang hoạt động</td>');
            break;

        case '0':
            status = $('<td>Tạm ngưng</td>');
            break;

        case '-1':
            status = $('<td>Dừng hoạt động</td>');
            break;

    }
    let price = $('<td>' + product.price + '</td>');
    let promotion = $('<td>' + product.promotion + '</td>');
    let promotion_type = $('<td>' + product.promotion_type + '</td>');

    let action = $('<td class="action-icon"></td>');
    let editaction = $(' <a href="#!" class="m-r-15 text-muted edit-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icofont icofont-ui-edit"></i></a>');
    editaction.on('click', function () {
        console.log('edit hàng');
    })

    let deleteaction = $('<a href="#!" class="text-muted delete-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icofont icofont-delete-alt"></i></a>');
    deleteaction.on('click', function () {
        console.log('xoa hàng');
    })

    

    newRow.append(action);
    $('#e-product-list').append(newRow);
});

/**
 * Khởi tạo biến quá nhiều tốn bộ nhớ -> code chạy chậm, chỉ khởi tạo biến khi cần sử dụng nó nhiều hơn 1 lần
 * Dùng es6 thay vì es5
 * es5: let a = '<tr>'+xyz+'</tr>';
 * es6: let a = `<tr>${xyz}</tr>`;
 * Update
 */
let data = '';
for (const v of response.data) {
    let status = '';
    switch (v.status) {
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
    data += `<tr><td> <img src="'${v.image} +'" class="img-fluid" alt="tbl"style="width: 72px; height: auto;"></img></td>
           <td>${v.name}</td>
           <td>${v.inventory}</td>
           <td>${v.description}</td>
           ${status}
           <td>${v.price}</td>
           <td>${v.promotion}</td>
           <td>${v.promotion_type}</td>
           <td class="action-icon">
              <a href="#!" class="m-r-15 text-muted edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update()"><i class="icofont icofont-ui-edit"></i></a>
              <a href="#!" class="text-muted delete-btn" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete()"><i class="icofont icofont-delete-alt"></i></a>
           </td></tr>`;
}

$('#e-product-list').append(data);