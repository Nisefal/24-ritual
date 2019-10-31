//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю объекта');
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


    var object = params['obekt'].split('?')[0];


    $.ajax({
        url: '/application/modules/cart_object/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'cartObject',
            product_id: object
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.cart_object_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            createAlert('Проблема с возвращением с карточкой объекта','danger',1500);
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
