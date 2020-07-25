<?php

//fetch_user_chat_history.php
session_start();
include('baglanti.php');



echo mesaj_gecmis_getir($_SESSION['doktor_kullaniciadi'], $_POST['alan_id'], $db);

?>