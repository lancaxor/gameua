<?php
include"head.php";

if(!$_COOKIE['login']&&!$_COOKIE['passwd'])
	header("location: login.php");
	
echo"<h1>������������, ".$_COOKIE["login"]."!</h1>";

include"footer.php";
?>