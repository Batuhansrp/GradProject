<?php 
session_start();
ob_start();
require_once 'baglanti.php';


if($_POST['yeni_sifre']==$_POST['yeni_sifre2']){

$kod= $_POST['tel_kod'];
$temp1=$_POST['doktor_tc'];
$yenisifre= $_POST['yeni_sifre'];
$kodsor = $db->prepare("select * from temp_kod where tel_kod=:tel_kod");
$kodsor->execute(array(
'tel_kod' => $kod
));

$say=$kodsor->rowCount();

if($say==1){
    
	
	$kullanicisor1 = $db->prepare("select * from DOKTOR where doktor_tc=$temp1");
	$kullanicisor1->execute();
    $temp=$kullanicisor1->fetch(PDO::FETCH_ASSOC);
	
	
	
$guncelle=$db->prepare("UPDATE DOKTOR set doktor_sifre='$yenisifre' where doktor_tc=$temp1 ");
$guncelle->execute();
    $temp3=$guncelle->fetch(PDO::FETCH_ASSOC);

	
$guncelle2=$db->prepare("DELETE FROM temp_kod where tel_kod='$kod'");
$guncelle2->execute();
    $temp4=$guncelle2->fetch(PDO::FETCH_ASSOC);
	
	

	header ("Location: https://redayhost.com/tefo-batu/index.php");

   

	exit;
}

else{

}
$Message . "&tc=" . $temp1;

      }
      
      
      else{ 
          $temp1=$_POST['doktor_tc'];
          
        $Message = urlencode("Şifreler Aynı Değil ");
		header ("Location: https://redayhost.com/tefo-batu/dsifreunut2.php?Message=".$Message . "&tc=" . $temp1);
          
          
      }


?>



<?php $db = null; ?>
