<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGOPERMISO = $_POST['CODIGOPERMISO'];
$LOGIN = $_POST['LOGIN'];
$PASSWORD = $_POST['PASSWORD'];
$NOMBRE = $_POST['NOMBRE'];
$APELLIDO = $_POST['APELLIDO'];
$TELEFONO = $_POST['TELEFONO'];
$EMAIL = $_POST['EMAIL'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("INSERT INTO usuario(U_LOGIN,CODIGOPERMISO,U_PASSWORD,U_NOMBRE,U_APELLIDO,U_TELEFONO,U_EMAIL,U_ESTADO) VALUES('$LOGIN',$CODIGOPERMISO,'$PASSWORD','$NOMBRE','$APELLIDO',$TELEFONO,'$EMAIL',1)");
$cn->Desconectar();
?>