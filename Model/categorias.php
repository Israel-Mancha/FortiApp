<?php

@session_start();

require 'bd.php';

class categorias extends BD_PDO {
    function instrumentos(){
        $productos = $this->Ejecutar_Instruccion("SELECT nombre, img, ID_producto FROM tbl_productos WHERE ID_cat=1 AND cantidad > 0");
        return $productos;
    }
    function deportivos(){
        $productos = $this->Ejecutar_Instruccion("SELECT nombre, img, ID_producto FROM tbl_productos WHERE ID_cat=2 AND cantidad > 0");
        return $productos;
    }
    function cultural(){
        $productos = $this->Ejecutar_Instruccion("SELECT nombre, img, ID_producto FROM tbl_productos WHERE ID_cat=3 AND cantidad > 0");
        return $productos;
    }
    function productos_disponibles($productos){
        $lista ="";
        foreach ($productos as $renglon){
            $lista.='<div class="card" data-id="'. $renglon[2].'">';
            $lista.='<img src="../img/'.$renglon[1].'" alt="'.$renglon[0].'">';
            $lista.='<p>'.$renglon[0].'</p>';
            $lista.='</div>';
        }
        return $lista;
    }
}

?>