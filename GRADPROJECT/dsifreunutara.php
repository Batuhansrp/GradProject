<?php 
session_start();
ob_start();
require_once 'baglanti.php';

$tc= $_POST['doktor_tc'];
$_SESSION['tc']=$tc;
$kullanicisor = $db->prepare("select * from DOKTOR where doktor_tc=:doktor_tc");
$kullanicisor->execute(array(
'doktor_tc' => $tc,
));

$say=$kullanicisor->rowCount();

if($say==1){

	
	$kullanicisor1 = $db->prepare("select * from DOKTOR where doktor_tc=$tc");
	$kullanicisor1->execute();
    $temp2=$kullanicisor1->fetch(PDO::FETCH_ASSOC);
	$ht=$temp2['doktor_tel'];

	$harf = 'ABCDEFGHİJKLMNOPRSTUVYZ';
$harf_sayisi = mb_strlen($harf);
for ($i = 0; $i < 10; $i++){
	$secilen_harf_konumu = mt_rand(0,$harf_sayisi - 1);
	$kod .= mb_substr($harf, $secilen_harf_konumu, 1).rand(0,9);
}
$temppass = mb_substr($kod, 0, 6); 
	
	
	$kaydet=$db->prepare("INSERT INTO temp_kod set
        tel_kod=:tel_kod");

$insert=$kaydet->execute(array(

'tel_kod' => $temppass));

	
	
	try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $ht;



} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	
  
    header('Location: https://redayhost.com/tefo-batu/dsifreunut2.php?tc='.$tc);

	exit;
}

else{
$Message = urlencode("T.C. Kimlik Numaranızı Yanlış Girdiniz ");
		header ("Location: https://redayhost.com/tefo-batu/DoktorGirisii.php?Message=".$Message);

 exit;
}

?>
<?php $db = null; ?>