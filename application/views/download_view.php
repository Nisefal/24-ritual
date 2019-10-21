<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 27.06.2018
 * Time: 2:05
 */
?>


<h1>Загрузка изображений на сайт</h1>
<form method="post" action="/download" enctype="multipart/form-data">
    <p><input type="text" name="name" placeholder="Название товара"></p>
    <p><input type="text" name="price" placeholder="Стоимость товара(только цифры)"></p>
    <p>
        <select name="type">
            <option disabled>Выберите тип товара</option>
            <option value="1">Крест</option>
            <option value="2">Гроб</option>
            <option value="3">Венок</option>
            <option value="4">Гирлянда</option>
        </select>
    </p>
    <p><input type="file" id="userfile" name="userfile"></p>
    <p><input type="submit" value="Загрузить"></p>
</form>

