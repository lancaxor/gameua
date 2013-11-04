<?php

$passwd=$_POST["pass"];	//md5
$login=$_POST["login"];

$db = mysql_connect("alex-hpc","authentificator","authpass") or die("Couldn't connect to MySQL");
mysql_select_db("ped_game" ,$db)or die("Couldn't connect to DB");

$authQu="select id from player where nickname='$login' AND password='$passwd'";
$auth_res=mysql_query($authQu);

if(!$auth_res){									// юзер врунишка -- нет такого юзера с логином\паролем в базе!
	header("location: login.php");
	exit();}
else
	header("location: street.php");
setcookie("login",$login,time()+86400);
setcookie("passwd",$passwd,time()+86400);
mysql_close($db);
?>