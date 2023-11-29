
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
$this->Cell(95,10,'Lista de los alumnos',1,0,'C');
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


//-----------------------------------


}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('idalum'=>'#', 'dnia'=> 'DNI', 'noma'=> 'Nombres','apea'=> 'Apellidos','edad'=> 'Edad','direcc'=> 'Direccion', 'correo'=> 'Correo','gene'=> 'Genero', 'fenaci'=> 'Fech_naci');

$result = mysqli_query($connString, "SELECT * FROM alumno") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM alumno");

$pdf = new PDF('L','mm','A4');

//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 23, 35, 35,20,50,50,22,28);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(23,12,'CUI',1);
$pdf->Cell(35,12,'NOMBRES',1);
$pdf->Cell(35,12,'APELLIDOS',1);
$pdf->Cell(20,12,'EDAD',1);

$pdf->Cell(50,12,'DIRECCION',1);





$pdf->Cell(50,12,'CORREO',1);
$pdf->Cell(22,12,'GENERO',1);
$pdf->Cell(28,12,'NACIMIENTO',1);
$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idalum'],1);
$pdf->Cell($w[1],6,utf8_decode($row['dnia']),1);
$pdf->Cell($w[2],6,utf8_decode($row['noma']),1);
$pdf->Cell($w[3],6,utf8_decode($row['apea']),1);
$pdf->Cell($w[4],6,utf8_decode($row['edad']),1);
$pdf->Cell($w[5],6,utf8_decode($row['direcc']),1);
$pdf->Cell($w[6],6,utf8_decode($row['correo']),1);
$pdf->Cell($w[7],6,utf8_decode($row['gene']),1);
$pdf->Cell($w[8],6,$row['fenaci'],1);




$pdf->Ln();
}
$pdf->Output('alumnos.pdf', 'D');
?>