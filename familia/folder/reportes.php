<?php
require_once '../controlador/asistenciacontrolador.php';
$objasistencia=new asistenciacontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objasistencia->mostrar();
    elseif ($op=="nuevo")
        $objasistencia->nuevo();
    elseif ($op=="guardar")
        $objasistencia->guardar();
    elseif ($op=="editar")
        $objasistencia->editar();
    elseif($op=="update")
        $objasistencia->update();
        elseif($op=="insertar")
            $objasistencia->insertar();
        elseif($op=="recibir")
            $objasistencia->recibir();
            elseif($op=="eliminar")
                $objasistencia->eliminar();
?>
