<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["iddoce"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar docente</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="../folder/docente.php?id=<?php echo $va["iddoce"]; ?>"  role="form" method="post">
                <div class="panel-body">
            <div class="row">     
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">DPI del docente</label>
                                <input name="dni" value="<?php echo $va ['dni'];?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" type="text" class="form-control">
                         </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del docente</label>
                                <input name="nombre" value="<?php echo $va ['nombre'];?>" type="text" class="form-control">
                         </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Apellido del docente</label>
                                <input name="apellido" value="<?php echo $va ['apellido'];?>" type="text" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Sexo</label>
                            <div class="radio">
                                            
                                <input id="demo-inline-form-radio" class="magic-radio"  type="radio" <?php if($va['genero']=="M"){ echo "checked";}?>  name="genero"  value="<?php echo $va['genero']; ?>">

                                    <label for="demo-disabled-inline-form-radio-2">M</label>
                                        <input id="demo-inline-form-radio" class="magic-radio"  type="radio" <?php if($va['genero']=="F"){ echo "checked";}?>  name="genero"  value="<?php echo $va['genero']; ?>">

                                    <label for="demo-disabled-inline-form-radio-3">F</label>
                    
                            </div>
                               
                         </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Correo del docente</label>
                                <input name="correo" value="<?php echo $va ['correo'];?>" type="email" class="form-control">
                         </div>
                </div>

                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Telefono del docente</label>
                                <input name="telefono" value="<?php echo $va ['telefono'];?>" type="text" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="9">
                         </div>
                </div>
            </div>  

            <div class="row"> 
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Usuario del docente</label>
                                <input name="usuario" value="<?php echo $va ['usuario'];?>" type="text" class="form-control">
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
    <div class="modal fade" id="delete_<?php echo $va['iddoce']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['nombre'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/docente/eliminar.php?id=<?php echo $va['iddoce']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->

   <div class="modal fade" id="password_<?php echo $va["iddoce"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Cambiar contraseña</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">           
            <form class="form-horizontal" autocomplete="off" action="../vista/docente/pass.php?id=<?php echo $va["iddoce"]; ?>"  role="form" method="post">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Contraseña</label>
                                <input type="password" name="clave" class="form-control">
                            </div>
                        </div>                                          
                    </div>                              
                </div>        
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
                    <button name="editar" class="btn btn-primary">Guardar cambios</button>
                </div>          
            </form>
                </div>
            </div>
        </div>
    </div>