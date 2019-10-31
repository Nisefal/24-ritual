<?php
session_start();

include_once '../models/model_content.php';
include_once '../models/model_catalog.php';
include_once '../models/model_list.php';
include_once '../models/model_API.php';




if (isset($_POST["action"])){

    $function = htmlspecialchars($_POST["action"]).'_action';
    $function($_POST["data"], $_POST["key"]);

}

//возвращает список заведений по странице
function list_content_action($key){
	
	if(!validate_key($key))
		exit();

    $model_list = new Model_list();
    $HTML_pages = $model_list->getList($_POST["url"]);

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);


}


function validate_key($key) {
	$model = new Model_API();
	$result = $model->check_key($key);
	return $result;
}

