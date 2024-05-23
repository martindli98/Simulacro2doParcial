<?php

class MotoNacional extends Moto{
    private $porcentajeDescuento;

    public function __construct($codigo,$costo,$anio_fabricacion,$descripcion,$por_inc_anual,$activa,$porcentajeDescuento){
        parent::__construct($codigo,$costo,$anio_fabricacion,$descripcion,$por_inc_anual,$activa);
        $this->porcentajeDescuento=$porcentajeDescuento ?? 15;
    }

    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento){
        $this->porcentajeDescuento=$porcentajeDescuento;
    }

    public function __toString(){
        $cadena = "\n".parent :: __toString()."\n";
        $cadena .= "Porcentaje descuento: ".$this->getPorcentajeDescuento()."%\n";

        return $cadena;
    }

    public function darPrecioVenta(){
        $venta=parent::darPrecioVenta();
        $porDescuento=$this->getPorcentajeDescuento();
        if ($venta != -1){
            $descuento=($venta*$porDescuento)/100;
           // if ($descuento >= 0){
            $venta=$venta-$descuento;
            //}
        }
        return $venta;
    }
}