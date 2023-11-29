<?php
require_once '../controlador/seccioncontrolador.php';
$objsecc=new seccioncontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objsecc->mostrar();
    elseif ($op=="nuevo")
        $objsecc->nuevo();
    elseif ($op=="guardar")
        $objsecc->guardar();
    elseif ($op=="editar")
        $objsecc->editar();
    elseif($op=="update")
        $objsecc->update();
        elseif($op=="insertar")
            $objsecc->insertar();
        elseif($op=="recibir")
            $objsecc->recibir();
            elseif($op=="eliminar")
                $objsecc->eliminar();
?>
