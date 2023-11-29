<?php
require_once '../controlador/gradocontrolador.php';
$objgrado=new gradocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objgrado->mostrar();
    elseif ($op=="nuevo")
        $objgrado->nuevo();
    elseif ($op=="guardar")
        $objgrado->guardar();
    elseif ($op=="editar")
        $objgrado->editar();
    elseif($op=="update")
        $objgrado->update();
        elseif($op=="insertar")
            $objgrado->insertar();
        elseif($op=="recibir")
            $objgrado->recibir();
            elseif($op=="eliminar")
                $objgrado->eliminar();
?>
