<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css "href="../assets/css/estilo.css">
 <link rel="stylesheet" href="../assets/css/sweetalert.css">
 <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/sinfondo1.png">
<title>Reset Password</title>
</head>
<body>
 
<canvas id="svgBlob"></canvas>

<div class="position">

  <form class="container" autocomplete="off" method="post"  role="form">
    <div class="centering-wrapper">
      <div class="section1 text-center">
        <div class="primary-header">Enter your email address to recover your password. </div>
        
        <div class="input-position">

    <div class="form-group">
            <h5 class="input-placeholder">Email<span class="error-message"></span></h5>
      <input type="email" required="true"  class="form-style" name="email" autocomplete="off" style="margin-bottom: 20px;">
      <i class="input-icon uil uil-at"></i>
    </div> 

        </div>

    <div class="password-container"><a href="page-login.php" class="link">Back to Login</a></div>
          <div class="btn-position">
        
     

       <button class="btn btn-danger btn-block" type="submit">Reset Password</button>
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