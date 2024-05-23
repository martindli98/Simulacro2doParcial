<?php

class Venta{
    private $numero;
    private $fecha;
    private $referenciaAlCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numeroV,$fechaV,$referenciaAlClienteV,$arrayMotosV,$precioFinalV){
        $this->numero=$numeroV;
        $this->fecha=$fechaV;
        $this->referenciaAlCliente=$referenciaAlClienteV;
        $this->arrayMotos=$arrayMotosV;;
        $this->precioFinal=$precioFinalV;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getReferenciaAlCliente(){
        return $this->referenciaAlCliente;
    }

    public function getArrayMotos(){
        return $this->arrayMotos;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($numeroV){
        $this->numero=$numeroV;
    }

    public function setFecha($fechaV){
        $this->fecha=$fechaV;
    }

    public function setReferenciaAlCliente($referenciaAlClienteV){
        $this->referenciaAlCliente=$referenciaAlClienteV;
    }

    public function setArrayMotos($arrayMotosV){
        $this->arrayMotos=$arrayMotosV;
    }

    public function setPrecioFinal($precioFinalV){
        $this->precioFinal=$precioFinalV;
    }

    public function mostrarArregloMoto(){
        $cadena="";
        foreach ($this->getArrayMotos() as $moto){
            $cadena.=$moto."\n";
        }
        return $cadena;
    }

    public function incorporarMoto($objMoto){
        $arrayM=$this->getArrayMotos();
        if ($objMoto->getActiva()==true){
            $arrayM[]=$objMoto;
            $this->setArrayMotos($arrayM);
            $valor=$objMoto->darPrecioVenta();
            $precioFinal=$this->getPrecioFinal()+$valor;
            $this->setPrecioFinal($precioFinal);
        }
    }
  
    public function __toString(){
       $cadena = "\nNumero venta :".$this->getNumero()."\n";
       $cadena.= "Fecha: ".$this->getFecha()."\n";
       $cadena.= "Referencia al cliente: ".$this->getReferenciaAlCliente()."\n";
       $cadena.= "Arreglo Motos: ".$this->mostrarArregloMoto()."\n";
       $cadena.= "Precio Final: $".$this->getPrecioFinal()."\n";

       return $cadena;
    }

    public function retornarTotalVentaNacional(){
        $colMotos=$this->getArrayMotos();
        $total=0;
        foreach ($colMotos as $moto){
            if ($moto instanceof MotoNacional){
                if ($moto->darPrecioVenta() != -1){
                    $precioMotos=$moto->darPrecioVenta();
                    $total=$total+$precioMotos;
                }
            }
        }
        return $total;
    }

    public function retornarMotosImportadas(){
        $motosImportadas=[];
        $colMotos=$this->getArrayMotos();
        foreach ($colMotos as $moto){
            if ($moto instanceof MotoImportada){
                $motosImportadas[]=$moto;
            }
        }
        return $motosImportadas;
    }
}