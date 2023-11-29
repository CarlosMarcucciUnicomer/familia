<?php
require_once '../controlador/alumnocontrolador.php';
$objalum=new alumnocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objalum->mostrar();
    elseif ($op=="nuevo")
        $objalum->nuevo();
    elseif ($op=="guardar")
        $objalum->guardar();
    elseif ($op=="editar")
        $objalum->editar();
    elseif($op=="update")
        $objalum->update();
        elseif($op=="insertar")
            $objalum->insertar();
        elseif($op=="recibir")
            $objalum->recibir();
            elseif($op=="eliminar")
                $objalum->eliminar();
?>
