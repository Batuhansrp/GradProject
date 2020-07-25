<?php

session_start();
ob_start();
require_once 'baglanti.php';
$temp1= $_SESSION['hasta_kullaniciadi'];






if(isset($_POST['resimyukle'])){
    
$yukleklasor ="resimler/";
$tmp_name=$_FILES['yukle_resim']['tmp_name'];
$name =$_FILES['yukle_resim']['name'];
$boyut=$_FILES['yukle_resim']['size'];
$tip=$_FILES['yukle_resim']['type'];
$uzanti = substr($name,-4,4);
$rastgelesayi1= rand(10000,50000);
$rastgelesayi2= rand(10000,50000);
$resimad = $rastgelesayi1.$rastgelesayi2.$uzanti;


//dosya varmı kontrol
if(strlen($name)==0){
    
    echo "bir dosya sec";
    exit();
}
//boyut kontrol

if($boyut> (1024*1024*3)){
    
    echo "boyut fazla";
    exit();
}


//tip kontrol

if($tip != 'image/jpeg' &&  $tip != 'image/png' && $uzanti != '.jpg ' )
{
    
    echo "tip ynalis";
    exit();
}


move_uploaded_file($tmp_name,"$yukleklasor/$resimad");

    
    $resimsor = $db->prepare("insert into  resim_hasta set resim_ad=:ad" );
$resimyukle = $resimsor->execute(array('ad'=> $resimad));
    

  

    
    
    
    
    
    
    
}






?>
<form acton="" method="POST" enctype="multipart/form-data">
    <input type="file" name="yukle_resim" />
    
    <input type="submit" value="yükle" name="resimyukle" />
</form>