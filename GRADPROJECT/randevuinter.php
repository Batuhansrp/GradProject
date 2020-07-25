<?php

session_start();
ob_start();
require_once 'baglanti.php';


$temp1= $_SESSION['hasta_kullaniciadi'];
$verisor = $db->prepare("SELECT * FROM HASTA WHERE hasta_tc =$temp1");
$verisor->execute();
$temp2=$verisor->fetch(PDO::FETCH_ASSOC);
$tm=$temp2['doktor_id'];
$verisor2 = $db->prepare("SELECT doktor_tel FROM DOKTOR WHERE doktor_tc =  $tm");
$verisor2->execute();
$temp3=$verisor2->fetch(PDO::FETCH_ASSOC);

$rt = $_POST['randevu_tarih'];
$rs =$_POST['randevu_saat'];
$ha=$temp2['hasta_ad'];
$hs=$temp2['hasta_soyad'];
if(isset($_POST['rformbtn'])){

 
  $goruntule= $db->prepare("SELECT *
 FROM randevu "); 
  $goruntule->execute();
  
  while ($vericekme=$goruntule->fetch(PDO ::FETCH_ASSOC) ){ 
 $dt1=$vericekme['randevu_tarih'];
 $dt2=$vericekme['randevu_saat'];
if($dt1 == $_POST['randevu_tarih'] && $dt2==$_POST['randevu_saat'])
{


 $Message = urlencode("Bu Saat Dolu Başka Saat Seçiniz ");
		header ("Location: https://redayhost.com/tefo-batu/hastarandevuform.php?Message=".$Message);

 exit;

}

}



$kaydet=$db->prepare("INSERT INTO randevu set
        randevu_tarih=:randevu_tarih,
		randevu_saat=:randevu_saat,
	    hasta_tc=:hasta_tc,
		doktor_tc=:doktor_tc
		");

$insert=$kaydet->execute(array(
'randevu_tarih' =>  $_POST['randevu_tarih'],
'randevu_saat' => $_POST['randevu_saat'],
'hasta_tc' => $temp1,
'doktor_tc' => $temp2['doktor_id']
));
}

	if ($insert) { 
	    
	          
	    try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp3['doktor_tel'];



} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    $Message = urlencode("Randevuyu Aldınız ");
		header ("Location: https://redayhost.com/tefo-batu/hastarandevuform.php?Message=".$Message);
	
        exit;
	}
	else {
		
		echo $temp2['doktor_id'];
		exit;
	

}?>