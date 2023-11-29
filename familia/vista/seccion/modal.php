<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["idsec"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar seccion</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="../folder/seccion.php?id=<?php echo $va["idsec"]; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre de la seccion</label>
                               
                                <select class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="nomsec" required="" title="Elige una letra">

             <option value="<?php echo $va ['nomsec'];?>" selected=""><?php echo $va ['nomsec'];?></option>
             <option value="A">A</option>
             <option value="B">B</option>
             <option value="C">C</option>
             <option value="D">D</option>
             <option value="E">E</option>
                        
            </select>
                         </div>
                </div>

                <div class="col-sm-6">
                        
                         <div class="form-group">
                <label class="control-label">Nombre del docente</label>       
            <select id="demo-select2" class="demo_select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="iddoce" title="Elige un docente">
        <option value="<?php echo $va ['iddoce'];?>"  selected=""><?php echo $va ['nombre'];?></option>
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
 $stmt = $dbcon->prepare('SELECT * FROM docente');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $iddoce; ?>"><?php echo $nombre; ?></option>
            <?php
        }
        ?>
            ?>
            </select> 
                         </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Capacidad</label>
                            <input name="capa" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2" value="<?php echo $va ['capa'];?>" type="text" class="form-control">
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
    <div class="modal fade" id="delete_<?php echo $va['idsec']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="alert alert-warning">
                <strong>Warning!</strong> Borrar este registro permanentemente.
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['nomsec'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/seccion/eliminar.php?id=<?php echo $va['idsec']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->
