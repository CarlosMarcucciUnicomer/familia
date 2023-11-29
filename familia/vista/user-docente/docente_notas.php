﻿<?php
     session_start();
    
    if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
    header('location: ../page-login.php');
  }
  $id=$_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>Dashboard |Colegio Familia</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../..\assets\css\bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="../..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/sinfondo1.png">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
</head>
<body onload="startTime()">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="pages-docente.php" class="navbar-brand">
                        <img src="..\..\assets\img\sinfondo1.png" alt="Juan Velazco Alvarado Logo" class="brand-icon" style="width:50px; height:50px;">
                        <div class="brand-title">
                            <span class="brand-text">Colegio Familia</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Search-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li>
                            <div class="custom-search-form">
                                <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                                    <i class="demo-pli-magnifi-glass"></i>
                                </label>
                                <form>
                                    <div class="search-container collapse" id="nav-searchbox">
                                        <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                                    </div>
                                </form>
                            </div>
                        </li>
                        
                    </ul>

                    <ul class="nav navbar-top-links">

                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>


                            <!--Notification dropdown menu-->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">
                                           
                                            <li>
                                                <a class="media" href="#">
                                                    <span class="label label-info pull-right">Nuevo</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Clasificación de comentarios</p>
                                                        <small>Última actualización hace 8 horas</small>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Mostrar todas las notificaciones
                                    </a>
                                </div>
                            </div>
                        </li>
                        
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    
                                    <i class="demo-pli-male"></i>
                                </span>
                               
                            </a>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Perfil</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Mensajes</a>
                                    </li>
                                    
                                    <li>
                                        <a href="../pages-logout.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </header>
       
        <div class="boxed">

            <div id="content-container">
<div id="page-head">
                    
        <div class="pad-all text-center">
            <h3>Bienvenido al dashboard <?php echo ucfirst($_SESSION['nombre']); ?></h3>
            <h5>
                <strong>Tu último acceso es:</strong>
                <div id="date" ></div>
                             
            </h5>
        </div>
        <?php 
    
    if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <strong>Success!</strong> <?php echo $_SESSION['message']; ?>.
        </div>
        <?php

        unset($_SESSION['message']);
    }else if(isset($_SESSION['message'])){ 
        ?>
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <strong>Error!</strong> <?php echo $_SESSION['message']; ?>.
        </div>
        <?php

        unset($_SESSION['message']);
}
    
?>

        <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="docente_curso.php">Asistencia</a></li>
                    <li class="active">Mostrar</li>
                    </ol>
           <div id="page-content">

          <div class="panel">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title" style="color:black">Control de Notas <strong>Alumnos</strong></h3>

                        </div>

                  
                        <?php include('docenteModal_asisten.php'); ?> 
                         

                         <div class="form-group">
           

            <input type="text"  style="width : 40%; display:none;" value="<?php echo $_SESSION['id']; ?>" class="form-control docen_te" name="docen_te">

          </div>  
        
<br>   
       
        <div class="panel-body">
            <table id="myTable3" cellspacing="0" width="100%">
<?php
function connect(){
return new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
}


$con = connect();
$sql = "SELECT CONCAT_WS(' ', alumno.noma, alumno.apea) as NombreCompleto, curso.nomcur as NombreCurso, notas.Bimestre as Bimestre, notas.Nota as Nota  from alum_secc INNER JOIN seccion on alum_secc.idsec=seccion.idsec INNER JOIN subgrado on seccion.codsub = subgrado.codsub INNER JOIN grado on subgrado.codgra = grado.codgra INNER JOIN curso on seccion.idcur = curso.idcur INNER JOIN alumno on alum_secc.idalum = alumno.idalum INNER JOIN docente on seccion.iddoce=docente.iddoce INNER JOIN notas on alumno.idalum= notas.idalum WHERE seccion.idsec=$id;";
$query  =$con->query($sql);
$data =  array();
if($query){
    while($r = $query->fetch_object()){
        $data[] = $r;
    }
}
?>
<?php if(count($data)>=0):?>

        <!-- Empieza Codigo -->
  
    <h1 style="color:Blue">Notas</h1>
    <br>
    <br>

                    <?php 
                    $db_conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
                    $db_conexion ->real_query("SELECT seccion.idsec as idSeccion, grado.codgra as codigoGrado, subgrado.codsub as codSubgrado, curso.idcur as idCurso, docente.iddoce as idDocente  from alum_secc INNER JOIN seccion on alum_secc.idsec=seccion.idsec INNER JOIN subgrado on seccion.codsub = subgrado.codsub INNER JOIN grado on subgrado.codgra = grado.codgra INNER JOIN curso on seccion.idcur = curso.idcur INNER JOIN alumno on alum_secc.idalum = alumno.idalum INNER JOIN docente on seccion.iddoce=docente.iddoce WHERE seccion.idsec=$id LIMIT 1;");
                   
                    $resultado = $db_conexion -> use_result();
                    while($fila = $resultado->fetch_assoc()){
                        $grado = $fila['codigoGrado'];
                        $subgrado1 = $fila['codSubgrado'];
                        $curso = $fila['idCurso'];
                        $seccion = $fila['idSeccion'];
                        $docente = $fila['idDocente'];


                    }
                    $db_conexion->close();
                    ?>
  

  <div class="container">
      <form class="d-flex" action="" method="post">
          <div class="col">




