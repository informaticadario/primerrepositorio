<script type="text/javascript" src="../js/medico.js?rev=<?php echo time();?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE MEDICO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool"  data-widget = "collapse" data-widget = "remove"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                    </div>
                </div>
                <table id="tabla_medico" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nro Doc</th>
                            <th>Medico</th>
                            <th>Nro Colegiatura</th>
                            <th>Especialidad</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nro Doc</th>
                            <th>Medico</th>
                            <th>Nro Colegiatura</th>
                            <th>Especialidad</th>
                            <th>Sexo</th>
                            <th>Celular</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
</form>
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro De Medico</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombres" placeholder="Ingrese la especialidad" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_apepat" placeholder="Ingrese apellido paterno" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_apemat" placeholder="Ingrese apellido materno" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_direccion" placeholder="Ingresar direccion"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Movil</label>
                        <input type="text" class="form-control" id="txt_movil" placeholder="Ingresar movil" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="txt_fenac">
                    </div>
                    <div class="col-lg-12">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Nro documento</label>
                        <input type="text" class="form-control" id="txt_ndoc" placeholder="Ingresar numero documento" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Nro Colegiatura</label>
                        <input type="text" class="form-control" id="txt_ncol" placeholder="Ingresar numero colegiatura" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                        </select><br><br>
                    </div>
                    <div class="col-lg-12" style="text-align:center">
                        <b>DATOS DEL USUARIO</b><br><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu" placeholder="Ingresar usuario">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="txt_contra" placeholder="Ingresar contraseña" >
                    </div>
                    <div class="col-lg-4">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="txt_email" placeholder="Ingresar email">
                        <label for="" id="emailOK" style="color:red;"></label>
                        <input type="text" id="validar_email" hidden>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Medico()"><i class="fa fa-check"></i><b>&nbsp;Registrar</b></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar Medico</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" id="id_medico" hidden>
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombres_editar" placeholder="Ingrese la especialidad" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_apepat_editar" placeholder="Ingrese apellido paterno" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_apemat_editar" placeholder="Ingrese apellido materno" maxlength="50" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_direccion_editar" placeholder="Ingresar direccion"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Movil</label>
                        <input type="text" class="form-control" id="txt_movil_editar" placeholder="Ingresar movil" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="txt_fenac_editar">
                    </div>
                    <div class="col-lg-12">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Nro documento</label>
                        <input type="text"  id="txt_ndoc_editar_actual" hidden>
                        <input type="text" class="form-control" id="txt_ndoc_editar_nuevo" placeholder="Ingresar numero documento" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Nro Colegiatura</label>
                        <input type="text" id="txt_ncol_editar_actual" hidden>
                        <input type="text" class="form-control" id="txt_ncol_editar_nuevo" placeholder="Ingresar numero colegiatura" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad_editar" style="width:100%;">
                        </select><br><br>
                    </div>
                    <div class="col-lg-12" style="text-align:center">
                        <b>DATOS DEL USUARIO</b><br><br>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="id_usuario" hidden>
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu_editar" placeholder="Ingresar usuario" disabled>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;" disabled>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="txt_email_editar" placeholder="Ingresar email">
                        <label for="" id="emailOK_editar" style="color:red;"></label>
                        <input type="text" id="validar_email_editar" hidden>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Editar_Medico()"><i class="fa fa-check"></i><b>&nbsp;Editar</b></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>




<script>
$(document).ready(function() {
    listar_medico();
    listar_combo_rol();
    listar_combo_especialidad();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_nombres").focus();  
    })

} );
document.getElementById('txt_email').addEventListener('input',function(){
    campo=event.target;//asdsadsa
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;//asdasd21321@gmail.com
    if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $("#emailOK").html("");
        $("#validar_email").val("correcto");
    }else{
        $(this).css("border","1px solid red");
        $("#emailOK").html("Email Incorrecto");
        $("#validar_email").val("incorrecto");
    }

});
document.getElementById('txt_email_editar').addEventListener('input',function(){
    campo=event.target;//asdsadsa
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;//asdasd21321@gmail.com
    if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $("#emailOK_editar").html("");
        $("#validar_email_editar").val("correcto");
    }else{
        $(this).css("border","1px solid red");
        $("#emailOK_editar").html("Email Incorrecto");
        $("#validar_email_editar").val("incorrecto");
    }

});
$('.box').boxWidget({
    animationSpeed : 500,
    collapseTrigger: '[data-widget="collapse"]',
    removeTrigger  : '[data-widget="remove"]',
    collapseIcon   : 'fa-minus',
    expandIcon     : 'fa-plus',
    removeIcon     : 'fa-times'
})
</script>
