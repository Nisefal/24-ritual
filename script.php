<?php

include_once 'application/models/model_csv.php';
include_once 'application/models/model_rss.php';

$model_csv = new Model_csv();
$model_csv->add_csv();


$model_rss = new Model_rss();
$model_rss->add_rss();
