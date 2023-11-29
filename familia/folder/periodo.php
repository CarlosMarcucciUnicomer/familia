<?php
require_once '../controlador/periodocontrolador.php';
$objperiodo=new periodocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objperiodo->mostrar();
    elseif ($op=="nuevo")
        $objperiodo->nuevo();
    elseif ($op=="guardar")
        $objperiodo->guardar();
    elseif ($op=="editar")
        $objperiodo->editar();
    elseif($op=="update")
        $objperiodo->update();
        elseif($op=="insertar")
            $objperiodo->insertar();
        elseif($op=="recibir")
            $objperiodo->recibir();
            elseif($op=="eliminar")
                $objperiodo->eliminar();
?>
