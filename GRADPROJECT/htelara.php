<?php

session_start();
ob_start();
require_once 'baglanti.php';


$temp1= $_SESSION['hasta_kullaniciadi'];
if(isset($_POST['htelbtn'])){
$kaydet=$db->prepare("UPDATE hasta_tel set
    hasta_tel=:hasta_tel
    where hasta_tc=$temp1 ");
    $_POST['hasta_tel'] = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['hasta_tel']);
$duzenle=$kaydet->execute(array(
'hasta_tel' => $_POST['hasta_tel']
));




if ($duzenle) {
          $Message = urlencode("İşlem Başarılı ");
		header ("Location: https://redayhost.com/tefo-batu/Hasta_Ayar.php?Message=".$Message);
          ob_flush();
          exit;

}
else {
      $Message = urlencode("İşlem Başarısız ");
		header ("Location: https://redayhost.com/tefo-batu/Hasta_Ayar.php?Message=".$Message);
          ob_flush();
          exit;
}

}?>