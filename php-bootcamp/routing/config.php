<?php

return [

    'database' => [

        'dbname' => 'test',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:hostname=127.0.0.1',
        'options' => [

            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ]

    ]

];