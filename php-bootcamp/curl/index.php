<?php

require 'bootstrap.php';

$amazonImages = new FetchImages($provider_url['amazon']);

$amazonImages->fetchImages('pocoyo');

$amazonImages->displayImages();

