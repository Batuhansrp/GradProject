<?php

session_start();
ob_start();
require_once 'baglanti.php';

$temp2= $_POST['resim_al'];
$temp1= $_SESSION['hasta_kullaniciadi'];
if(isset($_POST['hresimbtn'])){
$kaydet=$db->prepare("UPDATE resim_hasta set
	resim_url=:resim_al
	where hasta_tc=$temp1 ");
$duzenle=$kaydet->execute(array(
'resim_al' => $temp2
));




if ($duzenle) {
    	  echo "basarili";
    	  
    	  ob_flush();
    	  exit;

}
else {
    echo $temp1;
   echo "basarilisiz";
}

}?>