<?php
//$rootdb = mysql_connect("alex-hpc","alex","alexpass") or die("Couldn't connect to MySQL");				//�� ������! ��� ������� � �������... ///��������� ���� ��������!
//mysql_select_db("ped_game" ,$rootdb)or die("Couldn't connect to DB");									//��� ����� �� ������!! ��� ������� � ��... ///��. ����

echo"<form method='post' action='doreg.php'>
<table><tr><td>Nickname:</td><td><input type='text' name='login'></td></tr>
<tr><td>E-mail:</td><td><input type='text' name='email'></td></tr>
<tr><td>Password:</td><td><input type='password' name='pass'></td></tr>
<tr><td>Cofirm password:</td><td><input type='password' name='pass'></td></tr>
<tr><td>Player Type:</td><td>
<select name='ptype' size=3>
<option value='s'>�������
<option value='l'>������
<option value='h'>����������</select></td></tr></table>
<input type='submit' value='Register'>
<hidden name='first' value='true'>
</form>";
include"footer.php";
?>