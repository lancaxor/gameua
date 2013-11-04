<?php
if($_COOKIE['login']!=""&&$_COOKIE['passwd']!=""){
	$passwd=$_COOKIE['passwd'];
	$login=$_COOKIE['login'];
	header("location: street.php");}
include"head.php";
echo "<form method=post action='autenticate.php'>
	<table><tr><td>Enter login:</td><td><input type=text name=login></td></tr><tr><td>Enter password:</td><td><input type=password name=pass></td></tr></table>
	<input type=submit value='Login'>
	</form>";
echo"<a href='index.php' method='post'>Text...
	<postfield name='fld' value='111'>
	</a>";
include"footer.php";
?>