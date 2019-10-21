<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-11
 * Time: 18:45
 */?>

<form action="#" method="post">
    <div class="one_third first">
        <label for="name">Name <span>*</span></label>
        <input type="text" name="name" id="name" value="" size="22">
    </div>
    <div class="one_third">
        <label for="email">Mail <span>*</span></label>
        <input type="text" name="email" id="email" value="" size="22">
    </div>
    <div class="one_third">
        <label for="url">Website</label>
        <input type="text" name="url" id="url" value="" size="22">
    </div>
    <div class="block clear">
        <label for="comment">Your Comment</label>
        <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
    </div>
    <div>

        <input type="text" class="display-none" name="action" value="fom-auth">


        <input name="submit" type="submit" value="Submit Form">
        &nbsp;
        <input name="reset" type="reset" value="Reset Form">
    </div>
</form>


<!--

<script>




    //локально записывает id открытой модалки, сделал так, так как была уже встроенная функция в шаблоне
    //надо было где то хранить переменную
    //+изменяет окно на дефолтное если был сформирован заказ
    function feedback(order_id) {

        $('input[name="now_id"]').val(order_id);


        if(!document.getElementById('ajax_form')){


            $('#result_form').html('<form method="get" id="ajax_form" action="" ><div class="form-group"><label>Сопроводительное письмо</label><textarea class="form-control" rows="3" name="feedbackText" placeholder="Текст ..."></textarea></div><div class="form-group"><label>Цена</label><input type="text" class="form-control" name="feedbackPrice" placeholder="Стоимость работы"></div><input type="text" class="display-none" name="action" value="orderFeedback"><input type="hidden" value="0" name="now_id"><button id="btn" type="button" class="btn btn-primary btn-block btn-flat">Отправить отклик</button></form>');

            $('input[name="now_id"]').val(order_id);
            documentOrderList_ready();

        } else {

            $('input[name="now_id"]').val(order_id);

        }


    }





    function documentOrderList_ready() {

        $(document ).ready(function() {
            $("#btn").click(
                function(){

                    if($("#feedbackText").val().length ===0){

                        alert('Поле с текстом не может быть пустым');

                    }else if($("#feedbackPrice").val().length ===0){

                        alert('Поле с ценой не может быть пустым');

                    }else{

                        console.log('форма с заявкой отправлена');
                        sendAjaxForm('result_form', 'ajax_form');
                        return false;

                    }

                }
            );
        });
    }



    function sendAjaxForm(result_form, ajax_form) {

        jQuery.ajax({
            url: "/application/controllers/ajax_controller.php", //url страницы (action_ajax_form.php)
            type: "GET", //метод отправки
            dataType: "html", //формат данных
            data: jQuery("#" + ajax_form).serialize(),  // Сеарилизуем объект
            success: function (response) { //Данные отправлены успешно

                result = jQuery.parseJSON(response);

                $('#result_form').html(result.result_orderFeedback);


            },


            error: function (response) { // Данные не отправлены
                $('#result_form').html('<h3>Ошибка</h3><br><p>Попробуйте позже, в случае повторения, сообщить на почту info@referator.com</p>');
            }
        });
    }




    document.addEventListener("DOMContentLoaded", documentOrderList_ready);









</script>-->