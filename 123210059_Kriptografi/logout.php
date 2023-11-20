<?php  
@session_start();
include "config.php";
session_destroy();
echo "<script>location='login.php';</script>";
?>