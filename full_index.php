<?php
include 'head.php';

/************************************************************************************************************************/
/*	����, ������ �����������:																							*/
/*	1) ��� �������� ����� �� 2� ���� ����� ������� ����� ���� �� ������������, � ��������� ����� ���� �� ������� �����	*/
/*	�������� ����. �������� ��������� ����� ����� ����� ����� -- ������� � ������ 18.									*/
/*	2) ��� �������� ������. ����� ����, ����� ������, ����������, ��� ��������� ��� ������ ��� �����������.				*/
/*	3) ���� ������, ��� ��������, ����� ������� ������ ���. �������� ������������ ��������� ����������� ���������� �� 	*/
/*	� ���� head.php.																									*/
/*																														*/
/*	�������:																											*/
/*	Player{id int primkey autoncrement,nickname string not null,attack int,def1 int,def2 int,turned bool}				*/
/*	body {id_body int primkey autoncrement, name string not null}														*/
/*	battle{id_btl int primkey autoncrement, player1 int not null,player2 int not null}									*/
/************************************************************************************************************************/

if($playernick){																			//���� ���������
	$loginusrqy="select * from player where nickname='".$playernick."';";
	$selusr=mysql_query($loginusrqy) or die(mysql_error());
	if(mysql_num_rows($selusr)==0){															//������� �� ����??
		if($playernick=='111'){																//��� ��������� ���, � ������������� �� �� ��������� ��������?..
			echo"<h3>�������� ���!</h3>";													// ��� ��������.. ���� ����� ������ ����� �������;)
			$playernick=null;																// ���������� ����, ������� ���� ����� ��� ���������...
			goto nonick;}																	// ����, �� �� ����! ����� ���������� ��� -_-
		echo "no user found! Creating new user ",$playernick,"...";							// ����, �� �� �������!!!
		$addusqu="insert into player set nickname='".$playernick."';";						// ���... �� �����..
		mysql_query($addusqu) or die(mysql_error());										// /*�����... ������ �����, �� �������� over100500$ ������...*/
		nonick:}}																			//���� � �����, ������ �������...
		
if (!$playernick){																			//��������� �����... ����, � �� ��� ������?? � ���� �� ����... �����������!
	echo "<form method=post action='index.php'>
	<table><tr><td>Enter login:</td><td><input type=text name=login></td></tr><tr><td>Enter password:</td><td><input type=password name=pass></td></tr></table>
	<input type=submit value='Login'>
	</form>";
}else{																						//����, %username%, �� �� $playernick, �������� ������!
	$bodysize=mysql_query("select count(*) from body;");
	$selplacesqu="select * from body;";														//Body parts Query
	$selplaces=mysql_query($selplacesqu);													//Body Part Table
	$EnemyQu="
	select player.nickname as Enemy from player inner join battle on (battle.player1=player.id)
		where battle.player2=(select id from player where nickname='$playernick')
	union
	select player.nickname as Enemy from player inner join battle on (battle.player2=player.id)
		where battle.player1=(select id from player where nickname='$playernick')";
	$EnemyQuRes=mysql_query($EnemyQu);
	//echo "<h1>[",$EnemyQuRes,"]</h1>";
	if(!$EnemyQuRes){
		echo "<h3>Select enemy!</h3>";
		die(mysql_error());
		goto theend;}
	$EnemyNick=mysql_result($EnemyQuRes,0);
	if($_POST["selAttack"]){																	// ��� ������ ������� ���������� selAttack ������ :(
		$setPlayerAttackQu="update player set attack=".$_POST["selAttack"]." where nickname='$playernick'";
		$setPlayerDeaf1Qu="update player set def1=".$_POST["selDeaf1"]." where nickname='$playernick'";
		$setPlayerDeaf2Qu="update player set def2=".$_POST["selDeaf2"]." where nickname='$playernick'";
		$setTurnedQu="update player set turned=true where nickname='$playernick'";
		mysql_query($setPlayerAttackQu);
		mysql_query($setPlayerDeaf1Qu);
		mysql_query($setPlayerDeaf2Qu);
		mysql_query($setTurnedQu);
		$battleLog=$playernick." kicked ".$EnemyNick." to ".mysql_result(mysql_query('select name from body where id_body='.$_POST["selAttack"]),0).$_POST["battleLogPOST"];}
	echo "<form method=post action=index.php>
	<table align=center><tr><td align=right>Attack:</td><td>
	<select name=selAttack size=",$bodysize,">";
	for($i=0;$i<$bodysize;$i++)
		echo "<option value=",mysql_result($selplaces,$i,id_body),">",mysql_result($selplaces,$i,name);
	echo "</td></tr><tr><td align=right>Deaf1:</td><td>
	<select name=selDeaf1 size=",$bodysize,">";
	for($i=0;$i<$bodysize;$i++)
		echo "<option value=",mysql_result($selplaces,$i,id_body),">",mysql_result($selplaces,$i,name);
	echo "</td></tr><tr><td align=right>Deaf2:</td><td>
	<select name=selDeaf2 size=",$bodysize,">";
	for($i=0;$i<$bodysize;$i++)
		echo "<option value=",mysql_result($selplaces,$i,id_body),">",mysql_result($selplaces,$i,name);
	echo"</td></tr><tr><td colspan=2 align=center><input type=submit value='��� ��������!!!'/></td></tr><tr><td colspan=2>
	<input type=hidden name=login value=",$playernick,">
	<input type=hidden name=battleLogPOST value='\n",$battleLog,"'>	
	<input type=hidden name=EnemyNickPOST value='\n",$EnemyNick,"'>	
	</tr></td><tr><td colspan=2 align=center>";
	echo"<textarea  align=center cols=100 rows=10 wrap=physical>",$battleLog,"</textarea></tr></td></table></form>";
	if($EnemyNick){
		$EnemyTurnedQu="select turned from player where nickname='$EnemyNick';";
		$EnemyTurned=mysql_query($EnemyTurnedQu);
		while(!mysql_result($EnemyTurned,0)){
			sleep(1);
		}
		mysql_query($setNOTTurnedQu);}
}
theend:
include'footer.php';
?>