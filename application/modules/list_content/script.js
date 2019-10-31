//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю списка');
function get_pages() {

    $.ajax({
        url: '/application/modules/list_content/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'list_content',
            url: window.location.pathname
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.list_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            console.log('Проблема с возвращением списка учереждений');
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
