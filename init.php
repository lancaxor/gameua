<?php

/******************************************************************************************************************/
/* Итак... Мускуль-юзеры:
/* логин: alex, привелегии: select, insert, drop, create
/* логин: authentificator, привелегии: SELECT
/* 
/* 
/* 
/* 
/******************************************************************************************************************/
$rootdb = mysql_connect("alex-hpc","alex","alexpass") or die("Couldn't connect to MySQL");
mysql_select_db("ped_game" ,$rootdb)or die("Couldn't connect to DB");

echo '<h1 align="center"> This script must be started once!!!</h1>';
echo '<h3>Creating table player...<br/>';
$createPlayerTblQu="create table Player (id int not null auto_increment, primary key(id),nickname varchar(64) not null, attack int,def1 int,def2 int,turned bool);";
mysql_query($createPlayerTblQu) or die("Cannot create table Player: error ".mysql_error());
echo 'Done!<br/>';
echo 'Creating table Battle...<br/>';
$createBattleTblQu="create table battle(id_btl int not null auto_increment, primary key(id_btl),player1 int not null, player2 int not null);";
mysql_query($createBattleTblQu) or die("Cannot create table Battle: error ".mysql_error());
echo'Done!<br/>';
echo'Creating table Body...<br/>';
$createBodyTblQu="create table body(id_body int not null auto_increment,primary key(id_body),name varchar(32) not null);";
mysql_query($createBodyTblQu) or die("Cannot create table Battle: error ".mysql_error());
echo'Done!<br/>';
EcHo'Writing data to Body table...</br>';

mysql_query("insert into body set name='head'");
mysql_query("insert into body set name='hand'");
mysql_query("insert into body set name='Ass'");
mysql_query("insert into body set name='TT_A_X'");
mysql_query("insert into body set name='Leg'");
mysql_query("insert into body set name='Xap9l'");
mysql_query("insert into body set name='Body'");

echo'Done!<br/></h3>';

mysql_close($rootdb);
?>