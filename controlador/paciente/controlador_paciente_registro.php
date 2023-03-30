<?php
    require '../../modelo/modelo_paciente.php';
    $MP = new Modelo_Paciente();//Instanciamos
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat = htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $credencial = htmlspecialchars($_POST['credencial'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $nrodocumento = htmlspecialchars($_POST['nrodocumento'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Paciente($nombres,$apepat,$apemat,$credencial,$direccion,$sexo,$nrodocumento);
    echo $consulta;

?>