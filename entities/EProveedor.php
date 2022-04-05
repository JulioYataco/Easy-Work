<?php

class EProveedor{
    //Atributos
    private $idproveedor;
    private $iddistrito;
    private $nombres;
    private $apellidos;
    private $fechanac;
    private $telefono;
    private $correo;
    private $clave;
    private $fotoperfil;
    private $nivelacceso;

    //Metodo magico para obtener valor del atributo
    public function __GET($campo){
        return $this->$campo;
    }

    //Metodo magico para asignar el valor al atributo
    public function __SET($campo, $valor){
        $this->$campo = $valor;
    }
}

?>