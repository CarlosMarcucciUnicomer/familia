<?php
require_once '../controlador/subcontrolador.php';
$objsub=new subcontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objsub->mostrar();
    elseif ($op=="nuevo")
        $objsub->nuevo();
    elseif ($op=="guardar")
        $objsub->guardar();
    elseif ($op=="editar")
        $objsub->editar();
    elseif($op=="update")
        $objsub->update();
        elseif($op=="insertar")
            $objsub->insertar();
        elseif($op=="recibir")
            $objsub->recibir();
            elseif($op=="eliminar")
                $objsub->eliminar();
?>
