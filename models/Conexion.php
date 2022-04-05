<?php

//Obtenemos el acceso a las constantes
require_once 'parametros.php';

class Conexion{
    //Atributos
    private $servidor = HOST;
    private $usuario = USER;
    private $clave = PASSWORD;
    private $baseDatos = DATABASE;

    //Metodo de conexión
    //Clases: MsSQLi, PDO (más completa)
    public function getConexion(){
        //Constructor = cadena de conexión, nombre de usuario, clave
        $conectaBD = new PDO("mysql:host={$this->servidor};port=3306;dbname={$this->baseDatos};charset=utf8", $this->usuario, $this->clave);
        return $conectaBD;
    }
}
?>