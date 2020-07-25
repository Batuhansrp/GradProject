<?php 
session_start();
ob_start();
require_once 'baglanti.php';

if(isset($_POST['olcumekle'])){

$temp = $_SESSION['hasta_kullaniciadi'];

$verisor6 = $db->prepare("SELECT * FROM HASTA WHERE hasta_tc =$temp");
$verisor6->execute();
$temp6=$verisor6->fetch(PDO::FETCH_ASSOC);
$temp7=$temp6['doktor_id'];
$verisor7 = $db->prepare("SELECT * FROM DOKTOR WHERE doktor_tc =$temp7");
$verisor7->execute();
$temp8=$verisor7->fetch(PDO::FETCH_ASSOC);


$verisor = $db->prepare("SELECT * FROM HASTA WHERE hasta_tc =$temp");
$verisor->execute();
$temp2=$verisor->fetch(PDO::FETCH_ASSOC);
$ha=$temp2['hasta_ad'];
$hs=$temp2['hasta_soyad'];

$gelenn = $_POST['olcum_zaman'];
$zaman = date("y-m-d");

if($gelenn=='sabah_ac'){
    
    $kayitsor =$db -> prepare("SELECT * FROM OLCUM WHERE hasta_tc='$temp' and olcum_tarih= '$zaman'");
$kayitsor->execute(array());

$say=$kayitsor->rowCount();

if($say==1){
   

    if($gelenn=='sabah_ac'){
$kaydet=$db->prepare("UPDATE OLCUM set
		sabah_ac=:sabah_ac
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'sabah_ac' => $_POST['deger']
    ));
}
    
  	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190) {
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	} // insert   
  
} // say == 1

else{  
    
$kaydet=$db->prepare("INSERT INTO OLCUM set
        olcum_tarih=:olcum_tarih,
		sabah_ac=:sabah_ac,
		hasta_tc=:hasta_tc
		");

$insert=$kaydet->execute(array(
'olcum_tarih' => $zaman,
'sabah_ac' => $_POST['deger'],
'hasta_tc' => $temp
));

	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	} //insert
  } //else

    
} // gelen sabah_ac 

else if($gelenn=='sabah_tok'){
$kaydet=$db->prepare("UPDATE OLCUM set
		sabah_tok=:sabah_tok
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'sabah_tok' => $_POST['deger']
    ));
    
    	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];	    
	    
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];



} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	}
}

else if($gelenn=='oglen_ac'){
$kaydet=$db->prepare("UPDATE OLCUM set
		oglen_ac=:oglen_ac
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'oglen_ac' => $_POST['deger']
    ));
    	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	}
}

else if($gelenn=='oglen_tok'){
$kaydet=$db->prepare("UPDATE OLCUM set
		oglen_tok=:oglen_tok
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'oglen_tok' => $_POST['deger']
    ));
    	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];



} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	}
}

else if($gelenn=='aksam_ac'){
$kaydet=$db->prepare("UPDATE OLCUM set
		aksam_ac=:aksam_ac
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'aksam_ac' => $_POST['deger']
    ));
    	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	}
}

else if($gelenn=='aksam_tok'){
$kaydet=$db->prepare("UPDATE OLCUM set
		aksam_tok=:aksam_tok
		where olcum_tarih='$zaman' and hasta_tc = '$temp'
		");

$insert=$kaydet->execute(array(
    'aksam_tok' => $_POST['deger']
    ));
    	if ($insert) {
  	    $verisor3 = $db->prepare("SELECT * FROM OLCUM WHERE hasta_tc ='$temp'and  olcum_tarih= '$zaman'");
        $verisor3->execute();
        $temp5=$verisor3->fetch(PDO::FETCH_ASSOC);
        $sa=$temp5['sabah_ac'];
        $st=$temp5['sabah_tok'];
        $oa=$temp5['oglen_ac'];
        $ot=$temp5['oglen_tok'];
        $aa=$temp5['aksam_ac'];
        $at=$temp5['aksam_tok'];
	    
	    if($sa>130 || $oa>130 || $aa>130 || $st>190 || $ot>190 || $at>190){
	        
	        
	          try {
$client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");

$msg  = 'test message';
$gsm  = $temp8['doktor_tel'];




} catch (Exception $exc)
 {
 // Hata olusursa yakala
 echo "Soap Hatasi Olustu: " . $exc->getMessage();
}
	    }
	    
		header ('Location: https://redayhost.com/tefo-batu/HastaOlcum.php');
        echo "Başarılı";
		exit;
	}
}









	
}
	else {
		header ('Location: https://google.com');
		echo "Başarısız";
		exit;
	}


?> 