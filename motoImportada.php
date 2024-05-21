<?php

class MotoImportada extends Moto{
    private $pais_imp;
    private $impesto_imp;

    public function __construct($codigo,$costo,$anio_fabricacion,$descripcion,$por_inc_anual,$activa,$pais_imp,$impesto_imp){
        parent::__construct($codigo,$costo,$anio_fabricacion,$descripcion,$por_inc_anual,$activa);
        $this->pais_imp=$pais_imp;
        $this->impesto_imp=$impesto_imp;
    }

    public function getPaisImp(){
        return $this->pais_imp;
    }

    public function setPaisImp($pais_imp){
        $this->pais_imp=$pais_imp;
    }

    public function getImpestoImp(){
        return $this->impesto_imp;
    }

    public function setImpestoImp($impesto_imp){
        $this->impesto_imp=$impesto_imp;
    }

    public function __toString(){
        $cadena= "\n".parent::__toString()."\n";
        $cadena.= "Pais origen: ".$this->getPaisImp()."\n";
        $cadena.= "Impuesto importacion: ".$this->getImpestoImp()."%\n";

        return $cadena;
    }

    public function darPrecioVenta(){
        $venta=parent::darPrecioVenta();
        $importe=$venta+($this->getImpestoImp());

        return $importe;
    }
}