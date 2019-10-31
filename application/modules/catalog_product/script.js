//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю каталог продукта');
function get_pages() {

    $.ajax({
        url: '/application/modules/catalog_product/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getCatalogProduct',
            url: window.location.pathname
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.catalog_product_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            console.log('Проблема с возвращением списка товара');
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
