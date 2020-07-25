<?php 
require_once 'baglanti.php'; 
$temptc=$_GET['tc'];
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="revisit-after" content="7 Days">
<title><?php echo $SiteTitle; ?></title>
<link type="image/png" rel="icon" href="resimler/logo.png">
<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Frameworks/JQuery/jquery-3.3.1.min.js" language="javascript"></script>
<link type="text/css" rel="stylesheet" href="ayarlar/stil.css">
<script type="text/javascript" src="ayarlar/fonksiyonlar.js" language="javascript"></script>
<script type="text/javascript">

        function formkontrol(){

            
           var sifre= document.forms['form1']['yeni_sifre'].value;
          var tsifre= document.forms['form1']['yeni_sifre2'].value;

            

           if (sifre == tsifre ){
                    return true;
                }
                else () {return false;}
                } </script>



	<style type="text/css">
	html { 
	  background: url(resimler/resimm.jpeg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
        }
		</style>
		
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div>
				    <?php if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . ' Şifrenizi Tekrar Girmek İçin Tamam a tıkalayın ...");</script>';
} ?></div>


<form name="form1" class="col-sm-4" action="sifreunutara2.php" method="POST" onsubmit="(return formkontrol())" style="margin-top:250px; margin-left:15px; float:left;">

    <p class="h4 mb-4">ŞİFRE YENİLEME</p>
    <input type="text"  name="tel_kod"  class="form-control mb-4" placeholder="Telefonunuza Gelen Kodu Giriniz"><br>
     <input type="text"  name="hasta_tc"  class="form-control mb-4" readonly value="<?php echo $temptc; ?>"><br>
    <input type="password"  name="yeni_sifre"  class="form-control mb-4" placeholder="Yeni Şifrenizi Giriniz"><br>
     <input type="password"   name="yeni_sifre2"  class="form-control mb-4" placeholder="Yeni Şifrenizi Giriniz"><br>
  <button type="submit" class="btn btn-success btn-lg"  style="width:100%; height:100%;"> Şifremi Yenile </button>
        
           
       
      
</form>

</body>
</html>

<?php $db = null; ?>