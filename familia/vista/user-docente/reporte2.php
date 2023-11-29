
<?php
if (strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0 ) {
	$desde	= $_GET['desde'];
	$hasta	= $_GET['hasta'];
	
	$varDesde = date('d/m/y', strtotime($desde));
	$varHasta = date('d/m/y', strtotime($hasta));

}else{
	$desde	= '1111-01-01';
	$hasta	= '9999-12-30';

	$varDesde = '__/__/__';
	$varHasta = '__/__/__';


}
//------------------------------------------------------------Incluimos el fichero de conexion
Class dbConexion{
/* Variables de conexion */
var $dbhost = "localhost";
var $username = "u760722394_dbcolegio_user";
var $password = "UMGAntigua2022";
var $dbname = "u760722394_dbcolegio";
var $conn;
//Funcion de conexion MySQL
function getConexion() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* Revisamos la conexion */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
//-------------------------------------------------------------------------------------
//----------------------------------------Incluimos la libreria PDF
include_once('../../assets/fpdf/fpdf.php');
class PDF extends FPDF
{

// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('../../assets/img/sinfondo1.png',10,-1,30);
$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'Lista de asistencias de los alumnos',1,0,'C');
// Line break
$this->Ln(20);



}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('idasisa'=>'#', 'noma'=> 'Nombre', 'apea'=> 'Apellidos','nomsec'=> 'Seccion','nombre'=> 'Docente','fecha_create'=> 'Fecha', 'presen'=> 'Asistencia');

$result = mysqli_query($connString, "SELECT asisten_alumn.idasisa, alumno.idalum, alumno.dnia, alumno.noma, alumno.apea, alumno.foto, alumno.direcc, alumno.correo, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.imagen, seccion.idsec, seccion.nomsec,asisten_alumn.presen,asisten_alumn.fecha_create ,GROUP_CONCAT(subgrado.codsub, '..', subgrado.noms, '..' SEPARATOR '__') AS subgrado FROM asisten_alumn INNER JOIN alumno ON asisten_alumn.idalum = alumno.idalum INNER JOIN docente ON asisten_alumn.iddoce = docente.iddoce INNER JOIN seccion ON asisten_alumn.idsec = seccion.idsec INNER JOIN subgrado ON subgrado.codsub =seccion.codsub WHERE asisten_alumn.fecha_create  BETWEEN '$desde' AND '$hasta' GROUP BY asisten_alumn.idasisa") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM asisten_alumn WHERE asisten_alumn.fecha_create BETWEEN '$desde' AND '$hasta'");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 50, 50, 30,45,35,40);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(50,12,'NOMBRE',1);
$pdf->Cell(50,12,'APELLIDOS',1);
$pdf->Cell(30,12,'SECCION',1);

$pdf->Cell(45,12,'DOCENTE',1);
$pdf->Cell(35,12,'FECHA',1);
$pdf->Cell(40,12,'ASISTENCIA',1);
$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idasisa'],1);
$pdf->Cell($w[1],6,utf8_decode($row['noma']),1);
$pdf->Cell($w[2],6,utf8_decode($row['apea']),1);
$pdf->Cell($w[3],6,utf8_decode($row['nomsec']),1);

$pdf->Cell($w[4],6,utf8_decode($row['nombre']),1);
$pdf->Cell($w[5],6,$row['fecha_create'],1);
$pdf->Cell($w[6],6,utf8_decode($row['presen']),1);



$pdf->Ln();
}
$pdf->Output('asistencia.pdf', 'D');
?>

?>