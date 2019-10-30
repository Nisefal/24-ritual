//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю карточки товара');
function get_pages() {


    var params = window
        .location
        .search
        .replace('?','')
        .split('&')
        .reduce(
            function(p,e){
                var a = e.split('=');
                p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                return p;
            },
            {}
        );


    var tovar = params['tovar'].split('?')[0];


    $.ajax({
        url: '/application/modules/cart_product/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getProductCart',
            product_id: tovar
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.product_cart_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            createAlert('Проблема с возвращением с карточкой товара','danger',1500);
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
