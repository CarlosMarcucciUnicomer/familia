
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
$this->Cell(95,10,'Lista de todos los cursos',1,0,'C');
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
$display_heading = array('idcur'=>'#', 'nompe'=> 'Periodo', 'nomcur'=> 'Curso','nomgra'=> 'Grado','noms'=> 'Subgrado','fere'=> 'Fecha');

$result = mysqli_query($connString, "SELECT curso.idcur, curso.nomcur, periodo.idper, periodo.nompe, grado.codgra, grado.nomgra, subgrado.codsub, subgrado.noms, curso.foto, curso.estado, curso.fere FROM curso INNER JOIN periodo ON curso.idper = periodo.idper INNER JOIN grado ON curso.codgra = grado.codgra INNER JOIN subgrado ON curso.codsub = subgrado.codsub") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM curso");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 50, 70, 40,50,50);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(50,12,'PERIODO',1);
$pdf->Cell(70,12,'CURSO',1);
$pdf->Cell(40,12,'GRADO',1);
$pdf->Cell(50,12,'SUBGRADO',1);
$pdf->Cell(50,12,'FECHA',1);


$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idcur'],1);

$pdf->Cell($w[1],6,utf8_decode($row['nompe']),1);
$pdf->Cell($w[2],6,utf8_decode($row['nomcur']),1);
$pdf->Cell($w[3],6,utf8_decode($row['nomgra']),1);
$pdf->Cell($w[4],6,utf8_decode($row['noms']),1);
$pdf->Cell($w[5],6,utf8_decode($row['fere']),1);

$pdf->Ln();
}
$pdf->Output('cursos.pdf', 'D');
?>