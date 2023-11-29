
<?php
//Incluimos el fichero de conexion
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
//Incluimos la libreria PDF
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
$this->Cell (95,10,utf8_decode('Lista de todas las secciones'),1,0,'C');


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
$display_heading = array('idsec'=>'#', 'nomsec'=> 'Seccion', 'noms'=> 'Subgrado','nombre'=> 'Docente','nomcur'=> 'Curso','capa'=> 'Capacidad','fecre'=> 'Fecha');

$result = mysqli_query($connString, "SELECT seccion.idsec, seccion.nomsec, subgrado.codsub, subgrado.noms, seccion.estado, seccion.capa, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.correo, docente.imagen, docente.telefono, curso.idcur, curso.nomcur, curso.foto, seccion.capa, seccion.fecre FROM seccion INNER JOIN subgrado ON seccion.codsub = subgrado.codsub INNER JOIN docente ON seccion.iddoce =  docente.iddoce INNER JOIN curso ON seccion.idcur = curso.idcur") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM seccion");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 30,50,55,55,30,50);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(30,12,'SECCION',1);
$pdf->Cell(50,12,'SUBGRADO',1);
$pdf->Cell(55,12,'DOCENTE',1);
$pdf->Cell(55,12,'CURSO',1);
$pdf->Cell(30,12,'CAPACIDAD',1);
$pdf->Cell(50,12,'FECHA',1);


$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idsec'],1);

$pdf->Cell($w[1],6,utf8_decode($row['nomsec']),1);

$pdf->Cell($w[2],6,utf8_decode($row['noms']),1);

$pdf->Cell($w[3],6,utf8_decode($row['nombre']),1);
$pdf->Cell($w[4],6,utf8_decode($row['nomcur']),1);
$pdf->Cell($w[5],6,utf8_decode($row['capa']),1);
$pdf->Cell($w[6],6,utf8_decode($row['fecre']),1);

$pdf->Ln();
}
$pdf->Output('seccion.pdf', 'D');
?>