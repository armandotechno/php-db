<?php

// Esto debe de estar en una variable de entorno
$server   = "localhost";
$database = "finanzas_personales";
$username = "root";
$password = "password";

// Conexión con el driver PDO
$connection = new PDO("mysql:host=$server;dbname=$database", $username, $password);

$setnames = $connection->prepare("SET NAMES 'utf8'");
$setnames->execute();

var_dump($setnames);
