<?php

// Crear el namespace para que composer reconozca la clase al precargar.
namespace Database\MySQLi;

// Crear la clase para la autocarga de archivos de composer
// Se suele colocar el nombre del archivo a la clase
class Connection
{
    private static $instance;

    private $connection;

    private function __construct()
    {
        $this->make_connection();
    }

    public static function getInstance()
    {

        // Si esta propiedad no es una misma instancia de ella misma, la volvemos una instancia 
        // self hace referencia al nombre de Connection, pero para referirse a la misma clase se usa el self
        if (!self::$instance instanceof self) {
            self::$instance = new self();

            return self::$instance;
        }
    }

    public function get_database_instance()
    {
        return $this->connection;
    }

    private function make_connection()
    {
        // Esto debe de estar en una variable de entorno
        $server   = "localhost";
        $database = "finanzas_personales";
        $username = "root";
        $password = "password";

        // Esta es la forma de conectarse procedural
        // $mysqli = mysqli_connect($server, $username, $password, $database);


        // Esta es la forma de conectarse orientada a objetos
        $mysqli = new \mysqli($server, $username, $password, $database);


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

        $this->connection = $mysqli;
    }
}
