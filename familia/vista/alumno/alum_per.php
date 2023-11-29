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
    <link href="../..\assets\css\bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/sinfondo1.png">

    <link href="../../assets/plugins/DataTables/css/datatables.css" rel="stylesheet">
       <link href="../..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">   
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
                        <img src="../..\assets\img\sinfondo1.png" alt="Juan Velazco Alvarado Logo" class="brand-icon" style="width:50px; height:50px;">
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
                                        <i class="pci-chevron chevron-right pull-right"></i> Mostrar todas las notificaciones
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
                    <li><a href="../../folder/alumno.php">Alumnos</a></li>
                    <li class="active">Perfil</li>
                    </ol>
                   
            
        <!--Por aca es-->
              <div id="page-content">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="fixed-fluid">
                                    <div class="fixed-md-200 pull-sm-left fixed-right-border">
                    <?php         
function connect(){
return new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
}
$con = connect();
$id = $_GET['id'];
$sql = "SELECT * FROM alumno  WHERE idalum= '$id'";
$query  =$con->query($sql);
$data =  array();
if($query){
  while($r = $query->fetch_object()){
    $data[] = $r;
  }
}

?> 
<?php if(count($data)>0):?>
    <?php foreach($data as $d):?>
                                        <!-- Simple profile -->
                                        <div class="text-center">
                                            <div class="pad-ver">
                                                <img src="../../assets/img/subidas/<?php echo $d->foto; ?>" class="img-lg img-circle" alt="Profile Picture">
                                            </div>
                                            <h4 style="color:black" class="text-lg text-overflow mar-no"><?php echo $d->noma; ?><br><?php echo $d->apea; ?></h4>
                                            <p class="text-sm text-muted">Alumno</p>
                                            <p class="text-sm text-muted"><?php echo $d->edad; ?></p>
                    
                                            <button class="btn btn-block btn-success btn-lg">Seguir</button>
                                        </div>
                                        <hr>
                    
                                        <!-- Profile Details -->
                                        <p style="color:black" class="pad-ver text-main text-sm text-uppercase text-bold">Sobre mi</p>

                                        <p style="color:black"><i class="demo-pli-address-book icon-lg icon-fw"></i> <?php echo $d->dnia; ?></p>

                                        <p style="color:black"><i class="demo-pli-address-book icon-lg icon-fw"></i> <?php echo $d->noma; ?></p>

                                        <p style="color:black"><i class="demo-pli-address-book icon-lg icon-fw"></i> <?php echo $d->apea; ?></p>

                                        
                                        <p style="color:black"><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> <?php echo $d->direcc; ?></p>
                                      
                                        <p style="color:black"><i class="demo-pli-mail icon-lg icon-fw"></i><?php echo $d->correo; ?></p>

                                        <p style="color:black"><i class="demo-pli-address-book icon-lg icon-fw"></i><?php echo $d->gene; ?></p>

                                        <p style="color:black"><i class="demo-pli-address-book icon-lg icon-fw"></i><?php echo $d->fenaci; ?></p>

                                        <hr>
                                        
                                    </div>
                                    <?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>
                                    <div class="fluid">
                                        
                                        <hr class="new-section-md bord-no">
                    
                                        <div class="pad-btm">
                                            <textarea class="form-control" rows="4" placeholder="What are you thinking?"></textarea>
                                            <div class="mar-top clearfix">
                                                <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="demo-psi-right-4 icon-fw"></i> Send Message</button>

                                            </div>
                                        </div>
                    
                                        <hr>
                    
                    
                                    </div>
                                </div>
                            </div>
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
                                            <img class="img-circle img-md" src="../..\assets\img\user03.png" alt="Profile Picture">
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
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Vista Pefil
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
                                        <a href="../admin/pages-admin.php">
                                            <i class="demo-pli-home"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                    </li>

                                    <li class="list-divider"></li>

                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-id-badge"></i>
                                            <span class="menu-title">Estudiantes</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="../../folder/alumno.php">Mostrar</a></li>
                                           
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
                                            <li><a href="../../folder/docente.php">Mostrar</a></li>
                                           
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
                                            <li><a href="../../folder/curso.php">Mostrar</a></li>
                                           
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
                                            <li><a href="../../folder/grado.php">Mostrar</a></li>
                                           
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
                                            <li><a href="../../folder/sub.php">Mostrar</a></li>
                                          
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
                                            <li><a href="../../folder/seccion.php">Mostrar</a></li>
                                          
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
                                            <li><a href="../../folder/asisten_alumn.php">Mostrar</a></li>
                                           
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
                                            <li><a href="../../folder/periodo.php">Mostrar</a></li>
                                         
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
                                            <li><a href="../../folder/edito.php">Editorial</a></li>
                                            <li><a href="../../folder/autor.php">Autor</a></li>
                                            <li><a href="../../folder/libro.php">libros</a></li>
                                            <li><a href="../prestamo/mostrar.php">Prestamos</a></li>
                                            <li><a href="../devolu/mostrar.php">Devoluciones</a></li>
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
    <script src="..\..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
   

    <!--Specify page [ SAMPLE ]-->
    <script src="..\..\assets\js\demo\dashboard.js"></script>


    <script src="..\../assets/js/reloj.js"></script> 

    <script src="..\../assets/js\demo\ui-panels.js"></script>



  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--------------------------------script nuevo----------------------------->

</body>
</html>