<!--Nombre Alumno-->

<div class="mb-3">
                <label for="lbl_grado" class="form-label" style="color:black">Alumno Nombre</label>
                <select  class="form-control" name="drop_alumno" id="drop_alumno">
                    <option style="color:red" value=0>-----Seleccione Alumno ----</option>
                    
                    <?php 
                    $db_conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
                    $db_conexion ->real_query("SELECT alumno.idalum as idAlumno, CONCAT_WS(' ', alumno.noma, alumno.apea) as NombreCompleto from alum_secc INNER JOIN seccion on alum_secc.idsec=seccion.idsec INNER JOIN subgrado on seccion.codsub = subgrado.codsub INNER JOIN grado on subgrado.codgra = grado.codgra INNER JOIN curso on seccion.idcur = curso.idcur INNER JOIN alumno on alum_secc.idalum = alumno.idalum WHERE seccion.idsec=$id;");
                    $resultado = $db_conexion -> use_result();
                    while($fila = $resultado->fetch_assoc()){
                        echo"<option value=".$fila['idAlumno'].">".$fila['NombreCompleto']."</option>";

                    }
                    $db_conexion->close();
                    ?>
                </select>
            </div>


<!--Bimestre-->
<div class="mb-3">
                <label for="lbl_bimestre" class="form-label" style="color:black">Bimestre</label>
                <select  class="form-control" name="drop_bimestre" id="drop_bimestre">
                    <option value="Primer Bimestre">Primer Bimestre</option>
                    <option value="Segundo Bimestre">Segundo Bimestre</option>
                    <option value="Tercer Bimestre">Tercer Bimestre</option>
                    <option value="Cuarto Bimestre">Cuarto Bimestre</option>
                </select>
            </div>

<!--Nota-->

            <div class="mb-3">
                <label for="lbl_nota" class="form-label" style="color:black">Nota</label>
                <input type="number" name="txt_nota" id="txt_nota" class="form-control" placeholder="nota: 61" require>
            </div>

            <div class="mb-3">
                <br>
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar">
            </div>



           </div>

        </form>


    </div>



    <?php

if (isset($_POST["btn_agregar"])){

    $db_conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
  

$drop_grado = $grado; 
$drop_subgrado= $subgrado1;
$drop_curso= $curso; 
$drop_seccion = $seccion; 
$id_Alumno = $_POST["drop_alumno"];
$drop_bimestre =$_POST["drop_bimestre"];
$txt_nota =$_POST["txt_nota"];
$id_Docente = $docente;


$sql = "INSERT INTO notas (codgra, codsub, idcur, idsec, idalum, Bimestre, Nota, iddoce) VALUES (".$drop_grado.",".$drop_subgrado.",".$drop_curso.",".$drop_seccion.",".$id_Alumno.",'".$drop_bimestre."',".$txt_nota.",".$id_Docente.");";


if ($db_conexion->query($sql) ===true){

$db_conexion->close();

header("Refresh:0");

}else{
$db_conexion ->close(); 

    }
}
?>

<br>
<br>
<br>


    <!--Tabla-->

    <div>



<div">
<h2 align="center" style="color:black">Historial Notas</h2>
    <table id="myTable" cellspacing="0" width="100%"> 
        <thead>
        <tr>
            <th style="color:black">Nombre Completo</th>
            <th style="color:black">Curso</th>
            <th style="color:black">Seccion</th>
            <th style="color:black">Bimestre</th>
            <th style="color:black">Nota</th>

        <thead>

        <tbody>
             <tr>

             <?php 
                    $db_conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
                    $db_conexion ->real_query("SELECT seccion.nomsec as Seccion, CONCAT_WS(' ', alumno.noma, alumno.apea) as NombreCompleto, curso.nomcur as NombreCurso, notas.Bimestre as Bimestre, notas.Nota as Nota  from alum_secc INNER JOIN seccion on alum_secc.idsec=seccion.idsec INNER JOIN subgrado on seccion.codsub = subgrado.codsub INNER JOIN grado on subgrado.codgra = grado.codgra INNER JOIN curso on seccion.idcur = curso.idcur INNER JOIN alumno on alum_secc.idalum = alumno.idalum INNER JOIN docente on seccion.iddoce=docente.iddoce INNER JOIN notas on alumno.idalum= notas.idalum WHERE seccion.idsec=$id;");
                    $resultado = $db_conexion -> use_result();
                    while($fila = $resultado->fetch_assoc()){
                        echo "<tr>";
                        echo "<td style=color:black>". $fila['NombreCompleto']. "</td>";
                        echo "<td style=color:black>". $fila['NombreCurso']. "</td>";
                        echo "<td style=color:black>". $fila['Seccion']. "</td>";
                        echo "<td style=color:black>". $fila['Bimestre']. "</td>";
                        echo "<td style=color:black>". $fila['Nota']. "</td>";
                        echo "</tr>";


                    }
                    $db_conexion->close();
                    ?>

            </tr>


        </tbody>
    
    </table>

