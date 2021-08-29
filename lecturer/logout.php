<?php 
session_start();
unset($_SESSION['gogi_lecturer']);
header('location: ./');
exit();
?>