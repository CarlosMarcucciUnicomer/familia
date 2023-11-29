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

    <link href="../assets/plugins/DataTables/css/datatables.css" rel="stylesheet">
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
                    <li><a href="seccion.php">Seccion</a></li>
                    <li class="active">Mostrar</li>
                    </ol>
                   
            <div id="page-content">
                <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="color:black">Seccion</h3>
                        </div>
                         <button class="btn btn-purple" data-target="#demo-default-modal" data-toggle="modal"><i class="demo-pli-add icon-fw"></i>Nuevo</button>
                         <a href="../vista/seccion/reporte.php" title="Reporte" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i> </a>
                        <div class="panel-body">
                            <table id="myTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr style="color:black">
                                        <th>#</th>
                                        <th class="min-tablet">Docente</th>
                                        <th class="min-tablet">Letra</th>
                                       
                                        <th class="min-tablet">Subgrado</th>
                                        <th class="min-tablet">Curso</th>
                                        <th class="min-tablet">Capacidad</th>
                                      
                                        
                                        <th class="min-tablet">Estado</th>
                                        
                                        <th class="min-desktop">Acciones</th>
                                    </tr>
                                </thead>
                               <tbody class="BusquedaRapida" style="color:black">
                          <?php
                          foreach ($dato as $key => $value){
                              foreach ($value as $va) { ?>
                           <tr style="color:black">
            <td><?php echo $va['idsec'];?></td>
           
             <td><span class="label label-info"><?php echo $va ['nombre'];?>&nbsp;<?php echo $va ['apellido'];?></span></td>
                 
            <td><span class="label label-purple"><?php echo $va ['nomsec'];?></span></td>
           

            <td><span class="label label-mint"><?php echo $va ['noms'];?></span></td>
            <td><span class="label label-pink"><?php echo $va ['nomcur'];?></span></td>

            <td><?php echo $va ['capa'];?></td>

          
            <td>
                <?php if($va ['estado']==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $va['idsec'];?>')">
                    <strong>
                        <button type="submit" class="btn btn-success btn-xs">
                            Activo
                        </button>
                    </strong>   

                </form>

                 <?php  }   else {?> 

             <form  method="get" action="javascript:inactivo('<?php echo $va['idsec'];?>')"> 
                <strong><button type="submit" class="btn btn-danger btn-xs">Inactivo</strong></button>
            </form>
        <?php  } ?>  
                    
            </td>
                             
            <td>
                <a href="../vista/sec_alum/mostrar.php?id=<?php echo $va["idsec"]; ?>" title="Entras"  class="btn btn-mint btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>

                <a href="#edit_<?php echo $va["idsec"]; ?>" title="Editar datos"  class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <a href="#delete_<?php echo $va["idsec"]; ?>" title="Eliminar"  class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
                
                <?php include('../vista/seccion/modal.php'); ?>
                        
                            </td>
                            
                              </tr>
                              <?php
                              }
                              }
                              ?>
                        </tbody>
                            </table>
                        </div>
                    </div>

            </div>
    </div>
        <!--Por aca es-->
              
            </div>
            <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Registro de secciones</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <form method="POST" action="../vista/seccion/newadd.php"  autocomplete="off">
                        <div class="panel-body">
                                       
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Año academico</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"  id="periodo" required="" title="Elige un año">

             <option value="" disabled="" selected="">Selecciona el año academico</option>
                        
            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Nivel</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"  id="grado" required="" title="Elige un nivel">

             <option value="" disabled="" selected="">Selecciona el nivel</option>
                        
            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Grado</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="codsub" id="sub" required="" title="Elige un grado">

             <option value="" disabled="" selected="">Selecciona el grado</option>
                        
            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Seccion</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="nomsec" required="" title="Elige una letra">

             <option value="" disabled="" selected="">Selecciona una letra</option>
             <option value="A">A</option>
             <option value="B">B</option>
             <option value="C">C</option>
             <option value="D">D</option>
             <option value="E">E</option>
                        
            </select>
                                    </div>
                                </div>

                                   
                            </div>

<!-- ---------------------------------------------start: checkbox -------------------------------->

<div class="form-group pad-ver">
    <div class="form-group">
                <label>Cursos:</label>
    </div>
    <div class="card bg-light" style="width: 100%;">
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6" id="curso">
                    <div  class="custom-control custom-checkbox mr-sm-2">
                        <label><input type="checkbox" name="idcur[]"></label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- -----------------------------------------End: checkbox -------------------------------------->
             <div class="row">
                
                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Docente</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="iddoce" id="docente" required="" title="Elige un docente">

             <option value="" disabled="" selected="">Selecciona el docente</option>
                        
            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
    <div class="form-group">
        <label class="control-label">Capacidad</label>
        <input type="text" name="capa" required=""  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" maxlength="2">
    </div>
</div>
                
                    
                        </div>

                        <div class="row">
 
                        </div>


            <div class="row" style="display:none;">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
            <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="estado">

             <option value="1"  selected="">1</option>
            </select>
                                    </div>
                                </div>    
                                </div>
                        </div>
                <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="agregar">Registrar</button>
                </div>
        </form>
                </div>

                <!--Modal footer-->
                
            </div>
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


                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-layers"></i>
                                            <span class="menu-title">Seccion</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="seccion.php">Mostrar</a></li>
                                          
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-timer"></i>
                                            <span class="menu-title">Asistencia</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="asisten_alumn.php">Mostrar</a></li>
                                           
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

     <script src="../assets/plugins/DataTables/js/datatables.min.js"></script>
     <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
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
$nomsec=$_POST['nomsec'];
$codsub=$_POST['codsub'];
$iddoce=$_POST['iddoce'];
$idcur=$_POST['idcur'];
$capa=$_POST['capa'];
$estado=$_POST['estado'];
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
$sql2 = "INSERT INTO seccion(nomsec,codsub,iddoce,idcur,capa,estado)VALUES ('$nomsec', '$codsub', '$iddoce', '$idcur','$capa','$estado')";
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
            window.location = "../folder/seccion.php";
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

    $nomsec=$_POST['nomsec'];
    $iddoce=$_POST['iddoce'];
    $capa=$_POST['capa'];


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
$sql2 = "update seccion set nomsec='$nomsec', iddoce='$iddoce', capa='$capa' where idsec='$id'";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  icon: 'success',
  title: 'Update',
  text: 'Actualizado correctamente',
  
}).then(function() {
            window.location = "../folder/seccion.php";
           
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

<!--------------------------------termina script editar----------------------------->


<script src="../assets/js/funciones/periodo.js"></script>
<script src="../assets/js/funciones/docente.js"></script>

<script>
    function activo(codsub)
{
    var id=codsub;
    $.ajax({
        type:"GET",
        url:"../assets/ajax/editar_estado_activo_seccion.php?id="+id,
    }).done(function(data){
        window.location.href ='../folder/seccion.php';
    })

}

// Editar estado inactivo
function inactivo(codsub)
{
    var id=codsub;
    $.ajax({
        type:"GET",
        url:"../assets/ajax/editar_estado_inactivo_seccion.php?id="+id,
    }).done(function(data){
        window.location.href ='../folder/seccion.php';
    })
}
</script>
</body>
</html>

