<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 2019-04-11
 * Time: 18:45
 */?>
<meta name="robots" content="noindex">
<form action="#" method="post" id="page_form">
    <input type="text" class="display-none" name="page_content_id" value="" style="display: none;">
    <div class="one_third first">
        <label for="name">title</label>
        <input type="text" id="title" required name="title"  value="" size="22">
        <label for="name">url</label>
        <input type="text" id="url" required name="url"  value="" size="22">
    </div>
    <div class="one_third">
        <label for="email">description</label>
        <input type="text" name="description" value="" size="22">
    </div>
    <div class="one_third">
        <label for="url">keywords</label>
        <input type="text" name="keywords" value="" size="22">
    </div>
    <div class="one_third">
        <label for="url">robots</label>
        <input type="text" name="robots"  value="" size="22">
    </div>
    <div class="one_third">
        <label for="url">json</label>
        <input type="text" name="json" value="" size="22">
    </div>
    <div class="one_third">
        <label for="url">h1</label>
        <input type="text" name="h1"  value="" size="22">
    </div>
    <div class="one_third">
        <label for="preview">preview</label>
        <input type="text" name="preview"  value="" size="22">
    </div>
    <div class="one_third">
        <label for="preview">Ссылка на статью</label>
        <p id="link"><p id="href"></p></p>
    </div>

    <div class="one_third multiple">



    </div>




    <div class="block clear">
        <label for="comment">content</label>
        <textarea id="textarea" name="content" cols="25" rows="10" style="width: 100%; height: 250px; padding: 5px 5px 5px;"></textarea>
        <input type="hidden" id="question_html" name="content_hidden" />
    </div>
    <div>
        <br><br>
        <button type="submit" name="save">Сохранить</button>
    </div>
</form










<link rel="stylesheet" type="text/css" href="/application/src/lala/css/lala-alert.css">
<script type="text/javascript" src="/application/src/lala/js/lala-alert.js"></script>
<!-- Third-party shit -->
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/application/src/lala/css/bootstrap.css">
<!-- Lala alert section -->
<div id="lala-alert-container"><div id="lala-alert-wrapper"></div></div>

<script type="text/javascript" src="/application/modules/form_and_pages/script.js"></script>


