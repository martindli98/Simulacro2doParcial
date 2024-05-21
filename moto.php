<?php

class Moto{
    private $codigo;
    private $costo;
    private $anio_fabricacion;
    private $descripcion;
    private $por_inc_anual;
    private $activa;

    public function __construct($codigo,$costo,$anio_fabricacion,$descripcion,$por_inc_anual,$activa){
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->anio_fabricacion=$anio_fabricacion;
        $this->descripcion=$descripcion;
        $this->por_inc_anual=$por_inc_anual;
        $this->activa=$activa;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }

    public function getAnioFabricacion(){
        return $this->anio_fabricacion;
    }

    public function setAnioFabricacion($anio_fabricacion){
        $this->anio_fabricacion = $anio_fabricacion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getPorIncAnual(){
        return $this->por_inc_anual;
    }

    public function setPorIncAnual($por_inc_anual){
        $this->por_inc_anual = $por_inc_anual;
    }

    public function getActiva(){
        return $this->activa;
    }

    public function setActiva($activa){
        $this->activa = $activa;
    }

    public function __toString(){
        $cadena ="\nCodigo: ".$this->getCodigo()."\n";
        $cadena.="Costo: ".$this->getCosto()."\n";
        $cadena.="Anio Fabricacion: ".$this->getAnioFabricacion()."\n";
        $cadena.="Descripcion: ".$this->getDescripcion()."\n";
        $cadena.="Porcentaje incremento anual: ".$this->getPorIncAnual()."\n";
        $cadena.="activa: ".$this->getActiva()."\n";

        return $cadena;
    }

    public function darPrecioVenta(){
        $venta= -1;
        $compra=$this->getCosto();
        $anio=date("Y")-($this->getAnioFabricacion());
        $porcentaje=$this->getPorIncAnual();
        if ($this->getActiva()==true){
            $venta=$compra+($compra*($anio*$porcentaje));
        }
        return $venta;
    }
}