</div>

</div>



    


    

    <!-- Termina Codigo -->






    


                            <?php else:?>
                               
                            <p class="alert alert-warning"><strong>No hay datos</strong></p>
                            <?php endif; ?>    


            
        <!--Por aca es-->
            </div>

            </div>




            <nav id="mainnav-container">
                <div id="mainnav">

                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="..\..\assets\img\user03.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo ucfirst($_SESSION['nombre']); ?></p>
                                            <span class="mnp-desc"><?php echo ucfirst($_SESSION['correo']); ?></span>
                                            <br>
                                            <span class="mnp-desc">Docente</span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Vista Perfil
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Configuraciones
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Ayuda
                                        </a>
                                        <a href="../pages-logout.php" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión
                                        </a>
                                    </div>
                                </div>

                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                <ul id="mainnav-menu" class="list-group">
                        
                                    <!--Category name-->
                                    <li class="list-header">Navegacion</li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="pages-docente.php">
                                            <i class="demo-pli-home"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                    </li>

                                    <li class="list-divider"></li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-bookmark-alt"></i>
                                            <span class="menu-title">Cursos</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="docente_curso.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                  

                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-notepad"></i>
                                            <span class="menu-title">Notas</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="#">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                          </ul>
                               
                            </div>
                        </div>
                    </div>
                  

                </div>
            </nav>
           
        </div>

        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        
    </div>
    
    <!--jQuery [ REQUIRED ]-->
    <script src="../..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../..\assets\js\nifty.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
   

    <!--Specify page [ SAMPLE ]-->
    <script src="../..\assets\js\demo\dashboard.js"></script>


    <script src="../../assets/js/reloj.js"></script> 

    
 <script type="text/javascript">
    $(document).ready(function() {
    $('#myTable3').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option style="color:black;" value="'+d+'">'+d+'</option>' )




                } );
            } );
        }
    } );
} );
</script>
     <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable2').DataTable();
} );
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).on('change', '#asistencia', function(){
            let datoasistencia = $(this).parents('tr').find('#asistencia').val();
            let idalum = $(this).parents('tr').find('td').eq(1).text();
            let iddoce = $('.docen_te').val();
            let idsec = $(this).parents('tr').find('td').eq(0).text();
            let fecha_create = $('.fecha_inicio').val();
            console.log("datos asistencia es:"+datoasistencia);
            console.log(" id alumno "+idalum);
            console.log(" id seccion"+ idsec);
            console.log(" id docente"+ iddoce);
            console.log(" fecha_create"+ fecha_create);
            var datos = new FormData();
            datos.append("op","tomarasistencia");
            datos.append("datoasistencia",datoasistencia);
            datos.append("idalum",idalum);
            datos.append("idsec",idsec);
            datos.append("iddoce",iddoce);
            datos.append("fecha_create",fecha_create);
            // datos.fecha_create= fecha_create;
            if (datoasistencia != "0") {
                console.log("entro");

                // fetch('enviardatos.php',{
                //     method: "POST",
                //     body: datos
                // }).then( res => res.json())
                //   .then ( data => {
                //     console.log(data);
                //  })


                 $.ajax({

                    type: "POST",
                    url: 'enviardatos.php',
                    data: {
                                 op: 'tomarasistencia',
                                 datoasistencia: datoasistencia,
                                 idalum: idalum,
                            idsec: idsec,
                                 iddoce: iddoce,
                              fecha_create: fecha_create
                    }
                 }).done((res) => {
                     Swal.fire({
                       position: 'top-end',
                       icon: 'success',
                       title: 'Asistencia tomada prueba',
                       showConfirmButton: false,
                       timer: 1500
                     });

                 });
                
            }
        });   

</script>

<script src="../../assets/js\demo\ui-panels.js"></script>
<!--------------------------------script editar----------------------------->
<?php
if(isset($_POST["update"])){
$servername = "localhost";
$username = "u760722394_dbcolegio_user";
$password = "UMGAntigua2022";
$dbname = "u760722394_dbcolegio";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
    $idsec = $_GET['id'];

    $presen=$_POST['presen'];
    


// Realizamos la consulta para saber si coincide con uno de esos criterios

$result = mysqli_query($conn);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe el registro a editar!'
 
})


        </script>

    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "update asisten_alumn set presen='$presen' where idsec='$id'";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  icon: 'success',
  title: 'Update',
  text: 'Actualizado correctamente',
  
}).then(function() {
           
            window.location = "docente_notas.php?id=<?php echo $idsec; ?>";
           
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
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>
</body>
</html>

