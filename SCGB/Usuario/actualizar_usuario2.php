<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$PROVEEDOR=$_POST['PROVEEDOR'];
$PRODUCTO=$_POST['PRODUCTO'];
$PERSONAL= $_POST['PERSONAL'];
$OBRA=$_POST['OBRA'];
$BODEGA=$_POST['BODEGA'];
$INFORME= $_POST['INFORME'];
$ADMINISTRACION=$_POST['ADMINISTRACION'];
$LOGIN = $_POST['LOGIN'];
$PASSWORD = $_POST['PASSWORD'];
$NOMBRE = $_POST['NOMBRE'];
$APELLIDO = $_POST['APELLIDO'];
$TELEFONO = $_POST['TELEFONO'];
$EMAIL = $_POST['EMAIL'];

$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPERMISO FROM usuario u, permiso p WHERE u.CODIGOPERMISO=p.CODIGOPERMISO AND u.U_LOGIN='$LOGIN'");
while ($row = $cn->getRespuesta($res)){
    $CODIGOPERMISO = $row['CODIGOPERMISO'];
}
$cn2->Conectar();
$res2 = $cn2->Consulta("UPDATE usuario SET U_PASSWORD='$PASSWORD', U_NOMBRE='$NOMBRE', U_APELLIDO='$APELLIDO', U_TELEFONO ='$TELEFONO', U_EMAIL ='$EMAIL',U_ESTADO=1  WHERE U_LOGIN='$LOGIN'");
$cn3->Conectar();
$res3 = $cn3->Consulta("UPDATE permiso SET PROVEEDOR=$PROVEEDOR, PRODUCTO=$PRODUCTO, PERSONAL=$PERSONAL, OBRA=$OBRA,BODEGA=$BODEGA,INFORMEYGRAFICO=$INFORME,ADMINISTRACION=$ADMINISTRACION  WHERE CODIGOPERMISO='$CODIGOPERMISO'");
$cn3->Desconectar();
$cn2->Desconectar();
$cn->Desconectar();
?>

