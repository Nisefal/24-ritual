<?php
/**
 * Created by PhpStorm.
 * User: homushka
 * Date: 02.10.2018
 * Time: 16:17
 */

include_once'application/models/model_navigation.php';


    $model_navigation = new Model_Navigation();
///<?=$model_navigation->get_url(5)
/// хороший способ сделать динамику - но для каждой стрчоки делать свой запрос - это пиздец, нужно будет на потом подумать

?>


<nav id="menu">

    <ul>
        <!--<li><a href="index.php">Главная</a></li>-->
        <li>
            <span class="opener">Услуги</span>
            <ul>
                <li><a href="/ritualnyy-agent">Ритуальный агент</a></li>
                <li><a href="/kremaciya-lyudey">Кремация</a></li>
                <li><a href="/pohorony-v-moskve">Похороны в Москве</a></li>
            </ul>
        </li>
        <li>
            <span class="opener">Ритуальные товары</span>
            <ul>
                <li><a href="ritualnye-venki">Венки</a></li>
                <li><a href="#">Кресты</a></li>
                <li><a href="#">Гробы</a></li>
            </ul>
        </li>
    </ul>

</nav>

<section>
    <header class="major">
        <h2>Полезная информация</h2>
    </header>
    <div class="mini-posts">
        <article>
            <a href="/kak-vybrat-gorod" class="image"><img src="/images/old/gk07.jpg" alt="" /></a>
            <p>Как выбрать гроб.</p>
        </article>
        <article>
            <a href="/chto-delat-esli-umer-chelovek" class="image"><img src="/images/old/3005083823_0810857cd8_o2.jpg" alt="" /></a>
            <p>Что делать если умер человек.</p>
        </article>
        <article>
            <a href="/kak-obshchatsya-s-administraciey-kladbishch" class="image">
                <img src="/images/eddie-howell-606929-unsplash.jpg" alt="" />
            </a>
            <p>Как общаться с администрацией кладбищ.</p>
        </article>
    </div>
    <ul class="actions">
<!--        <li><a href="#" class="button">Больше</a></li>
-->    </ul>
</section>
