<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOPRODUCTO = $_POST['CODIGOPRODUCTO'];

$cn->Conectar();
$res = $cn->Consulta("UPDATE  stock SET S_CANTIDAD =S_CANTIDAD + 1 WHERE CODIGOPRODUCTO='$CODIGOPRODUCTO'");

$cn->Desconectar();
?>
