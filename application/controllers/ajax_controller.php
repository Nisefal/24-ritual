<?php
session_start();

include_once '../models/model_content.php';
include_once '../models/model_catalog.php';
include_once '../models/model_list.php';





if (isset($_POST["action"])){

    $function = htmlspecialchars($_POST["action"]).'_action';
    $function($_POST["data"]);

}


function contentPage_action($data){

    $model_content = new Model_Content();

    $result = array(
        'model_content' => $model_content->get_data(htmlspecialchars($_GET["action"]))
    );


    echo json_encode($result);


}


function getPages_action($data){


    $model_content = new Model_Content();

    $HTML_pages = $model_content->get_pages();


    $result = array(
        'HTML_pages' => $HTML_pages
    );


    echo json_encode($result);


}

function getData_action(){



    $model_content = new Model_Content();
    $page_content = $model_content->get_data($_POST["data"], '');
    $modules_multiple = $model_content->get_multiple($_POST["data"]);




    $result = array(
        'page_content' => $page_content,
        'modules_multiple' => $modules_multiple
    );


    echo json_encode($result);


}


function saveContent_action($data){

    $model_content = new Model_Content();
    $HTML_pages = $model_content->saveContent($data);

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);

}
//возвращает html-список типов товара
function getCatalog_action(){

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->returnCatalog();

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);

}



function getCatalogProduct_action(){

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->getCatalogProduct($_POST["url"]);

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);

}

function getRecommendationProduct_action(){

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->getRecommendationProduct();

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);

}



function getProductCart_action(){

    $model_catalog = new Model_catalog();
    $HTML_pages = $model_catalog->getProductCart($_POST["product_id"]);

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);


}



//возвращает список заведений по странице
function list_content_action(){

    $model_list = new Model_list();
    $HTML_pages = $model_list->getList($_POST["url"]);

    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);


}


function cartObject_action(){

    $model_list = new Model_list();
    $HTML_pages = $model_list->cartObject($_POST["product_id"]);


    $result = array(
        'HTML_pages' => $HTML_pages
    );

    echo json_encode($result);

}






