<?php
session_start();

include_once '../models/model_content.php';
include_once '../models/model_API.php';




if (isset($_POST["action"])){

    $function = htmlspecialchars($_POST["action"]).'_action';
    $function($_POST["data"], $_POST["key"]);

}


function contentPage_action($data, $key){
    
    if(!validate_key($key))
        exit();

    $model_content = new Model_Content();

    $result = array(
        'model_content' => $model_content->get_data(htmlspecialchars($_GET["action"]))
    );


    echo json_encode($result);

}


function getData_action($key){
    
    if(!validate_key($key))
        exit();

    $model_content = new Model_Content();
    $page_content = $model_content->get_data($_POST["data"], '');
    $modules_multiple = $model_content->get_multiple($_POST["data"]);


    $result = array(
        'page_content' => $page_content,
        'modules_multiple' => $modules_multiple
    );


    echo json_encode($result);
}

function getPages_action($data, $key){
    
    if(!validate_key($key))
        exit();

    $model_content = new Model_Content();

    $HTML_pages = $model_content->get_pages();


    $result = array(
        'HTML_pages' => $HTML_pages
    );


    echo json_encode($result);


}


function saveContent_action($data, $key){
    
    if(!validate_key($key))
        exit();

    $model_content = new Model_Content();
    $HTML_pages = $model_content->saveContent($data);

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

