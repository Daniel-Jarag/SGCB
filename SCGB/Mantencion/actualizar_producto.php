<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOPRODUCTO = $_POST['CODIGOPRODUCTO'];
$CODIGOUNITARIO = $_POST['CODIGOUNITARIO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("UPDATE  producto_unitario
 SET PU_ESTADO=1  WHERE CODIGOPRODUCTO='$CODIGOPRODUCTO' AND CODIGOUNITARIO='$CODIGOUNITARIO'");
$cn->Desconectar();
?>