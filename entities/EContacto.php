<?php

class EContacto{
    private $idcontacto;
    private $idredsocial;
    private $telefono;
    private $correoelectronico;

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