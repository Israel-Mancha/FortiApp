<?php

@session_start();

require 'bd.php';

class crud extends BD_PDO {
    function admin(){
        $result = $this->Ejecutar_Instruccion("SELECT nombres, apellidoP FROM tbl_admin LIMIT 1");
        $admin = $result[0][0].' '.$result[0][1];
        return $admin;
    }
    function buscar($nombre){
        $result = $this->Ejecutar_Instruccion("SELECT ID_producto,tbl_productos.nombre,tbl_categoria.nombre,cantidad FROM tbl_productos INNER JOIN tbl_categoria ON tbl_productos.ID_cat=tbl_categoria.ID_categoria WHERE tbl_productos.nombre LIKE '%$nombre%'");
        return $result;
    }
    function buscar_mod($id_producto){
        $update_result = $this->Ejecutar_Instruccion("SELECT * FROM tbl_productos WHERE ID_producto = '$id_producto'");
        return $update_result;
    }
    function actualizar($nombre,$img,$categoria,$cant,$ID){
        $this->Ejecutar_Instruccion("UPDATE tbl_productos SET nombre='$nombre', img='$img', ID_cat=$categoria,cantidad=$cant WHERE ID_producto = $ID");
    }
    function tabla_productos($result){
        $tabla = "";
        foreach ($result as $renglon){
            $tabla.='<tr>';
            $tabla.='<td>'.$renglon[0].'</td>';
            $tabla.='<td>'.$renglon[1].'</td>';
            $tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
            $tabla.='<td><button onclick="javascript: eliminar('.$renglon[0].');">Eliminar</button>';
            $tabla.='<button onclick="javascript: modificar('.$renglon[0].');">Modificar</button></td></tr>';
        }
        return $tabla;
    }
}

?>