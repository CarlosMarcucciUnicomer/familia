<?php
session_start();
$con = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

if(isset($_POST['agregar']))
{
    $brands = $_POST['brands'];

    $nomsec = $_POST['nomsec'];
    $codsub = $_POST['codsub'];
    $iddoce = $_POST['iddoce'];
    $curso =  $_POST['curso'];
    $capa = $_POST['capa'];
    $estado = $_POST['estado'];
   

    foreach($curso as $item)
    {
        // echo $item . "<br>";
        $query = "INSERT INTO seccion (nomsec,codsub,iddoce,idcur,capa,estado) VALUES ('$nomsec','$codsub','$iddoce',
            '$item','$capa','$estado')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: ../../folder/seccion.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: ../../folder/seccion.php");
    }
}
?>