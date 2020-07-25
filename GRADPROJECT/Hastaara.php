<?php 
session_start();
ob_start();
require_once 'baglanti.php';
$kullaniciadi= $_POST['hastatcno'];
$sifre= $_POST['hastasifre'];
$md5_sifre=(md5($sifre));
$kullanicisor = $db->prepare("select * from HASTA where hasta_tc=:tcno and hasta_sifre=:sifrem");
$kullanicisor->execute(array(

'tcno' => $kullaniciadi,
'sifrem' => $md5_sifre
));

$say=$kullanicisor->rowCount();

if($say==1){
    
    
     if(isset($_POST['beni_hatirla'])){
        
        
        
        setcookie("hadi","$kullaniciadi",strtotime("+1 day"));
        setcookie("hsifre","$sifre",strtotime("+1 day"));
        
         
    }
    else {
        
        
        setcookie("hadi","$kullaniciadi",strtotime("-1 day"));
        setcookie("hsifre","$sifre",strtotime("-1 day"));
        
        
        
    }
	
	echo $_SESSION['hasta_kullaniciadi']=$kullaniciadi;
    header('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');

	exit;
}

else{
$Message = urlencode("Şifreniz veya Kullanıcı Adınız Hatalıdır ");
		header ("Location: https://redayhost.com/tefo-batu/HastaGirisi.php?Message=".$Message);
}

?>
<?php $db = null; ?>