//возвращает список статей в левую колонку

console.log('Подгрузился js файл к модулю рекомендации к продукту');
function get_pages() {

    $.ajax({
        url: '/application/modules/recommendation_product/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getRecommendationProduct'
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('.recommendation_product_content').html(result.HTML_pages);
        },
        error: function(response) { // Данные не отправлены
            console.log('Проблема с возвращением рекомендации к продукту');
        }
    });
}


document.addEventListener("DOMContentLoaded", get_pages);
