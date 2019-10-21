<?php

include_once'application/config/db.php';

/*
 * Содержит 3 метода,
 * 1 - возвращает все товара для каталога,
 * 2 - возвращает каталог конкретного товара,
 * 3 - возвращает страницу товара
 * 4 - возвращает рекомендации
 *
 * */

class Model_catalog
{

//возвращает каталоги товаров
    function returnCatalog()
    {
        $db = new db();
        $resultSet = $db->db_function("SELECT `catalog_type`.preview, `route`.url, `catalog_type`.name
                                                          FROM `catalog_type`, `page_content`, `route`
                                                              WHERE `route`.page_content_id = `page_content`.id
                                                              AND `catalog_type`.page_content_id = `page_content`.id
                                                              AND `catalog_type`.status = '1' 

");


        $HTML = ' <figure>';
        while (($row = $resultSet->fetch_assoc()) != false) {
            $HTML = $HTML . '
                    <div class="inLine">
                    <a href="' . $row["url"] . '"><img src="' . $row["preview"] . '" alt=""></a>
                        <p>' . $row["name"] . '</p>
                    </div>
                    ';

        }
        $HTML = $HTML . '</figure>';
        return $HTML;
    }


    function getCatalogProduct($url)
    {
        $db = new db();
        $resultSet = $db->db_function("SELECT *
                                                FROM `catalog`
                                                WHERE `catalog`.type = 
                                                      (
                                                        
                                                        select get_params
                                                            from modules_pages
                                                            where page_content_id = 

                                                                    (	
                                                                        select page_content_id from route, page_content
                                                                            where route.url='$url'
                                                                            and route.page_content_id = page_content.id
                                                                
                                                                    )
                                                            and modules_type_id = '9'
                                                          
                                                      )

");


        $HTML = ' <figure>';

        while (($row = $resultSet->fetch_assoc()) != false) {
            $HTML = $HTML . '
                    <div class="inLine">
                        <a href="/ritualnyy-magazin/ritualniy-tovar?tovar=' . $row["id"] . '">
                        <li  class="first"><img src="' . $row["url"] . '" alt="">
                        <div class="center"><p class="market">' . $row["name"] . '</p></div>
                        <div class="center"><p class="market">' . $row["cost"] . ' рублей</p>
                        </div></li>
                        </a>
                    </div>
                    ';

        }
        $HTML = $HTML . '</figure>';

        return $HTML;
    }


//возвращает рекомендации
    function getRecommendationProduct()
    {
        $db = new db();


        $resultSet = $db->db_function("SELECT 
                                                * FROM `catalog` 
                                                  WHERE status = 1
                                                  ORDER BY RAND() LIMIT 5");


        $HTML = '<div class="dopCatalogBlock"><div class="marketBox">';
        $id = $_GET['id'];


        while (($row = $resultSet->fetch_assoc()) != false) {


            $HTML = $HTML . '
                    <div>
                         <a  href="/ritualnyy-magazin/ritualniy-tovar?tovar=' . $row["id"] . '" >
                            <img src="' . $row["url"] . '" id = "marketDopPng" alt="" onclick=cookieFunction("last_id","' . $id . '");>
                         </a>
                    </div>
                    ';
        }

        $HTML = $HTML . '</div></div>';
        return $HTML;

    }


    function getProductCart($product_id)
    {


        $db = new db();
        $resultSet = $db->db_function("SELECT 
                                                * FROM `catalog` 
                                                  WHERE id = '$product_id'");






        $HTML = '
                <a href="/pages/market/market.php" onclick="DeleteCookieFunction(&quot;last_id&quot;);">« Вернуться назад</a>
                    <div class="wrapper row7">
                        <section id="info2" class="clear">
                            <div id="positionLeft">
                                <div class="one_half_2 first">

        
        
        
        ';


        while (($row = $resultSet->fetch_assoc()) != false) {

            $HTML = $HTML . '
                    <a class="example-image-link" id="img_msk_open" href="' . $row["url"] . '" data-lightbox="example-1">
                    <img class="example-image" id="img_msk" src="' . $row["url"] . '" alt="' . $row["alt"] . '" title="' . $row["meta_title"] . '" width="150" height="150"></a>
                    </div>
                    
                    <div class="center btmspace-80 mskPosition">
                                        <p class="lrspace"></p>
                                        
                                        <h1>' . $row["name"] . '</h1>
                                        <p> ' . $row["cost"] . ' рублей</p>
                                        <p> ' . $row["description"] . '</p>
                                       
                    </div>
                    </div>
                     </section>
                     </div>
                    
                    

                    ';
        }

        $getRecommendationProduct = $this->getRecommendationProduct();
        $HTML = $HTML . '</div></div>' . $getRecommendationProduct;
        return $HTML;


    }



}