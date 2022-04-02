<?php

class EDetalleservicio{
    //Atributo
    private $iddetalleservicio;
    private $idservicio;
    private $idcontacto;

    //Metodo magico para obtener el valor del atributo
    public function __GET($campo){
        return $this->$campo;
    }

    //Metodo magico para asignar el valor al atributo
    public function __SET($campo, $valor){
        $this->$campo = $valor;
    }
}
?>