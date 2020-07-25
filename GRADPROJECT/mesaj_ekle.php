<?php

//insert_chat.php
session_start();
include('baglanti.php');



$data = array(
	':alan_id'		=>	$_POST['alan_id'],
	':gonderen_id'		=>	$_SESSION['doktor_kullaniciadi'],
	':sohbet_mesaj'		=>	$_POST['sohbet_mesaj'],
	':durum'			=>	'1'
);

$query = "
INSERT INTO sohbet_mesaj 
(alan_id, gonderen_id, sohbet_mesaj, durum) 
VALUES (:alan_id, :gonderen_id, :sohbet_mesaj, :durum)
";

$statement = $db->prepare($query);

if($statement->execute($data))
{
	echo mesaj_gecmis_getir($_SESSION['doktor_kullaniciadi'], $_POST['alan_id'], $db);
}

?>