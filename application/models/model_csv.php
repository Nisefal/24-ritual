<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-29
 * Time: 17:52
 */


include_once 'application/config/db.php';


class Model_csv{


    public function add_csv(){




        $db = new db();
        $create_data = $db->db_function("SELECT 
                                                    catalog.id, 
                                                    'true' 	 AS available,
                                                    'true' 	 AS delivery,
                                                    'true' 	 AS pickup,
                                                    'false'   AS store,
                                                     CONCAT('https://24-ritual.ru/pages/market/marketOpen.php?id=',catalog.id) AS url,
                                                    'ООО 24-ritual' AS vendor,
                                                     catalog.name AS name,
                                                     catalog_type.name AS category,
                                                     catalog.cost AS price,
                                                     ROUND (catalog.cost * 1.23, -1) AS oldprice,
                                                    'RUR' AS currencyId,
                                                     CONCAT('https://24-ritual.ru',catalog.url) AS picture,
                                                     catalog.nameFull AS description,
                                                     '' AS param,
                                                     'Наличные, Visa/Mastercard, б/н расчет' AS sales_notes,
                                                     'true' AS manufacturer_warranty,
                                                     '' AS country_of_origin,
                                                     '' AS barcode,
                                                     '' AS bid,
                                                     '' AS cbid
                                                      
                                                    FROM catalog, catalog_type
                                                    WHERE catalog.type = catalog_type.id
                                                    AND catalog.status = 1;
                                      ");



        $fp = fopen('catalog_csv.csv', 'w');

        while ($line = mysqli_fetch_assoc($create_data)) {

            fputcsv($fp, $line, ';');

        }

        fclose($fp);

        $fp = iconv('windows-1250', 'utf-8', file_get_contents('catalog_csv.csv'));
        $handle=fopen("php://memory", "rw");
        fwrite($handle, $fp);
        fseek($handle, 0);


    }



}