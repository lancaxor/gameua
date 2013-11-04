<?php

if($_COOKIE['login']!=""&&$_COOKIE['passwd']!="")											//Authorized user
	echo"<a href='logout.php'>[Log out]</a>";
else																						//Non-authorized user
	echo"<a href=login.php>[Logon]</a><br><a href=register.php>[Register]</a><br/>";

//here links: home, street, shop, etc
print("<hr/>");
?>