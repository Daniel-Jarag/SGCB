<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOHISTORICO = $_POST['CODIGOHISTORICO'];
$FECHA = $_POST['FECHA'];
$cn->Conectar();
$res = $cn->Consulta("UPDATE historico_trabajador SET HT_FECHAINICIO='$FECHA' WHERE CODIGOHISTORICOTRABAJADOR='$CODIGOHISTORICO'");
$cn->Desconectar();
?>