<?php

@session_start();

require 'bd.php';

class index extends BD_PDO {
    function productos_usados_cont(){
        $productos_usados_con = $this->Ejecutar_Instruccion("SELECT count(*) total FROM tbl_detalle WHERE activo = 1");
        return $productos_usados_con[0][0];
    }
    function productos_usados(){
        $productos_usados = $this->Ejecutar_Instruccion("SELECT * FROM tbl_detalle WHERE activo = 1");
        return $productos_usados;
    }
    function total_productos(){
        $total_productos = $this->Ejecutar_Instruccion("SELECT SUM(cantidad) FROM tbl_productos");
        return $total_productos[0][0];
    }
    function admin(){
        $result = $this->Ejecutar_Instruccion("SELECT nombres, apellidoP FROM tbl_admin LIMIT 1");
        $admin = $result[0][0].' '.$result[0][1];
        return $admin;
    }
    function tabla_detalle(){
        $result_tabla = $this->Ejecutar_Instruccion("SELECT tbl_productos.nombre, nombres, matricula,tbl_carrera.nombre FROM tbl_productos INNER JOIN tbl_detalle ON tbl_productos.ID_producto=tbl_detalle.id_producto INNER JOIN tbl_usuario ON tbl_detalle.id_usuario=tbl_usuario.matricula INNER JOIN tbl_carrera ON tbl_usuario.carrera=tbl_carrera.ID_carrera WHERE activo = 1 ORDER by ID_detalle DESC"); 
        return $result_tabla;
    }
    function tabla_reserva($result){
        $tabla="";
        foreach ($result as $renglon)
        {
            $tabla.='<tr>';
            $tabla.='<td>'.$renglon[0].'</td>';
            $tabla.='<td>'.$renglon[1].'</td>';
            $tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
            $tabla.='<td></td>';
            $tabla.='</tr>';
        }
        return $tabla;
    }
}

?>