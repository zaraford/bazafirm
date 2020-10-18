<?php

$config = require_once 'config.php';

// try {
	
	$db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
		PDO::ATTR_EMULATE_PREPARES => false, 
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]);
// } catch (PDOException $error) {
	
// 	echo $error->getMessage();
// 	exit('Database error');
	
// }

// $userQuery = $db->prepare('SELECT * FROM admins');
// 		$userQuery->execute();
// 		$result = $userQuery->fetchAll();
// 		print_r($result);
?>