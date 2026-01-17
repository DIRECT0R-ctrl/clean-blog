<?php

try {
	$host = "localhost";
	$dbname = "cleanblog";
	$user = "postgres";
	$pass = "typhussama5T!";

	$connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}
