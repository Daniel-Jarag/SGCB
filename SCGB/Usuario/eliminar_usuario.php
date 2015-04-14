<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  usuario SET U_ESTADO=0 WHERE U_LOGIN='$CODIGO'");
$cn->Desconectar();
?>