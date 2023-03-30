<script type="text/javascript" src="../js/historial.js?rev=<?php echo time();?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE HISTORIAL CLINICO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool"  data-widget = "collapse" data-widget = "remove"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-4">
                      <label><b>Fecha Inicio:</b></label>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control fecha" id="txt_fechainicio">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label><b>Fecha Fin:</b></label>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control fecha" id="txt_fechafin">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-success" style="width:100%" onclick="listar_historial()"><i class="glyphicon glyphicon-search"></i>Buscar</button><br><br>
                    </div>
                    <div class="col-lg-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-danger" style="width:100%" onclick="cargar_contenido('contenido_principal','historial/vista_historial_registro.php')"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button><br><br>
                    </div>
                </div>
                <div class="col-lg-12 table-responsive">
                    <table id="tabla_historial" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Nro Documento</th>
                                <th>Paciente</th>
                                <th>Diagnostico</th>
                                <th>Ver Detalles Fua</th>
                                <th>Generar PDF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                 <th>#</th>
                                <th>Fecha</th>
                                <th>Nro Documento</th>
                                <th>Paciente</th>
                                <th>Diagnostico</th>
                                <th>Ver Detalles Fua</th>
                                <th>Generar PDF</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
</form>

<div class="modal lg" id="modal_detalle" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Detalle de FUA</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"><br>
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Procedimiento</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Insumo</a></li>
                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Medicamentos</a></li>
                            </ul>
                            <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                        <table id="tabla_procedimiento" class="display responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>   
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                        <table id="tabla_insumo" class="display responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Insumo</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Insumo</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                        <table id="tabla_medicamento" class="display responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Medicamento</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Medicamento</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                    
                </div>    

            </div>
            <div class="modal-footer">
  
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>

<div class="modal lg" id="modal_diagnostico" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Diagnostico de La Cita</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <textarea class="form-control" id="txt_diagnostico_fua"  rows="3" disabled></textarea>
                    </div>
                </div>    

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    var n = new Date();
    var y = n.getFullYear();
    var m = n.getMonth()+1;
    var d = n.getDate();
    if(d<10){
        d='0'+d;
    }
    
    if(m<10){
        m='0'+m;
    }
    $(".fecha").datepicker({ 
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy/mm/dd',
    }).on('keypress paste', function (e) {
        e.preventDefault();
        return false;
    });
    var hoy= y + "/" + m + "/" + d;
    $("#txt_fechainicio").datepicker("setDate", hoy);
    $("#txt_fechafin").datepicker("setDate", hoy);
    //document.getElementById("txt_fechainicio").value = y + "-" + m + "-" + d;
    //document.getElementById("txt_fechafin").value= y + "-" + m + "-" + d;
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_especialidad").focus();  
    });
    listar_historial();
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
<script type="text/javascript">
   
</script>
