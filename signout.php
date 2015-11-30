<?php
session_start();
ob_start();
include 'connect.php';

unset ($_SESSION['signed_in']);

session_destroy();
echo "you successfully logged out";
header ('Location:index.php' );

?>