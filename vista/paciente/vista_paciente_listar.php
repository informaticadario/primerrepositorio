<script type="text/javascript" src="../js/paciente.js?rev=<?php echo time();?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE PACIENTE</h3>

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
                <table id="tabla_paciente" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nro Doc</th>
                            <th>Paciente</th>
                            <th>Credencial</th>
                            <th>Barrio</th>
                            <th>Sexo</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nro Doc</th>
                            <th>Paciente</th>
                            <th>Credencial</th>
                            <th>Barrio</th>
                            <th>Sexo</th>
                            <th>Estatus</th>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro De Paciente</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Nro documento</label>
                        <input type="text" class="form-control" id="txt_ndoc" placeholder="Ingresar numero documento" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-6">
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
                        <label for="">Credencial</label>
                        <input type="text" class="form-control" id="txt_credencial" placeholder="Ingresar Numero de credencial"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_direccion" placeholder="Ingresar direccion"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Paciente()"><i class="fa fa-check"></i><b>&nbsp;Registrar</b></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Modificar Paciente</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" id="txt_idpaciente" hidden>
                    <div class="col-lg-6">
                        <label for="">Nro documento</label>
                        <input type="text" id="txt_ndoc_actual_editar" placeholder="Ingresar numero documento" onkeypress="return soloNumeros(event)" hidden>
                        <input type="text" class="form-control" id="txt_ndoc_nuevo_editar" placeholder="Ingresar numero documento" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="col-lg-6">
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
                        <label for="">Credencial</label>
                        <input type="text" class="form-control" id="txt_credencial_editar" placeholder="Ingresar direccion_editar"><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="txt_direccion_editar" placeholder="Ingresar direccion_editar"><br>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Estatus</label>
                        <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Paciente()"><i class="fa fa-check"></i><b>&nbsp;Modificar</b></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>




<script>
$(document).ready(function() {
    listar_paciente();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_ndoc").focus();  
    })

} );

$('.box').boxWidget({
    animationSpeed : 500,
    collapseTrigger: '[data-widget="collapse"]',
    removeTrigger  : '[data-widget="remove"]',
    collapseIcon   : 'fa-minus',
    expandIcon     : 'fa-plus',
    removeIcon     : 'fa-times'
})
</script>
