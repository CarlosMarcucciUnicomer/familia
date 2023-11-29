<?php
  require '../assets/config/config.php';

  if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];
    
    $clave = MD5($_POST['clave']);

    if($usuario == '')
      $errMsg = 'Digite su usuario';
    if($clave == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, nombre, usuario, correo,clave, cargo FROM usuarios WHERE usuario = :usuario UNION SELECT iddoce,nombre,usuario,correo,clave, cargo FROM docente WHERE usuario = :usuario');


        $stmt->execute(array(
          ':usuario' => $usuario
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "User $usuario no encontrado.";
        }
        else {
          if($clave == $data['clave']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['correo'] = $data['correo'];
            $_SESSION['clave'] = $data['clave'];
            $_SESSION['cargo'] = $data['cargo'];
            
            
    if($_SESSION['cargo'] == 1){
          header('Location: admin/pages-admin.php');
        }else if($_SESSION['cargo'] == 2){
          header('Location: user-docente/pages-docente.php');
        }
            exit;
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css "href="../assets/css/estilo.css">
 <link rel="stylesheet" href="../assets/css/sweetalert.css">
 <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/sinfondo1.png">
<title>Acceso al sistema</title>
</head>
<body>
 
<canvas id="svgBlob"></canvas>

<div class="position">

  <form class="container" autocomplete="off" method="post"  role="form">
    <div class="centering-wrapper">
      <div class="section1 text-center">
        <div class="primary-header">Colegio La Familia</div>
        <?php
    if(isset($errMsg)){
    echo '<div style="color:#1FD8EC;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
         }
?>
        <div class="input-position">

    <div class="form-group">
            <h5 class="input-placeholder">Usuario<span class="error-message"></span></h5>
      <input type="text" required="true"  class="form-style" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

    <div class="form-group">
        <h5 class="input-placeholder">Contraseña<span class="error-message"></span></h5>
        <input type="password" required="true" name="clave" value="<?php if(isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" class="form-style">
        <i class="input-icon uil uil-lock-alt"></i>
    </div>
    
        </div>

    <div class="password-container"><a href="reset-password.php" class="link">¿Ólvidaste tu contraseña?</a></div>
          <div class="btn-position">
        
     

       <button class="btn btn-success btn-block" name='login' type="submit">Acceder</button>
        </div>
    
      </div>

      <div class="horizontalSeparator"></div>

      <div class="qr-login">
        <div class="qr-container">
        
      <img class="logo" src="../assets/img/sinfondo1.png" style="width:150px; height:150px;"/>
         
        </div>
      </div>
      

    </div>
  </form>
  
</div>

    
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    
</body>
</html>