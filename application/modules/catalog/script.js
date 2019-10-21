//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю каталог');
function get_pages() {

    $.ajax({
        url: '/application/controllers/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getCatalog',
            url: window.location.pathname
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.gallery_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            createAlert('Проблема с возвращением с типом каталогов товара','danger',1500);
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
