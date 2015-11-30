<?php

include("connect.php");
session_start();
ob_start();
$item=mysql_real_escape_string($_GET['id']);
$sql=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
$s=mysql_fetch_array($sql);
if($s['points'] > 50){
	$p=$s['points']-50;
	$sp=mysql_query("INSERT INTO bbb(id,book_id,student) VALUES('','".$item."','".$_SESSION['user_id']."')") or die();
	if($sp){
		echo 'Successfully submited';
		echo 'Back to <a href="index.php">Home</a>';
		$r=mysql_query("UPDATE users SET points='".$p."' WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
	}
}
else{
	echo 'You don\'t have enough points to buy it';
			echo 'Back to <a href="index.php">Home</a>';

}




?>