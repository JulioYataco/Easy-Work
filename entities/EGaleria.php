<?php

class EGaleria{
    //Atributo
    private $idgaleria;
    private $foto;
    private $video;

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