<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOPRESTAMO=$_POST['CODIGOPRESTAMO'];
$OBRA = $_POST['OBRA'];
$RUN = $_POST['RUN'];
$FECHA = $_POST['FECHA'];
$TOTALPRODUCTO = $_POST['TOTALPRODUCTO'];
$COMENTARIO = $_POST['COMENTARIO'];
$USUARIO = $_POST['USUARIO'];
$ESTADO = $_POST['ESTADO'];

$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("INSERT INTO PRESTAMO(CODIGOPRESTAMO,CODIGOOBRA,RUN,PT_FECHA,PT_TOTALPRODUCTO,PT_COMENTARIO,PT_USUARIO,PT_ESTADO) VALUES($CODIGOPRESTAMO,$OBRA,'$RUN','$FECHA',$TOTALPRODUCTO,'$COMENTARIO','$USUARIO',$ESTADO)");
$cn->Desconectar();
?>