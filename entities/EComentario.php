<?php

class EComentario{
    //Atributo
    private $idcomentario,
    private $idproveedor;
    private $comentario;
    private $puntuacion;

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