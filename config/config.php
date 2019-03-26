<?php

	return [
	    'environment' => 'dev',
	    'database' => [
            'driver' => 'mysql',
            'host'=> 'localhost',
            'dbname' => 'gestion_administrative',
            'charset' => 'utf8',
            'user' =>'root',
            'password' => ''
        ],
		'logger' => [
            'filePath' => __VAR_DIR__ . 'logs',
            'filename' => 'execution.log'
        ]
	];