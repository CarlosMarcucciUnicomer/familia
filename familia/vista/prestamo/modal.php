<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["idlibro"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar libro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="../folder/libro.php?id=<?php echo $va["idlibro"]; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del libro</label>
                                <input name="nomlibro" value="<?php echo $va ['nomlibro'];?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Autor</label>
                             <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="idautor" title="Elige un autor">
        <option value="<?php echo $va ['idautor'];?>"  selected=""><?php echo $va ['datos'];?></option>
        <?php 
 $dbhost = 'localhost';
 $dbname = 'u760722394_dbcolegio';  
 $dbuser = 'u760722394_dbcolegio_user';                  
 $dbpass = 'UMGAntigua2022';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $stmt = $dbcon->prepare('SELECT * FROM autor');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idautor; ?>"><?php echo $datos; ?></option>
            <?php
        }
        ?>
            ?>
            </select>
                         </div>
                </div>


                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Editorial</label>
                             <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="idedito" title="Elige una editorial">
        <option value="<?php echo $va ['idedito'];?>"  selected=""><?php echo $va ['nomedi'];?></option>
        <?php 
 $dbhost = 'localhost';
 $dbname = 'u760722394_dbcolegio';  
 $dbuser = 'u760722394_dbcolegio_user';                  
 $dbpass = 'UMGAntigua2022';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $stmt = $dbcon->prepare('SELECT * FROM edito');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idedito; ?>"><?php echo $nomedi; ?></option>
            <?php
        }
        ?>
            ?>
            </select>
                         </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Numero de paginas</label>
                        <input type="text" name="pag" value="<?php echo $va ['pag'];?>" required="" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Año de publicacion</label>
                        <input type="date" name="aniopub" required="" value="<?php echo $va ['aniopub'];?>" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Idioma</label>
                        <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="idio"  required="" title="Elige un idioma">

             <option value="<?php echo $va ['idio'];?>" selected=""><?php echo $va ['idio'];?></option>
             <option value="Spanish">Español</option>
             <option value="English">Ingles</option>
                        
            </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Precio</label>
                        <input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="precio" value="<?php echo $va ['precio'];?>" required="" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Stock</label>
                        <input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="stock" maxlength="3" value="<?php echo $va ['stock'];?>" required="" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Sinopsis</label>
                         <textarea name="sinop" value="<?php echo $va ['sinop'];?>" placeholder="Sinopsis" rows="5" class="form-control"><?php echo $va ['sinop'];?></textarea>
                    </div>
                </div>



            </div>
  
 
            </div>        
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
                    <button name="update" class="btn btn-primary">Guardar cambios</button>
                </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  -->

    <!-- ELIMINAR -->
    <div class="modal fade" id="delete_<?php echo $va['idlibro']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['nomlibro'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/libro/eliminar.php?id=<?php echo $va['idlibro']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->
