<?php
require_once '../controlador/autocontrolador.php';
$objauto=new autocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objauto->mostrar();
    elseif ($op=="nuevo")
        $objauto->nuevo();
    elseif ($op=="guardar")
        $objauto->guardar();
    elseif ($op=="editar")
        $objauto->editar();
    elseif($op=="update")
        $objauto->update();
        elseif($op=="insertar")
            $objauto->insertar();
        elseif($op=="recibir")
            $objauto->recibir();
            elseif($op=="eliminar")
                $objauto->eliminar();
?>
