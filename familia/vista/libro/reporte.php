
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
$this->Cell(95,10,'Lista de los libros',1,0,'C');
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
$display_heading = array('idlibro'=>'#', 'nomlibro'=> 'Nombres','noms'=> 'Grado','nomcur'=> 'Curso','datos'=> 'Autor','nomedi'=> 'Editorial', 'pag'=> 'Paginas','aniopub'=> 'Año de publicacion','stock'=> 'Stock','idio'=> 'Idioma');

$result = mysqli_query($connString, "SELECT libro.idlibro, libro.nomlibro, subgrado.codsub, subgrado.noms, curso.idcur, curso.nomcur,autor.idautor, 
autor.datos, autor.biog, autor.foto, edito.idedito, edito.nomedi, libro.img, 
libro.sinop, libro.pag, libro.aniopub, libro.precio,libro.stock ,libro.estado, libro.idio, 
libro.fere FROM libro INNER JOIN subgrado ON libro.codsub=subgrado.codsub 
INNER JOIN autor ON libro.idautor=autor.idautor 
INNER JOIN edito ON libro.idedito= edito.idedito
INNER JOIN curso ON libro.idcur =curso.idcur") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM libro");

$pdf = new PDF('L','mm','A4');

//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(10, 50, 30,30,45,55,35,35);
//Declaramos el encabezado de la tabla
$pdf->Cell(10,12,'#',1);
$pdf->Cell(50,12,'NOMBRE',1);
$pdf->Cell(30,12,'GRADO',1);
$pdf->Cell(30,12,'CURSO',1);
$pdf->Cell(45,12,'AUTOR',1);
$pdf->Cell(55,12,'EDITORIAL',1);
$pdf->Cell(35,12,'PAGINAS',1);
$pdf->Cell(35,12,'PUBLICACION',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idlibro'],1);
$pdf->Cell($w[1],6,utf8_decode($row['nomlibro']),1);
$pdf->Cell($w[2],6,utf8_decode($row['noms']),1);
$pdf->Cell($w[3],6,utf8_decode($row['nomcur']),1);
$pdf->Cell($w[4],6,utf8_decode($row['datos']),1);
$pdf->Cell($w[5],6,utf8_decode($row['nomedi']),1);
$pdf->Cell($w[6],6,utf8_decode($row['pag']),1);
$pdf->Cell($w[7],6,utf8_decode($row['aniopub']),1);


$pdf->Ln();
}
$pdf->Output('libros.pdf', 'D');
?>