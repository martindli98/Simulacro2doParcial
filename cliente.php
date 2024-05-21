<?php

class Cliente{
    private $nombre;
    private $apellido;
    private $condicion;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre,$apellido,$condicion,$tipoDoc,$numDoc){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->condicion=$condicion;
        $this->tipoDoc=$tipoDoc;
        $this->numDoc=$numDoc;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getCondicion(){
        return $this->condicion;
    }

    public function setCondicion($condicion){
        $this->condicion = $condicion;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }

    public function getNumDoc(){
        return $this->numDoc;
    }

    public function setNumDoc($numDoc){
        $this->numDoc = $numDoc;
    }

    public function __toString(){
        $cadena = "\nNombre: ".$this->getNombre()."\n";
        $cadena.= "Apellido: ".$this->getApellido()."\n";
        $cadena.= "Estado: ".$this->getCondicion()."\n";
        $cadena.= "Tipo documento: ".$this->getTipoDoc()."\n";
        $cadena.= "Numero documento: ".$this->getNumDoc()."\n";

        return $cadena;
    }
}