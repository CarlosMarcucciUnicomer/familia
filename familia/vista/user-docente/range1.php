<?php

	$conn=mysqli_connect("localhost", "u760722394_dbcolegio_user", "UMGAntigua2022", "u760722394_dbcolegio");
	$id = $_GET['id'];
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	if(ISSET($_POST['search'])){
		
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		
		
		$query=mysqli_query($conn, "SELECT asisten_alumn.idasisa, alumno.idalum, alumno.dnia, alumno.noma, alumno.apea, alumno.foto, alumno.direcc, alumno.correo, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.imagen, seccion.idsec, seccion.nomsec,asisten_alumn.presen,asisten_alumn.fecha_create ,GROUP_CONCAT(subgrado.codsub, '..', subgrado.noms, '..' SEPARATOR '__') AS subgrado FROM asisten_alumn INNER JOIN alumno ON asisten_alumn.idalum = alumno.idalum INNER JOIN docente ON asisten_alumn.iddoce = docente.iddoce INNER JOIN seccion ON asisten_alumn.idsec = seccion.idsec INNER JOIN subgrado ON subgrado.codsub =seccion.codsub WHERE seccion.idsec = '$id'  BETWEEN '$date1' AND '$date2' GROUP BY asisten_alumn.idasisa") 


		or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
	
		<td><?php  echo "<img src='../../assets/img/subidas/".$fetch['foto']."'width='50'"; ?></td> 

		<td> <span class="label label-info"><?php echo $fetch['noma']; ?> &nbsp; <?php echo $fetch['apea']; ?></span></td>

		<td> <span class="label label-purple"><?php echo $fetch['nomsec']; ?></span></td>

		<?php foreach(explode("__", $fetch['subgrado']) as $subgradoConcatenados){ 
                $subgrado = explode("..", $subgradoConcatenados)
                 ?>
               <td><span class="label label-mint"><?php echo $subgrado[1] ?></span></td>

        <?php } ?>
		
		<td>

     <?php 
        if($fetch['presen'] == 'Asistio')
             echo " <span class='label label-success'> Asistio";                         
           else 
        if($fetch['presen'] == 'Tarde')
              echo "<span class='label label-warning'> Tarde";
              else 
              if($fetch['presen'] == 'Falto')
          echo "<span class='label label-danger'> Falto";                    
           ?>    

        </td>

        <td> <span class="label label-warning"><?php echo $fetch['fecha_create']; ?></span> </td> 
		
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>No hay asistencias en el rango de fechas</center></td>
			</tr>';
		}
	}else{
		$id = $_GET['id'];
		$query=mysqli_query($conn, "SELECT asisten_alumn.idasisa, alumno.idalum, alumno.dnia, alumno.noma, alumno.apea, alumno.foto, alumno.direcc, alumno.correo, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.imagen, seccion.idsec, seccion.nomsec,asisten_alumn.presen,asisten_alumn.fecha_create ,GROUP_CONCAT(subgrado.codsub, '..', subgrado.noms, '..' SEPARATOR '__') AS subgrado FROM asisten_alumn INNER JOIN alumno ON asisten_alumn.idalum = alumno.idalum INNER JOIN docente ON asisten_alumn.iddoce = docente.iddoce INNER JOIN seccion ON asisten_alumn.idsec = seccion.idsec INNER JOIN subgrado ON subgrado.codsub =seccion.codsub WHERE seccion.idsec = '$id' GROUP BY asisten_alumn.idasisa") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
	
		<td><?php  echo "<img src='../../assets/img/subidas/".$fetch['foto']."'width='50'"; ?></td> 

		<td> <span class="label label-info"><?php echo $fetch['noma']; ?> &nbsp; <?php echo $fetch['apea']; ?></span></td>

		<td> <span class="label label-purple"><?php echo $fetch['nomsec']; ?></span></td>

		<?php foreach(explode("__", $fetch['subgrado']) as $subgradoConcatenados){ 
                $subgrado = explode("..", $subgradoConcatenados)
                 ?>
               <td><span class="label label-mint"><?php echo $subgrado[1] ?></span></td>

        <?php } ?>
		
		<td>

     <?php 
        if($fetch['presen'] == 'Asistio')
             echo " <span class='label label-success'> Asistio";                         
           else 
        if($fetch['presen'] == 'Tarde')
              echo "<span class='label label-warning'> Tarde";
              else 
              if($fetch['presen'] == 'Falto')
          echo "<span class='label label-danger'> Falto";                    
           ?>    

        </td>

        <td> <span class="label label-warning"><?php echo $fetch['fecha_create']; ?></span> </td> 
		
	</tr>
<?php
		}
	}
?>
