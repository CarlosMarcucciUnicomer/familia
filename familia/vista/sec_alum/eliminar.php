<?php
	session_start();
	Class Connection{
 
	private $server = "mysql:host=localhost;dbname=u760722394_dbcolegio";
	private $username = "u760722394_dbcolegio_user";
	private $password = "UMGAntigua2022";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

	if(isset($_GET['id'])){
		$database = new Connection();
		$idaluse=$_GET['id'];
		$db = $database->open();
		try{
			$sql = "DELETE FROM alum_secc WHERE idaluse = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? ' Borrado' : 'Hubo un error al borrar';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	if($db){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Borrado correctamente',
  showConfirmButton: false,
  timer: 1500
}).then(function() {
            window.location = "mostrar.php?id=<?php echo $idaluse; ?>";
         
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se pudo guardar!'
 
})
       </script>
       <?php

    }

?>