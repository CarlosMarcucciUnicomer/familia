<?php
      if(isset($_POST['op'])){
          $servername = "localhost";
          $username = "u760722394_dbcolegio_user";
          $password = "UMGAntigua2022";
          $dbname = "u760722394_dbcolegio";
          $port = "3306";
          // Creamos la conexión
          $db_conexionLogin = mysqli_connect($servername, $username, $password, $dbname,$port);
          // $conn = new mysqli($servername, $username, $password, $dbname);
          if (!$db_conexionLogin) {
            die("No hay conexión: ".mysqli_connect_error());
          }
        
          $datoasistencia=$_POST['datoasistencia'];
          $idalum=$_POST['idalum'];
          $iddoce=$_POST['iddoce'];
          $idsec=$_POST['idsec'];
          $fecha_create=$_POST['fecha_create'];
          $date = date('Y-m-d');
          $query = "INSERT INTO asisten_alumn VALUES (NULL,$idalum,$iddoce,$idsec,'".$datoasistencia."','".$fecha_create."','".$date."');";

          if($db_conexionLogin->query($query)==true){
?>
                    <script type="text/javascript">
                      Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Agregado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      }).then(function() {
                                  window.location = "docente_asisten.php?id=<?php echo $idsec; ?>";
                              });
                    </script>
<?php
            $db_conexionLogin -> close();
      
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
      }
?>