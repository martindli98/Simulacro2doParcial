<?php 

class Empresa{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentasRealizadas; 

    public function __construct($denominacion,$direccion,$arrayClientes,$arrayMotos,$arrayVentasRealizadas){
        $this->denominacion=$denominacion;
        $this->direccion=$direccion;
        $this->arrayClientes=$arrayClientes;
        $this->arrayMotos=$arrayMotos;
        $this->arrayVentasRealizadas=$arrayVentasRealizadas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getArrayClientes(){
        return $this->arrayClientes;
    }
    public function setArrayClientes($arrayClientes){
        $this->arrayClientes = $arrayClientes;
    }
    public function getArrayMotos() {
        return $this->arrayMotos;
    }
    public function setArrayMotos($arrayMotos){
        $this->arrayMotos = $arrayMotos;
    }

    public function getArrayVentasRealizadas(){
        return $this->arrayVentasRealizadas;
    }
    public function setArrayVentasRealizadas($arrayVentasRealizadas) {
        $this->arrayVentasRealizadas = $arrayVentasRealizadas;

    }

    public function mostrarArrayMoto(){
        $cadena="";
        foreach ($this->getArrayMotos() as $moto){
            $cadena.=$moto."\n";
        }
        return $cadena;
    }

    
    public function mostrarArrayClientes(){
        $cadena="";
        foreach ($this->getArrayClientes() as $cliente){
            $cadena.=$cliente."\n";
        }
        return $cadena;
    }

    public function mostrarArrayVentasRealizadas(){
     $cadena="";
        foreach ($this->getArrayVentasRealizadas() as $venta){
            $cadena.=$venta."\n";
        }
        return $cadena;
    }

    /* 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */

    public function retornarMoto($codigoMoto){
        $i=0;
        $banderita = false;
        $moto= null;
        $arrayM= $this->getArrayMotos();
        while ($i<(count($arrayM)) && $banderita==false){
            if ($arrayM[$i]->getCodigo() == $codigoMoto){
                $banderita= true;
                $moto= $arrayM[$i];
            }
            $i++;
        }
        return $moto;
    }

    public function registrarVenta($colCodigosMoto,$objCliente){
        $precioFinally=0;
        if ($objCliente->getCondicion()==true){
        $arrayMotos=[];
        $precioFinal=0;
        $arrayVentas= $this->getArrayVentasRealizadas();
        $numeroVenta=count($arrayVentas)+1;
        $venta= new Venta($numeroVenta,date("Y-m-d"),$objCliente,$arrayMotos,$precioFinal);
        foreach ($colCodigosMoto as $codigo){
            $moto= $this->retornarMoto($codigo);
            if (($moto <> null) ){
                $venta->incorporarMoto($moto);         
            }
        } 
        $arrayVentas[]=$venta;   
        $this->setArrayVentasRealizadas($arrayVentas);
        $precioFinally= $venta->getPrecioFinal();
        }

        return $precioFinally;
       
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $array=[];
        $arrayVentasRealizadas=$this->getArrayVentasRealizadas();
        foreach ($arrayVentasRealizadas as $venta){
            $objClienteVenta= $venta->getReferenciaAlCliente();
            if (($objClienteVenta->getNumDoc()==$numDoc) && ($objClienteVenta->getTipoDoc()==$tipo)){
                $array[]=$venta;
            }
        }
        return $array;
    }

    public function __toString(){
        $cadena= "\nEMPRESA: ".$this->getDenominacion()."\n";
        $cadena .= "DIRECCION: ".$this->getDireccion()."\n";
        $cadena .= "ARRAY CLIENTES: \n".$this->mostrarArrayClientes()."\n";
        $cadena .= "ARRAY MOTOS: ".$this->mostrarArrayMoto()."\n";
        $cadena .= "ARRAY VENTAS REALIZADAS: ".$this->mostrarArrayVentasRealizadas()."\n";

        return $cadena;
    }

    public function informarSumaVentasNacionales(){
        $suma=0;
        $colVentas=$this->getArrayVentasRealizadas();
        foreach ($colVentas as $venta){
            $suma=$suma+$venta->retornarTotalVentaNacional();
        }
        return $suma;
    }

    public function informarVentasImportadas(){
        $motosImportadas=[];
        $colVentas=$this->getArrayVentasRealizadas();
        foreach ($colVentas as $venta){
            $contador=count($venta->retornarMotosImportadas());
            if ($contador>0){
                $motosImportadas[]=$venta;
            }
        }
        return $motosImportadas;
    }
}
