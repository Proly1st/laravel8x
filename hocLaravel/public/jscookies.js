$(function(){
    $('#input-cookie').on('input paste',function(){
        let input = $('#input-cookie').val();

        // console.log(input);
        document.cookie=`input1Value = ${input};expires=Thu, 18 May 2024 12:00:00 UTC;path=/`;
    })
})

$(function(){
    function getCookieValue(cookieName) {
        var cookies = document.cookie.split(';');

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.startsWith(cookieName + '=')) {
            return cookie.substring(cookieName.length + 1);
            }
        }
        return null; 
      }
      
      // Sử dụng hàm để lấy giá trị của cookie
      var inputValue = getCookieValue('input1Value');
      
      if (inputValue) {
        console.log("Giá trị của cookie là: " + inputValue);
        $('#input-cookie').val(inputValue);
      } else {
        console.log("Không tìm thấy cookie.");
      }
})
