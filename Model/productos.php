<?php

@session_start();

require 'bd.php';

class productos extends BD_PDO {
    function productos_usados(){
        $productos = $this->Ejecutar_Instruccion("SELECT tbl_productos.nombre, nombres, matricula,tbl_carrera.nombre,img from tbl_productos INNER JOIN tbl_detalle ON tbl_productos.ID_producto=tbl_detalle.id_producto INNER JOIN tbl_usuario ON tbl_detalle.id_usuario=tbl_usuario.matricula INNER JOIN tbl_carrera ON tbl_usuario.carrera=tbl_carrera.ID_carrera WHERE activo=1 ORDER BY ID_detalle DESC");
        return $productos;
    }
    function lista_prod_usados($buscar){
        $lista ="";
        foreach ($buscar as $renglon){
            $lista.='<button class="box">';
            $lista.='<img src="../img/'.$renglon[4].'" alt="'.$renglon[0].'">';
            $lista.='<h2>'.$renglon[0].'<br>'.$renglon[1].'<br>'.$renglon[3].'</h2>';
            $lista.='<div id="clock_wrapper">';
            $lista.='<canvas id="clock" width="30" height="30"></canvas>';
            $lista.='<div id="timer"></div>';
            $lista.='</div>';
            $lista.='</button>';
        }
        return $lista;
    }
    function insertar_detalle($id, $matricula, $mifecha){
        $this->Ejecutar_Instruccion("INSERT INTO tbl_detalle (id_producto, id_usuario, fecha_reserva, activo) VALUES ($id,$matricula,'$mifecha',1");
    }
}

?>