<?php

$tasks = $query->selectAll('todo');

require 'views/index.view.php';