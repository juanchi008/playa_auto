<?php
 return [
	 'class' => 'yii\db\Connection',
	 'dsn' => 'pgsql:host='.$devIP.';dbname=playa_auto',
	 'username' => 'root',
	 'password' => 'hesoyam',
	 'charset' => 'utf8',
	 'schemaMap' => [
		 'pgsql'=> [
			 'class'=>'yii\db\pgsql\Schema',
			 'defaultSchema' => 'public' //specify your schema here
	 	 ]
 	 ], // PostgreSQL
 ];
 
 /*

	 'username' => 'playauser',
	 'password' => 'playapass',
	 
	 'username' => 'root',
	 'password' => 'hesoyam',
*/