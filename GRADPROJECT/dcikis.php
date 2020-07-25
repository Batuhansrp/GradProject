<?php

session_start();
ob_start();
 require_once 'baglanti.php';
session_destroy();
header("location: DoktorGirisii.php");
 
?>