<?php
  require '../assets/config/config.php';

  if(isset($_POST['register'])) {
    $errMsg = '';
    

    // Get data from FROM
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    
    $clave = MD5($_POST['clave']);
    $cargo = $_POST['cargo'];
   

    if($nombre == '')
      $errMsg = 'Digite su nombre';
    if($usuario == '')
      $errMsg = 'Digite su usuario';
   if($correo == '')
      $errMsg = 'Digite su correo';
    if($clave == '')
      $errMsg = 'Digite su contraseña';
    if($cargo == '')
      $errMsg = 'Digite su cargo';

    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO usuarios (nombre, usuario, correo,clave, cargo) VALUES (:nombre, :usuario, :correo,:clave, :cargo)');
        $stmt->execute(array(
          ':nombre' => $nombre,
          ':usuario' => $usuario,
          ':correo' => $correo,
          ':clave' => $clave,
          ':cargo' => $cargo
         
          ));
        header('Location: pages-register.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../assets/img/icono.svg" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css "href="../assets/css/estilo.css">
 <link rel="stylesheet" href="../assets/css/sweetalert.css">
<title>Acceso al sistema</title>
</head>
<body>
 
<canvas id="svgBlob"></canvas>

<div class="position">

  <form class="container" autocomplete="off" action="" method="post"  role="form">
    <div class="centering-wrapper">
      <div class="section1 text-center">
        <div class="primary-header">Colegio La Familia</div>
        <?php
    if(isset($errMsg)){
    echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
         }
?>
        <div class="input-position">

    <div class="form-group">
            <h5 class="input-placeholder">Nombre<span class="error-message"></span></h5>
      <input type="text" required="true"  class="form-style" name="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

     <div class="form-group">
            <h5 class="input-placeholder">Correo<span class="error-message"></span></h5>
      <input type="text" required="true"  class="form-style" name="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'] ?>" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

    <div class="form-group">
            <h5 class="input-placeholder">Usuario<span class="error-message"></span></h5>
      <input type="text" required="true"  class="form-style" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div>

    <div class="form-group">
            <h5 class="input-placeholder">Contraseña<span class="error-message"></span></h5>
      <input type="password" required="true"  class="form-style" name="clave" value="<?php if(isset($_POST['clave'])) echo $_POST['clave'] ?>" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

    <div class="form-group" style="display:none;">
            <h5 class="input-placeholder">Cargo<span class="error-message"></span></h5>
      <input type="text" required="true"  class="form-style" name="cargo" value="1" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

        </div>

          <div class="btn-position">
  
       <button class="btn btn-success btn-block" name='register' type="submit">Registrate</button>
        </div>
    
      </div>
      <div class="horizontalSeparator"></div>
      <div class="qr-login">
        <div class="qr-container">
        
      <img class="logo" src="../assets/img/icono.svg"/>
          <canvas id="qr-code"></canvas>
        </div>
   
      </div>
    </div>
  </form>
  
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    
</body>
</html>