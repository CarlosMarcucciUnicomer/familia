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
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="96x96" href="..\../assets/img/sinfondo1.png">

    <link href="..\../assets/plugins/DataTables/css/datatables.css" rel="stylesheet">
         <link href="..\..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">  
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
                    <a href="..\admin\pages-admin.php" class="navbar-brand">
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
                    <li><a href="mostrar.php">Prestamos</a></li>
                    <li class="active">Mostrar</li>
                    </ol>
                   
            <div id="page-content">
                <div class="panel">
                    
                             <!--Panel heading-->
                    <div class="panel-heading">
                        <div class="panel-control">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#demo-tabs-box-1" data-toggle="tab">Mostrar</a></li>
                                <li><a href="#demo-tabs-box-2" data-toggle="tab">Nuevo</a></li>
                            </ul>
                        </div>
                        <h3 class="panel-title" style="color:black">Prestamos</h3>
                    </div>

                    
                                <!--Panel body-->
                    <div class="panel-body" style="color:black">
                        <div class="tab-content" >
                            <div class="tab-pane fade in active" id="demo-tabs-box-1">
                                <p class="text-main text-semibold" style="color:black">Mostrar prestamos</p>
                                <a href="reporte.php" title="Reporte" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i> </a>
                        <div class="panel-body">
                            <?php
$servername = "localhost";
$contraseña = "UMGAntigua2022";
$usuario = "u760722394_dbcolegio_user";
$nombre_base_de_datos = "u760722394_dbcolegio";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("SELECT  prestamo.fecha, prestamo.idprest,prestamo.estado, GROUP_CONCAT( libro.nomlibro, '..', libro.sinop, '..', libro_prestamo.canti SEPARATOR '__') AS libro FROM prestamo INNER JOIN 

libro_prestamo ON libro_prestamo.idprest = prestamo.idprest INNER JOIN libro ON libro.idlibro = libro_prestamo.idlibro where prestamo.estado ='0' GROUP BY prestamo.idprest ORDER BY prestamo.idprest;");
$prestamos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
                            <table id="myTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="min-tablet">Fecha</th>
                                        <th class="min-tablet">Libros prestados</th>
                                        <th class="min-tablet">Estado</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($prestamos as $prestamo){ ?>
                                    <tr>
                                    <td><?php echo $prestamo->idprest ?></td>
                                    <td><?php echo $prestamo->fecha ?></td>
                                    <td>
                                       

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Nombre</th>

                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(explode("__", $prestamo->libro) as $librosConcatenados){ 
                                $libro = explode("..", $librosConcatenados)
                                ?>
                                <tr>
                                  
                                    <td><?php echo $libro[0] ?></td>
                                    <td><?php echo $libro[2] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table> 

                                    </td>
                                    <td>
                <?php    

                if($prestamo->estado==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $prestamo->idprest; ?>')">
                   
                    <span class="label label-success">Devuelto</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $prestamo->idprest; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Prestado</button>
                     </form>
                        <?php  } ?>                         
            </td>

                                    
                                    </tr>
                                     <?php } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        
                                    </tr>
                                </tfoot> 
                                
                            </table>
                        </div>             
                            </div>

                            <div class="tab-pane fade" id="demo-tabs-box-2">
                                <p class="text-main text-semibold" style="color:black">Nuevos prestamos</p>
<div class="panel-body">
                    
        
  <?php

$con  = new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
$products = $con->query("SELECT libro.idlibro, libro.nomlibro, subgrado.codsub, subgrado.noms, curso.idcur, curso.nomcur,autor.idautor, 
autor.datos, autor.biog, autor.foto, edito.idedito, edito.nomedi, libro.img, 
libro.sinop, libro.pag, libro.aniopub, libro.precio,libro.stock ,libro.estado, libro.idio, 
libro.fere FROM libro INNER JOIN subgrado ON libro.codsub=subgrado.codsub 
INNER JOIN autor ON libro.idautor=autor.idautor 
INNER JOIN edito ON libro.idedito= edito.idedito
INNER JOIN curso ON libro.idcur =curso.idcur  GROUP BY libro.idlibro");

?>
              <table class="table table-bordered" id="myTable3">
                <thead>
                <tr>

                    <th>Foto</th>             
                    <th>Nombre</th>  
                    <th>Materia</th>
                    <th>Accion</th>
                </tr>
                </thead>

            <tbody>
               <?php 

while($r=$products->fetch_object()):?>
                <tr>
     <td><?php  echo "<img src='../../assets/img/subidas/".$r->img."'width='50'"; ?></td>
     <td><?php echo $r->nomlibro; ?></td>
     <td><?php echo $r->nomcur; ?></td>
     <td style="width:260px;">
    <?php
    $found = false;

    if(isset($_SESSION["cart"]))
        { 
            foreach ($_SESSION["cart"] as $c) 
                { 
                    if($c["idlibro"]==$r->idlibro)
                        { 
                            $found=true; break; 
                        } 

                        
                        
                }
        }
    ?>
    <?php if($found):?>
        <a href="cart.php" class="btn btn-info">Agregado</a>
    <?php else:?>
    <form class="form-inline" method="post" action="addtocart.php">
    <input type="hidden" name="idlibro" value="<?php echo $r->idlibro; ?>">
    <input type="hidden" value="<?php echo $r->stock; ?>"  name="stock">
      <div class="form-group">
        <input type="number" name="canti" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
      </div>
      <button type="submit" class="btn btn-primary"> <i class="ti-receipt"></i></button>
    </form> 
    <?php endif; ?>
    </td>               
                        
                </tr>
<?php endwhile; ?>
            </tbody>
   
            </table>  
                             
        </div>                               
                            </div>

                        </div>
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
                    <h4 class="modal-title">Registro de libros</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <form method="POST"  autocomplete="off" enctype="multipart/form-data"> 
                        <div class="panel-body">
                            <div class="row" style="margin-top:-30px">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre del libro</label>
                                        <input type="text" name="nomlibro" required="" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary" name="agregar">Registrar</button>
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
                                            <img class="img-circle img-md" src="..\..\assets\img\user03.png" alt="Profile Picture">
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
                                        <a href="../admin/pages-admin.php">
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
                                            <li><a href="../../folder/alumno.php">Mostrar</a></li>
                                           
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

                                    <li class="active-sub">
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
                                            <li class="active-link"><a href="mostrar.php">Prestamos</a></li>
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

     <script src="..\../assets/plugins/DataTables/js/datatables.min.js"></script>
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
                    select.append( '<option style="color:black;" value="'+d+'">'+d+'</option>' )




                } );
            } );
        }
    } );
} );
</script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--------------------------------script nuevo----------------------------->


<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable3').DataTable();
    } );
</script>

<script>


// Editar estado inactivo
function inactivo(idprest)
{
    var id=idprest;
    $.ajax({
        type:"GET",
        url:"../../assets/ajax/editar_estado_inactivo_prestamo.php?id="+id,
    }).done(function(data){
        window.location.href ='mostrar.php';
    })
}
</script>
</body>
</html>

