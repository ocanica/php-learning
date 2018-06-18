<?php

require 'bootstrap.php';
$amazon = $query['amazon'];

$amazonImages = new FetchImages($amazon['url']);

$amazonImages->fetchImages('pocoyo');

$amazonImages->displayImages();



