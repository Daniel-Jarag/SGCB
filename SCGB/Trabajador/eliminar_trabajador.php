<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  trabajador SET T_ESTADO='0' WHERE RUN='$CODIGO'");
$cn->Desconectar();
?>