<?php

include 'cliente.php';
include 'empresa.php';
include 'venta.php';
include 'moto.php';
include 'motoNacional.php';
include 'motoImportada.php';

$objCliente1= new Cliente ("Zinedine","Zenon",true,"dni",41298462);
$objCliente2= new Cliente ("Equi","Fernandez",false,"dni",45234987);

$objMoto1=new MotoNacional(11,2230000,2022,"Benelli Imperiale 400",85,true,10);
$objMoto2=new MotoNacional(12,584000,2021,"Zanella Zr 150 Ohc",70,true,10);
$objMoto3=new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250",55,false,0);
$objMoto4=new MotoImportada(14,12499900,2020,"Pitbbike Enduro Motocross Apollo Aii 190cc Plr",100,true,"Francia",6244400);

$objEmpresa= new Empresa("Alta Gama","Av Argentina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3,$objMoto4],[]);

$objEmpresa->registrarVenta([11,12,13,14],$objCliente2);
$objEmpresa->registrarVenta([13,14],$objCliente2);
$objEmpresa->registrarVenta([14,2],$objCliente2);
echo $objEmpresa."\n";

function mostrarArregloInformarVentasImportadas($ventasImp){
    $cadena="";
    foreach ($ventasImp as $venta){
        echo $cadena.="\n".$venta;
    }
}

echo "\n -----VENTAS IMPORTADAS----\n";
$ventasImp=mostrarArregloInformarVentasImportadas($objEmpresa->informarVentasImportadas());

echo "\n -----VENTAS NACIONALES----\n";
echo "$".$objEmpresa->informarSumaVentasNacionales();
