<?php

class ERedsocial{
    //Atributo
    private $idredsocial;
    private $redsocial;

    //Metodo magico para obtener valor del atributo
    public function __GET($campo){
        return $this->$campo;
    }

    //Metodo magico para asignar el valor al atributo
    publicc function __SET($campo, $valor){
        $this->$campo = $valor;
    }
}
?>