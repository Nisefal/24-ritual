<?php
session_start();

include_once '../models/model_catalog.php';
include_once '../models/model_API.php';




if (isset($_POST["action"])){

    $function = htmlspecialchars($_POST["action"]).'_action';
    $function($_POST["data"], $_POST["key"]);

}

//возвращает html-список типов товара
function getCatalog_action($key){
	
	if(!validate_key($key))
		exit();

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->returnCatalog();

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

