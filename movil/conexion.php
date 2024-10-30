<?php
function Conectarse(){
$servidor = "localhost";
$basededatos="ariucv_ucv";
$usuario="ariucv_ucv";
$clave="t2f-0001t";
$cn=mysql_connect($servidor,$usuario,$clave) or die ("Error Conectando la bd");
mysql_select_db($basededatos,$cn) or die ("Error seleccionando la bd");
mysql_query("SET NAMES 'utf8'");
return $cn;
}
?>