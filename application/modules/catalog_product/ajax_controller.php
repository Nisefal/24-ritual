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

function getCatalogProduct_action($key){
	
	if(!validate_key($key))
		exit();

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->getCatalogProduct($_POST["url"]);

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

