<?php
//$rootdb = mysql_connect("alex-hpc","alex","alexpass") or die("Couldn't connect to MySQL");				//�� ������! ��� ������� � �������... ///��������� ���� ��������!
//mysql_select_db("ped_game" ,$rootdb)or die("Couldn't connect to DB");									//��� ����� �� ������!! ��� ������� � ��... ///��. ����

if($_COOKIE['login']!=""&&$_COOKIE['passwd']!=""){		//���� ������� ��� �����������, ���� �������� �������� ��� �� �����
	$passwd=$_COOKIE['passwd'];
	$login=$_COOKIE['login'];
	header("location: street.php");}
include "head.php";
echo"<title>Life After The End</title>";
echo "<p>���  ����� ������ ����! ������� ����� ������, ������ �������� ������, ���������� ����� ���������!!!</p>";//��� ���, ��� ����� �����
//mysql_close($rootdb);
include'footer.php';
?>