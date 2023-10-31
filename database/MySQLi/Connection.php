<?php

// Esto debe de estar en una variable de entorno
$server   = "localhost";
$database = "finanzas_personales";
$username = "root";
$password = "password";

// Esta es la forma de conectarse procedural
// $mysqli = mysqli_connect($server, $username, $password, $database);


// Esta es la forma de conectarse orientada a objetos
$mysqli = new mysqli($server, $username, $password, $database);


// Comprobar conexión de manera procedural
// if (!$mysqli) {
// die("Falló la conexión: " . mysqli_connect_error());
// }

// Comprobar conexión de manera orientada a objetos
if ($mysqli->connect_errno) {
    die("Falló la conexión: {$mysqli->connect_error}");
}

// Esto es para usar cualquier caracter en las consultas
$setnames = $mysqli->prepare("SET NAMES 'utf8'");
$setnames->execute();

var_dump($setnames);
