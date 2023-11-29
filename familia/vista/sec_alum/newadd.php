<?php
session_start();
$con = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

if(isset($_POST['agregar']))
{
   

    $idsec = $_POST['idsec'];
    $alumno = $_POST['alumno'];
    
    foreach($alumno as $item)
    {
        // echo $item . "<br>";
        $query = "INSERT INTO alum_secc (idsec,idalum) VALUES ('$idsec','$item')";
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