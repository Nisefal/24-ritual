<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-29
 * Time: 17:52
 */


include_once 'application/config/db.php';


class Model_rss{


    public function add_rss() {


        $db  = new db();
        $rs_result = $db->db_function("SELECT *
                                                FROM  route, page_content
                                                WHERE route.page_content_id = page_content.id
                                                AND page_content.status = '1'
                                                ORDER BY date_create
                                      ");

        $all_item  = '';
        $enclosure = '';


        while ($row = mysqli_fetch_assoc($rs_result)) {

            $data_dob = date(DATE_RFC822, strtotime($row['date_create'])); // переводим дату в нужный для RSS формат

            $id =  $row['id']; // ид записи (новости)
            $title =  $row['title']; // заголовок новости
            $des =  strip_tags($row['description']); // описание новости, удаляем все html теги
            $image =  $row['preview']; // картинка новости (превью)
            $text =  $row['content']; // текст новости (в тексте новости могут быть лишние теги, картинки которые с относительными путями к рисункам, а они должны быть абсолютными)

        // преобразуем пути картинок, т.е вместо /img_news/image.jpg должно быть https://seolik.ru/img_news/image.jpg
            $text = str_ireplace("/images/", "https://24-ritual.ru/images/", $text);

        // ищем все картинки в новости и добавляем их в описании публикации
            $doc = new DOMDocument();
            @$doc->loadHTML($text);

            $tags = $doc->getElementsByTagName('img');


            foreach ($tags as $tag) {
                $enclosure .= '<enclosure url="'.$tag->getAttribute('src').'" type="image/jpeg" />'.PHP_EOL;
            }


        // удаляем все атрибуты style
            $text = preg_replace('/(<[^>]+) style=".*?"/iu', '$1', $text);


        // все рисунки помещаем в тег <figure>
            $text = preg_replace('/(<img.+?>)/iu','<figure>$1</figure>', $text);

        // Преобразует все HTML-сущности в соответствующие символы
            $text = html_entity_decode($text);

        // Удаляем все html теги кроме нужных нам в разметке
            $text =  strip_tags($text, '<p><a><img><figure>');


        // ПЕРЕМЕННАЯ превью картинки. Первое изображение в статье, размеченное этим элементом, отображается на карточке в ленте Дзена
            $image_first = '<figure><img src="https://24-ritual.ru'.$image.'"></figure>';

        // добавляем элементы item rss для Дзен https://yandex.ru/support/zen/publishers/rss-modify.html#publication
            $all_item = $all_item.'
        <item>
            <title>'.$title.'</title>
            <link>https://24-ritual.ru/rss/'.$id.'</link>
            <pdalink>https://24-ritual.ru/rss/'.$id.'</pdalink>
            <media:rating scheme="urn:simple">nonadult</media:rating>
            <pubDate>'.$data_dob.'</pubDate>
            <author>24-ritual.ru</author>
            <category>Информация</category>
            <enclosure url="https://24-ritual.ru'.$image.'" type="image/jpeg"/>
            '.$enclosure.'
            <description>
                <![CDATA[
        '.$image_first.'
        '.$des.'
                ]]>
            </description>
            <content:encoded>
                <![CDATA[
               '.$text.'
                ]]>
            </content:encoded>
        </item>';
        }

        // начало описание источника https://yandex.ru/support/zen/publishers/rss-modify.html#source
        $channel = '<?xml version="1.0" encoding="UTF-8"?>
        <rss version="2.0"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:media="http://search.yahoo.com/mrss/"
        xmlns:atom="http://www.w3.org/2005/Atom"
        xmlns:georss="http://www.georss.org/georss">
        <channel>
        <title>Информационный портал по риутальным услугам 24-ritual.ru</title>
        <link>https://24-ritual.ru</link>
        <description>
        Круглосуточная ритуальная служба по вопросам похоронного дела города Москвы, проводит похороны, оказывает помощь в сборе документов. Работает 24 часа, предоставляет ритуальные товары и услуги - 24-ritual.ru
        </description>
        <language>ru</language>';

        // окончание описания источника
        $channel_end = '</channel></rss>';

        // записываем готовый rss в файл
        $gotovo = $channel.$all_item.$channel_end;
        $file = $_SERVER['DOCUMENT_ROOT'].'/rss.xml';
        file_put_contents($file, $gotovo);

    }


}