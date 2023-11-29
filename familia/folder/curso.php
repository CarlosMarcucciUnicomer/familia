<?php
require_once '../controlador/cursocontrolador.php';
$objcurso=new cursocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objcurso->mostrar();
    elseif ($op=="nuevo")
        $objcurso->nuevo();
    elseif ($op=="guardar")
        $objcurso->guardar();
    elseif ($op=="editar")
        $objcurso->editar();
    elseif($op=="update")
        $objcurso->update();
        elseif($op=="insertar")
            $objcurso->insertar();
        elseif($op=="recibir")
            $objcurso->recibir();
            elseif($op=="eliminar")
                $objcurso->eliminar();
?>
