<?php
header("Content-Type:application/vnd.ms-excel;charset=utf-8");
//iso-8859-1
header("Content-Disposition: attachment; filename=listado de reservas.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $_POST['datos_a_enviar'];
?>