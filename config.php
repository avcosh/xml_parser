<?php 
// Массив с параметрами подключения к базе данных
    $params = [
        'host' => 'localhost',
        'dbname' => 'testovoe',
        'user' => 'root',
        'password' => '',
        ];
    
    // Устанавливаем соединение    
	$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
	$db = new PDO($dsn, $params['user'], $params['password']);
    
	// Задаем кодировку
	$db->exec("set names utf8");
	return $db;