<?php 
session_start();
ob_start();
require_once 'baglanti.php';
$kullaniciadi= $_POST['doktortcno'];
$sifre= $_POST['doktorsifre'];

$kullanicisor = $db->prepare("select * from DOKTOR where doktor_tc=:tcno and doktor_sifre=:sifrem");
$kullanicisor->execute(array(

'tcno' => $kullaniciadi,
'sifrem' => $sifre
));

$say=$kullanicisor->rowCount();

if($say==1){
    
    
    if(isset($_POST['beni_hatirla'])){
        
        
        
        setcookie("kadi","$kullaniciadi",strtotime("+1 day"));
        setcookie("ksifre","$sifre",strtotime("+1 day"));
        
         
    }
    else {
        
        
        setcookie("kadi","$kullaniciadi",strtotime("-1 day"));
        setcookie("ksifre","$sifre",strtotime("-1 day"));
        
        
        
    }
    
	
	echo $_SESSION['doktor_kullaniciadi']=$kullaniciadi;
    header('Location: https://redayhost.com/tefo-batu/doktorhastaliste.php');

	exit;
}

else{
 $Message = urlencode("Şifreniz veya Kullanıcı Adınız Hatalıdır ");
		header ("Location: https://redayhost.com/tefo-batu/DoktorGirisii.php?Message=".$Message);
}

?>
<?php $db = null; ?>