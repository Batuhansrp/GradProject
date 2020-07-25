<?php 
session_start();
ob_start();
require_once 'baglanti.php';

if(isset($_POST['dhastaekle'])){


$harf = 'ABCDEFGHIJKLMNOPRSTUVYZ';
$harf_sayisi = mb_strlen($harf);
for ($i = 0; $i < 10; $i++){
	$secilen_harf_konumu = mt_rand(0,$harf_sayisi - 1);
	$kod .= mb_substr($harf, $secilen_harf_konumu, 1).rand(0,9);
}
$temppass = mb_substr($kod, 0, 6); 

$md5_pass = (md5($temppass));
$ha=$_POST['hasta_ad'];

$hs=$_POST['hasta_soyad'];
 $_POST['hasta_tel'] = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['hasta_tel']);
$kaydet1=$db->prepare("INSERT INTO hasta_tel set
      hasta_tc=:hasta_tc,
       hasta_tel=:hasta_tel"
);


$insert1=$kaydet1->execute(array(

'hasta_tc' => $_POST['hasta_tc'],
'hasta_tel' => $_POST['hasta_tel'],

));




$temp = $_SESSION['doktor_kullaniciadi'];


$resimsor = $db->prepare("insert into  resim_hasta set hasta_tc=:hasta_tc" );
$resimyukle = $resimsor->execute(array('hasta_tc'=>  $_POST['hasta_tc']));






$kaydet=$db->prepare("INSERT INTO HASTA set
        hasta_tc=:hasta_tc,
		hasta_ad=:hasta_ad,
		hasta_soyad=:hasta_soyad,
		hasta_sifre=:hasta_sifre,
		hasta_diyet=:hasta_diyet,
		hasta_diyabettur=:hasta_diyabettur,
		hasta_ilactur=:hasta_ilactur,
		doktor_id=:doktor_id
		");

$insert=$kaydet->execute(array(

'hasta_tc' => $_POST['hasta_tc'],
'hasta_ad' => $_POST['hasta_ad'],
'hasta_soyad' => $_POST['hasta_soyad'],
'hasta_sifre' => $md5_pass,
'hasta_diyet' => $_POST['hasta_diyet'],
'hasta_diyabettur' => $_POST['hasta_diyabettur'],
'hasta_ilactur' => $_POST['hasta_ilactur'],
'doktor_id' => $temp
));
}









	if ($insert) {
		
		
				
		 try {


$msg  = 'test message';
$gsm  = $_POST['hasta_tel'];


//SMS İLE ŞİFRE GÖNDERME

} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	
		
		
		  $Message = urlencode("Hastanız Başarıyla Sisteme Kayıt Edildi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhastakayit.php?Message=".$Message);
	
        exit;
		
	
		
		
		
		
	}
	else {
		 $Message = urlencode("Kayıt İşlemi gerçekleşmedi.");
		header ("Location: https://redayhost.com/tefo-batu/doktorhastakayit.php?Message=".$Message);
	
        exit;
	}


?>