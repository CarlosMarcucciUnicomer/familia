<?php
require_once '../controlador/docentecontrolador.php';
$objdocente=new docentecontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objdocente->mostrar();
    elseif ($op=="nuevo")
        $objdocente->nuevo();
    elseif ($op=="guardar")
        $objdocente->guardar();
    elseif ($op=="editar")
        $objdocente->editar();
    elseif($op=="update")
        $objdocente->update();
        elseif($op=="insertar")
            $objdocente->insertar();
        elseif($op=="recibir")
            $objdocente->recibir();
            elseif($op=="eliminar")
                $objdocente->eliminar();
?>
