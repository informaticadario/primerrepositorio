var tablemedico;
function listar_medico(){
    tablemedico = $("#tabla_medico").DataTable({
       "ordering":false,   
       "bLengthChange":false,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/medico/controlador_medico_listar.php",
           type:'POST'
       },
       "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"medico_nrodocumento"},
           {"data":"medico"},
           {"data":"medico_colegiatura"},
           {"data":"especialidad_nombre"},
           {"data":"medico_sexo",
           render: function (data, type, row ) {
                if(data=='M'){
                    return "MASCULINO";                   
                }else{
                    return "FEMENINO";                   
                }
            }
           },       
           {"data":"medico_movil"},
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='ed&iacute;tar'><i class='fa fa-edit'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_medico_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    tablemedico.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_medico').DataTable().page.info();
        tablemedico.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}

$('#tabla_medico').on('click','.editar',function(){
    var data = tablemedico.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(tablemedico.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = tablemedico.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#id_medico").val(data.medico_id);
    $("#txt_nombres_editar").val(data.medico_nombre);
    $("#txt_apepat_editar").val(data.medico_apepat);
    $("#txt_apemat_editar").val(data.medico_apemat);
    $("#txt_direccion_editar").val(data.medico_direccion);
    $("#txt_movil_editar").val(data.medico_movil);
    $("#cbm_sexo_editar").val(data.medico_sexo).trigger("change");
    $("#txt_fenac_editar").val(data.medico_fenac);
    $("#txt_ndoc_editar_actual").val(data.medico_nrodocumento);
    $("#txt_ndoc_editar_nuevo").val(data.medico_nrodocumento);
    $("#txt_ncol_editar_actual").val(data.medico_colegiatura);
    $("#txt_ncol_editar_nuevo").val(data.medico_colegiatura);
    $("#cbm_especialidad_editar").val(data.especialidad_id).trigger("change");
    $("#txt_nombres_editar").val(data.medico_nombre);
    //Datos usuario
    $("#id_usuario").val(data.usu_id);
    $("#txt_usu_editar").val(data.usu_nombre);
    $("#cbm_rol_editar").val(data.rol_id).trigger("change");
    $("#txt_email_editar").val(data.usu_email);
})

function filterGlobal() {
    $('#tabla_medico').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    $("#txt_nombres").val("");
    $("#txt_apepat").val("");
    $("#txt_apemat").val("");
    $("#txt_direccion").val("");
    $("#txt_movil").val("");
    $("#cbm_sexo").val("M").trigger("change");
    $("#txt_fenac").val("");
    $("#txt_ndoc").val("");
    $("#txt_ncol").val("");
    $("#txt_usu").val("");
    $("#txt_contra").val("");
    $("#cbm_rol").val("");
    $("#txt_email").val("");
}

function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/usuario/controlador_combo_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                if(data[i][0]=='3'){
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                }
            
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

function listar_combo_especialidad(){
    $.ajax({
        "url":"../controlador/medico/controlador_combo_especialidad_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_especialidad").html(cadena);
            $("#cbm_especialidad_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_especialidad").html(cadena);
            $("#cbm_especialidad_editar").html(cadena);
        }
    })
}


function Registrar_Medico(){
    var nombre = $("#txt_nombres").val();
    var apepat = $("#txt_apepat").val();
    var apemat = $("#txt_apemat").val();
    var direccion = $("#txt_direccion").val();
    var movil = $("#txt_movil").val();
    var sexo = $("#cbm_sexo").val();
    var fenac = $("#txt_fenac").val();
    var nrodocumento = $("#txt_ndoc").val();
    var colegiatura = $("#txt_ncol").val();
    var especialidad = $("#cbm_especialidad").val();
    var usu = $("#txt_usu").val();
    var contra = $("#txt_contra").val();
    var rol = $("#cbm_rol").val();
    var email = $("#txt_email").val();
    var validaremail=$("#validar_email").val();
    if(validaremail=="incorrecto"){
        return Swal.fire('Mensaje De Advertencia','El email ingresado no tiene el formato correcto','warning');
    }
    if(nombre.length==0 || apepat.length==0 || apemat.length==0 || direccion.length==0 || movil.length==0 || sexo.length==0 || fenac.length==0 || nrodocumento.length==0 || colegiatura.length==0 || especialidad.length==0 || usu.length==0 || contra.length==0 || rol.length==0 || email.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene todos los campos","warning");

    }
    $.ajax({
        "url":"../controlador/medico/controlador_medico_registro.php",
        type:'POST',
        data:{
            nombre:nombre,
            apepat:apepat,
            apemat:apemat,
            direccion:direccion,
            movil:movil,
            sexo:sexo,
            fenac:fenac,
            nrodocumento:nrodocumento,
            colegiatura:colegiatura,
            especialidad:especialidad,
            usu:usu,
            contra:contra,
            rol:rol,
            email:email
        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
                    $("#modal_registro").modal('hide');
                    listar_medico();
                    LimpiarCampos();
                    Swal.fire("Mensaje De Confirmacion","Datos guardados correctamente, medico registrado","success");
                    
                }else{
                    LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","La colegiatura o el nrodocumento ya esta en nuestra data","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })
}

function Editar_Medico(){
    var idmedico = $("#id_medico").val();
    var nombre = $("#txt_nombres_editar").val();
    var apepat = $("#txt_apepat_editar").val();
    var apemat = $("#txt_apemat_editar").val();
    var direccion = $("#txt_direccion_editar").val();
    var movil = $("#txt_movil_editar").val();
    var sexo = $("#cbm_sexo_editar").val();
    var fenac = $("#txt_fenac_editar").val();
    var nrodocumentoactual = $("#txt_ndoc_editar_actual").val();
    var nrodocumentonuevo = $("#txt_ndoc_editar_nuevo").val();
    var colegiaturaactual = $("#txt_ncol_editar_actual").val();
    var colegiaturanuevo = $("#txt_ncol_editar_nuevo").val();
    var especialidad = $("#cbm_especialidad_editar").val();
    var idusuario = $("#id_usuario").val();
    var email = $("#txt_email_editar").val();
    var validaremail=$("#validar_email_editar").val();
    if(validaremail=="incorrecto"){
        return Swal.fire('Mensaje De Advertencia','El email ingresado no tiene el formato correcto','warning');
    }
    if(nombre.length==0 || apepat.length==0 || apemat.length==0 || direccion.length==0 || movil.length==0 || sexo.length==0 || fenac.length==0 || nrodocumentonuevo.length==0 || colegiaturanuevo.length==0 || especialidad.length==0  || email.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene todos los campos","warning");

    }
    $.ajax({
        "url":"../controlador/medico/controlador_medico_modificar.php",
        type:'POST',
        data:{
            idmedico:idmedico,
            nombre:nombre,
            apepat:apepat,
            apemat:apemat,
            direccion:direccion,
            movil:movil,
            sexo:sexo,
            fenac:fenac,
            nrodocumentoactual:nrodocumentoactual,
            nrodocumentonuevo:nrodocumentonuevo,
            colegiaturaactual:colegiaturaactual,
            colegiaturanuevo:colegiaturanuevo,
            especialidad:especialidad,
            idusuario:idusuario,
            email:email
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_editar").modal('hide');
                listar_medico();
                Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success");
                
            }else{
                Swal.fire("Mensaje De Advertencia","La colegiatura o el nrodcoumento ya esta en nuestra data","warning");  
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }

    })
}