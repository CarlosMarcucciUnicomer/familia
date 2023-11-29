
<?php
	
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

	if(isset($_POST['update'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$presen = $_POST['presen'];
			

			$sql = "UPDATE asisten_alumn SET presen = '$presen'  WHERE idasisa = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Asistencia actualizado correctamente' : 'No se puso actualizar la asistencia o ingrese la asistencia';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: docente_curso.php');

?>