<?php
$conn = new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$sql = "UPDATE alumno SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM alumno ORDER BY idalum DESC limit 5";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fere"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<li>
    
<a href='#' class='media add-tooltip' data-title='Used space : 95%' data-container='body' data-placement='bottom'>
 <span class='label label-info pull-right'>New</span>
        <div class='media-left'>
            <i class='ti-user icon-2x text-main'></i>
        </div>
            <div class='media-body'>
                <p class='text-nowrap text-main text-semibold'>New Student</p>
                   <small>$fechaFormateada</small>  
            </div>
</a>  
</li>";
}
if(!empty($response)) {
	print $response;
}


?>