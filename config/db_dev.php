<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=valint_prod',
    'username' => 'valint_user1',
    'password' => 'yoVzC95C',
    'charset' => 'utf8',
    'tablePrefix' => 'app_',
];
/*
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'pgsql:host=localhost;dbname=db_name',
	'username' => 'db_username',
	'password' => 'db_password',
	'charset' => 'utf8',
	'schemaMap' => [
		'pgsql'=> [
			'class'=>'yii\db\pgsql\Schema',
			'defaultSchema' => 'public' //specify your schema here
		]
	], // PostgreSQL
];
*/