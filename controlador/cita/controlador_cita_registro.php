<?php
    require '../../modelo/modelo_cita.php';
    $MC = new Modelo_Cita();//Instanciamos
    $idpaciente = htmlspecialchars($_POST['idpa'],ENT_QUOTES,'UTF-8');
    $iddoctor = htmlspecialchars($_POST['iddo'],ENT_QUOTES,'UTF-8');
    $idespecialidad = htmlspecialchars($_POST['idespecialidad'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $consulta = $MC->Registrar_Cita($idpaciente,$iddoctor,$idespecialidad,$descripcion,$idusuario);
    echo $consulta;

?>