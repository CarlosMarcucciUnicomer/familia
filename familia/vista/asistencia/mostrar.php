<?php
     session_start();
    
    if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    header('location: ../page-login.php');
  }
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
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/sinfondo1.png">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">  
        
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
                    <a href="..\vista\admin\pages-admin.php" class="navbar-brand">
                        <img src="..\assets\img\sinfondo1.png" alt="Juan Velazco Alvarado Logo" class="brand-icon" style="width:50px; height:50px;">
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
                                                        <p class="mar-no text-nowrap text-main text-semibold"> Clasificación de comentario</p>
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
                                        <a href="../vista/pages-logout.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión</a>
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
                    <li><a href="asisten_alumn.php">Asistencia del estudiante</a></li>
                    <li class="active">Mostrar</li>
                    </ol>
                   
            <div id="page-content">
                <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="color:black">Asistencia del estudiante</h3>
                        </div>
                        <a href="../vista/user-docente/reporte.php"  class="btn btn-default" title="PDF" type="button"><i class="demo-pli-file"></i>Export to PDF</a>                       
                        <div class="panel-body">
                            <table id="myTable" cellspacing="0" width="100%">
                                <?php
function connect(){
return new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
}
$id = $_GET['id'];
$con = connect();
$sql = "SELECT asisten_alumn.idasisa, alumno.idalum, alumno.dnia, alumno.noma, alumno.apea, alumno.foto, alumno.direcc, alumno.correo, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.imagen, seccion.idsec, seccion.nomsec,asisten_alumn.presen,asisten_alumn.fecha_create ,GROUP_CONCAT(subgrado.codsub, '..', subgrado.noms, '..' SEPARATOR '__') AS subgrado FROM asisten_alumn INNER JOIN alumno ON asisten_alumn.idalum = alumno.idalum INNER JOIN docente ON asisten_alumn.iddoce = docente.iddoce INNER JOIN seccion ON asisten_alumn.idsec = seccion.idsec INNER JOIN subgrado ON subgrado.codsub =seccion.codsub WHERE seccion.idsec  GROUP BY asisten_alumn.idasisa";
$query  =$con->query($sql);
$data =  array();
if($query){
    while($r = $query->fetch_object()){
        $data[] = $r;
    }
}
?>
<?php if(count($data)>0):?>
                                <thead>
                                    <tr style="color:black">
                                      
                                       
                                        <th class="min-tablet">Alumnos</th>
                                        <th class="min-tablet">Seccion</th>
                                        <th class="min-tablet">Subgrado</th>
                                        <th class="min-tablet">Asistencia</th>
                                        <th class="min-tablet">Fecha</th>
                                        
                                    </tr>
                                </thead>
                        <tbody class="BusquedaRapida" style="color:black">
                          <?php foreach($data as $d):?>
                          <tr>   
                               
                               <td> <?php echo $d->noma; ?> &nbsp; <?php echo $d->apea; ?></td>
                               <td> <?php echo $d->nomsec; ?></td>
                               <?php foreach(explode("__", $d->subgrado) as $subgradoConcatenados){ 
                                $subgrado = explode("..", $subgradoConcatenados)
                                ?>
                               <td><?php echo $subgrado[1] ?></td>

                                <?php } ?>
                                <td>

                                <?php 
                               if($d->presen == 'Asistio')
                                   echo " Asistio";
                               
                               else 
                                   if($d->presen == 'Tarde')
                               echo " Tarde";
                             else 
                                   if($d->presen == 'Falto')
                               echo " Falto";
                                   
                               ?>    

                                 </td>
                                  <td> <?php echo $d->fecha_create; ?> </td> 
                                   
                             </tr>
                             <?php endforeach; ?>
                            <?php else:?>
                            <p class="alert alert-warning"><strong>No hay datos</strong></p>
                            <?php endif; ?>        
                        </tbody>

                        <tfoot>
             <tr style="color:black">
                                      
                                       
                                        <th class="min-tablet">Alumnos</th>
                                        <th class="min-tablet">Seccion</th>
                                        <th class="min-tablet">Subgrado</th>
                                        <th class="min-tablet">Asistencia</th>
                                        <th class="min-tablet">Fecha</th>
                                        
                                    </tr>
        </tfoot>
                            </table>
                        </div>
                    </div>

            </div>
    </div>
        <!--Por aca es-->
              
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
                                            <img class="img-circle img-md" src="..\assets\img\user03.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo ucfirst($_SESSION['nombre']); ?></p>
                                            <span class="mnp-desc"><?php echo ucfirst($_SESSION['correo']); ?></span>
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
                                        <a href="../vista/pages-logout.php" class="list-group-item">
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
                                        <a href="../vista/admin/pages-admin.php">
                                            <i class="demo-pli-home"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                    </li>

                                    <li class="list-divider"></li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-id-badge"></i>
                                            <span class="menu-title">Estudiantes</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="alumno.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i>
                                            <span class="menu-title">Profesor</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="docente.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                   

                                    <li>
                                        <a href="#">
                                            <i class="ti-bookmark-alt"></i>
                                            <span class="menu-title">Cursos</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="curso.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-medall"></i>
                                            <span class="menu-title">Grados</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="grado.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-menu-alt"></i>
                                            <span class="menu-title">Subgrados</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="sub.php">Mostrar</a></li>
                                          
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-layers"></i>
                                            <span class="menu-title">Seccion</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="seccion.php">Mostrar</a></li>
                                          
                                        </ul>
                                    </li>

                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-timer"></i>
                                            <span class="menu-title">Asistencia</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="asisten_alumn.php">Mostrar</a></li>
                                           
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ti-calendar"></i>
                                            <span class="menu-title">Periodo académico</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="periodo.php">Mostrar</a></li>
                                         
                                        </ul>
                                    </li>

                                     <li>
                                        <a href="#">
                                            <i class="ti-ruler-pencil"></i>
                                            <span class="menu-title">Biblioteca</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="edito.php">Editorial</a></li>
                                            <li><a href="autor.php">Autor</a></li>
                                            <li><a href="libro.php">libros</a></li>
                                            <li><a href="../vista/prestamo/mostrar.php">Prestamos</a></li>
                                            <li><a href="../vista/devolu/mostrar.php">Devoluciones</a></li>
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
    <script src="..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\assets\js\nifty.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
   

    <!--Specify page [ SAMPLE ]-->
    <script src="..\assets\js\demo\dashboard.js"></script>


    <script src="../assets/js/reloj.js"></script> 

    <script src="../assets/js\demo\ui-panels.js"></script>

     <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
    $('#myTable').DataTable( {
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
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--------------------------------script nuevo----------------------------->
<?php
if(isset($_POST["agregar"])){
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
$idper=$_POST['idper'];
$nomgra=$_POST['nomgra'];

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
  text: 'Ya existe el registro a agregar!'
 
})


        </script>

    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "INSERT INTO grado(idper,nomgra)VALUES ('$idper','$nomgra')";

if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Agregado correctamente',
  showConfirmButton: false,
  timer: 1500
}).then(function() {
            window.location = "../folder/grado.php";
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
$id = $_GET['id'];

    $idper=$_POST['idper'];
    $nomgra=$_POST['nomgra'];


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
$sql2 = "update grado set idper='$idper', nomgra='$nomgra' where codgra='$id'";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  icon: 'success',
  title: 'Update',
  text: 'Actualizado correctamente',
  
}).then(function() {
            window.location = "../folder/grado.php";
           
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

<script src="../assets/js/funciones/periodo.js"></script>

</body>
</html>

