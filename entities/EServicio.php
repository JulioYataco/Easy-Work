<?php

class EServicio{
    //Atributo
    private $idservicio;
    private $idproveedor;
    private $idcategoria;
    private $idgaleria;
    private $servicio;
    private $descripcion;
    private $direccion;
    private $favorito;
    private $nivel;

    //Metodo magico para obtener el valor del atributo
    public function __GET($campo){
        return $this->$campo;
    }
    
    //Metodo magico para asignar el valorr al atributo
    public function __SET($campo, $valor){
        $this->$campo = $valor;
    }
}
?>