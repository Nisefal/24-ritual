
//возвращает список статей в левую колонку
function get_pages() {

    $.ajax({
        url: '/application/modules/form_and_pages/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getPages'
        },
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            $('#left_navigation').html(result.HTML_pages);
            return result.HTML_pages;
        },
        error: function(response) { // Данные не отправлены
            createAlert('Проблема с возвращением списка статей','danger',1500);
        }
    });
}
//вешает прослушку на кнопку и отправка данных на бек
function form_button(){
    $('form button').on("click",function(e) {

        e.preventDefault();
        if (document.getElementById("title").value === '' || document.getElementById("url").value === '') {
            createAlert('Поле title и url обязательны к заполнению', 'danger', 1500);

        } else {

            $('#question_html').val($("#page_form > div.block.clear > textarea").val());
            var formData = $('#page_form').serializeArray(); //Ваша переменная;



              $.ajax({
                  type: "POST",
                  url: "/application/controllers/ajax_controller.php",
                  data: {
                      action: 'saveContent',
                      data: formData
                  },
                  success: function (response) {
                      result = jQuery.parseJSON(response);
                      createAlert('Записано', 'success', 1500);
                      $(".hide-on-mobile").remove();

                      console.log('успешно');
                      $new_navigation = get_pages();
                      $('#left_navigation').html($new_navigation);


                  },
                  error: function (response) { // Данные не отправлены
                      createAlert('ошибка, данные не ушли', 'danger', 1500);
                  }
              });
        }
    });
}

//кнопка "новая статья"
function new_content(){
    document.getElementById('page_form').reset();
    document.getElementById('href').remove();
    $('#textarea').val('');
}
//возвращает контент кконкретной страницы
function add_content(url){
    $.ajax({
        url: '/application/controllers/ajax_controller.php',
        method: 'POST',
        data: {
            action: 'getData',
            data: url
        },
        success: function(response) {



            result = jQuery.parseJSON(response);


             $('input[name="page_content_id"]').val(result.page_content[0]['page_content_id']);
             $('input[name="url"]').val(result.page_content[0]['url']);
             $('input[name="title"]').val(result.page_content[0]['title']);
             $('input[name="description"]').val(result.page_content[0]['description']);
             $('input[name="keywords"]').val(result.page_content[0]['keywords']);
             $('input[name="robots"]').val(result.page_content[0]['robots']);
             $('input[name="json_ld"]').val(result.page_content[0]['json_ld']);
             $('input[name="h1"]').val(result.page_content[0]['h1']);
             $('input[name="preview"]').val(result.page_content[0]['preview']);
             $url = result.page_content[0]["url"];
             document.getElementById("link").innerHTML = '<p id="href"><a target="_blank" href="'+$url+'">24-ritual.ru'+$url+'</a></p>';
             $('#textarea').val(result.page_content[0]['content']);


            $('.multiple').html(result.modules_multiple);

        },
        error: function(response) { // Данные не отправлены
            createAlert('ошибка возвращения данных по статье','danger',1500);
        }
    });
}
document.addEventListener("DOMContentLoaded", get_pages);
document.addEventListener("DOMContentLoaded", form_button);

