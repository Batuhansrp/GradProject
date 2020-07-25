<?php

session_start();
ob_start();
require_once 'baglanti.php';

$md5pass=md5($_POST['hasta_sifre']);
$temp1= $_SESSION['hasta_kullaniciadi'];
if(isset($_POST['hsifrebtn'])){
$kaydet=$db->prepare("UPDATE HASTA set
	hasta_sifre=:hasta_sifre
	where hasta_tc=$temp1 ");
$duzenle=$kaydet->execute(array(
'hasta_sifre' => $md5pass
));




if ($duzenle) {
    	 
    	  $Message = urlencode("Şifreniz Değiştirildi ");
		header ("Location: https://redayhost.com/tefo-batu/Hasta_Ayar.php?Message=".$Message);
    	  ob_flush();
    	  exit;

}
else {
     $Message = urlencode("Şifreniz Değiştirilemedi ");
		header ("Location: https://redayhost.com/tefo-batu/Hasta_Ayar.php?Message=".$Message);
    	  ob_flush();
    	  exit;
}

}?>