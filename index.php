<?php
//$rootdb = mysql_connect("alex-hpc","alex","alexpass") or die("Couldn't connect to MySQL");				//не лапать! Это коннект к мускулю... ///подсунуть свои значения!
//mysql_select_db("ped_game" ,$rootdb)or die("Couldn't connect to DB");									//тем более не лапать!! Это коннект к БД... ///см. выше

if($_COOKIE['login']!=""&&$_COOKIE['passwd']!=""){		//юзер недавно уже залогинился, срок действия куукизов ещё не истек
	$passwd=$_COOKIE['passwd'];
	$login=$_COOKIE['login'];
	header("location: street.php");}
include "head.php";
echo"<title>Life After The End</title>";
echo "<p>Это  самая крутая игра! Большой выбор оружия, только реальные игроки, динамичные битвы БЕСПЛАТНО!!!</p>";//Это все, что видит гость
//mysql_close($rootdb);
include'footer.php';
?>