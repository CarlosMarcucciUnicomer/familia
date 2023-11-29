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
 

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO docente (nombre,apellido,dni,genero,correo,telefono,imagen,usuario,clave,cargo) VALUES (:nombre,:apellido,:dni,:genero,:correo,:telefono,:imagen,:usuario,:clave,:cargo)");

		
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'],':apellido' => $_POST['apellido'], ':dni' => $_POST['dni'],':genero' => $_POST['genero'],':correo' => $_POST['correo'],':telefono' => $_POST['telefono'],
		':imagen' => $_FILES['imagen']['name'], ':usuario' => $_POST['usuario'],':clave' => MD5($_POST['clave']),':cargo' => $_POST['cargo'] ))) ? 'Guardado correctamente' : 'Algo salió mal. No se puede agregar';	


	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../../folder/docente.php');
	
?>

<?php
   /*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "u760722394_dbcolegio_user";
$db_pass = "UMGAntigua2022";
$db_name = "u760722394_dbcolegio";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
  
   $imagen = $_FILES['imagen'];
 
  

// Cargando el fichero en la carpeta "subidas"

move_uploaded_file($imagen['tmp_name'], "../../assets/img/subidas/".$imagen['name']);


		?>