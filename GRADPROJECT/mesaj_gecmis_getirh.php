<?php

//fetch_user_chat_history.php
session_start();
include('hbaglanti.php');



echo mesaj_gecmis_getir($_SESSION['hasta_kullaniciadi'], $_POST['alan_id'], $db);

?>