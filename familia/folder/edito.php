<?php
require_once '../controlador/editocontrolador.php';
$objedito=new editocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objedito->mostrar();
    elseif ($op=="nuevo")
        $objedito->nuevo();
    elseif ($op=="guardar")
        $objedito->guardar();
    elseif ($op=="editar")
        $objedito->editar();
    elseif($op=="update")
        $objedito->update();
        elseif($op=="insertar")
            $objedito->insertar();
        elseif($op=="recibir")
            $objedito->recibir();
            elseif($op=="eliminar")
                $objedito->eliminar();
?>
