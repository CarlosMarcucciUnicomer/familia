<?php
require_once '../controlador/librocontrolador.php';
$objlibro=new librocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objlibro->mostrar();
    elseif ($op=="nuevo")
        $objlibro->nuevo();
    elseif ($op=="guardar")
        $objlibro->guardar();
    elseif ($op=="editar")
        $objlibro->editar();
    elseif($op=="update")
        $objlibro->update();
        elseif($op=="insertar")
            $objlibro->insertar();
        elseif($op=="recibir")
            $objlibro->recibir();
            elseif($op=="eliminar")
                $objlibro->eliminar();
?>
