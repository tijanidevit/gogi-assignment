<?php 
session_start();
unset($_SESSION['gogi_student']);
header('location: ./');
exit();
?>