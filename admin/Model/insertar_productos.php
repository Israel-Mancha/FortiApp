<?php

@session_start();

require 'bd.php';

class productos_admin extends BD_PDO {
    function admin(){
        $result = $this->Ejecutar_Instruccion("SELECT nombres, apellidoP FROM tbl_admin LIMIT 1");
        $admin = $result[0][0].' '.$result[0][1];
        return $admin;
    }
    function insertar_producto($nombre,$img,$categoria,$cant){
        $this->Ejecutar_Instruccion("insert into tbl_productos (nombre, img, ID_cat, cantidad) values('$nombre','$img','$categoria','$cant')");
    }
    function listados()
    {
        $datos = "";
        $datos_primaria = $this->Ejecutar_Instruccion("SELECT ID_categoria, nombre FROM tbl_categoria");

        foreach ($datos_primaria as $renglon) 
        {
            $datos=$datos.'<option value="'.$renglon[0].'" >'.$renglon[1].'</option>';
        }
        return $datos;
    }
}

?>