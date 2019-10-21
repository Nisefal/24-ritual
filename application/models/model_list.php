<?php

include_once'../../application/config/db.php';

/*
 * Содержит 2 метода,
 * 1 - возвращает все объекты конкретного типа
 * 2 - возвращает карточку объекта
 * */

class Model_list
{

//возвращает все объекты конкретного типа
    function getList($url){
        $db = new db();
        $resultSet = $db->db_function("SELECT *
                                                FROM `objects`
                                                WHERE `objects`.type = 
                                                      (
                                                        
                                                        select get_params
                                                            from modules_pages
                                                            where page_content_id = 

                                                                    (	
                                                                        select page_content_id from route, page_content
                                                                            where route.url='$url'
                                                                            and route.page_content_id = page_content.id
                                                                
                                                                    )
                                                            and modules_type_id = '12'
                                                          
                                                      )

");


        $HTML = '<table border="1" cellspacing="0" cellpadding="0" width="529" style="text-align: center;">
                    <tbody>
                    <tr>
                    <td width="265" valign="top">
                        <p><b>Название больницы</b></p>
                    </td>
                    <td width="265" valign="top">
                        <p><b> Адрес</b></p>
                    </td>
                </tr>';

        while (($row = $resultSet->fetch_assoc()) != false) {
            $HTML = $HTML . '

                            <tr>
                            <td width="265" valign="top">
                            <a href="/spravochnaya-informaciya/ritualniy-obekt/?obekt=' . $row["id"] . '"><p>' . $row["name"] . '</p></a>
                            </td>
                            <td width="265" valign="top">
                            <p>' . $row["adress"] . '</p>
                            </td>
                            </tr>
                            ';





        }
        $HTML = $HTML . '</tbody></table>';
        return $HTML;
    }






//возвращает карточку объекта
    function cartObject($object_id)
    {


        $db = new db();
        $resultSet = $db->db_function("SELECT *
                                                FROM `objects`
                                                WHERE `objects`.id = '$object_id'
                                      ");



        $HTML = '
                    <div class="content three_quarter"><a href="/spravochnaya-informaciya/ritualnye-obekty/morgi-moskvy/">« Вернуться назад</a><br>
                 ';

        while (($row = $resultSet->fetch_assoc()) != false) {
            $HTML = $HTML . '
                                <p><b>Учереждение находится по адресу:</b></p>
                                <p>' . $row["adress"] . '</p>
                                <p><b>Круглосуточная горячая линия по телефону: +7(926)582-00-41 </b></p>
                                
                                <div id="map"></div>
                                
                                <script type="text/javascript">
                                                  var adres = "'. $row["adress"] .'";
                                                  ymaps.ready(init);
                                </script>
                                
                            ';
        }

        $HTML = $HTML . '</figure>';

        return $HTML;
    }





}