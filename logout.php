<?php
//include"head.php";

header("location: index.php");
setcookie("login","",time()-7);
setcookie("passwd","",time()-7);

include"footer.php";
?>