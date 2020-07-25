<?php
ob_start();
session_start();
require_once 'baglanti.php';
$temp=$_GET['rid'];
$temp1= $_SESSION['doktor_kullaniciadi'];
$verisor = $db->prepare("SELECT * FROM randevu WHERE rid =$temp");
$verisor->execute();
$temp2=$verisor->fetch(PDO::FETCH_ASSOC);
 $rt=$temp2['randevu_tarih'];
 $rs=$temp2['randevu_saat'];
  
  $kullanicisor1 = $db->prepare("select * from randevu where rid=$temp");
	$kullanicisor1->execute();
    $temp9=$kullanicisor1->fetch(PDO::FETCH_ASSOC);
	$htc=$temp9['hasta_tc'];
  
  
  
   $telsor2 = $db->prepare("select * from hasta_tel where hasta_tc=$htc");
	$telsor2->execute();
    $temp7=$telsor2->fetch(PDO::FETCH_ASSOC);
	$htel=$temp7['hasta_tel'];
  
  
  
  
  
  
  
   try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $htel;




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}





if ($_GET['rsil']=="ok") {

	$sil=$db->prepare("DELETE from randevu where rid=:idr ");
	$silinsin=$sil->execute(array(
		'idr'=> $_GET['rid']
	
		));

	if ($silinsin) {

  
		Header("Location: https://redayhost.com/tefo-batu/randevulistedoktor.php?durum=ok");
		exit;
	}
	else 
		Header("Location: https://redayhost.com/tefo-batu/randevulistedoktor.php?durum=no");
		exit;
}
?>
