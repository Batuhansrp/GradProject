<?php 
require_once 'baglanti.php'; 
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
    print '<script type="text/javascript">alert("' . $_GET['Message'] . ' Ana sayfaya dönmek için tamam a tıklayınız...");</script>';
} ?></div>
    
<!-- Default form login -->
<form class="col-sm-4" action="Hastaara.php" method="POST" style="margin-top:250px; margin-left:15px; float:left;">

    <p class="h4 mb-4">HASTA GİRİŞİ</p>

    <!-- Email -->
    <input type="text" name="hastatcno" id="defaultLoginFormEmail" class="form-control mb-4" <?php if (isset($_COOKIE['hadi'])) {?>
        value="<?php echo $_COOKIE['hadi'] ?>"
      <?php } else {?>
        placeholder="Kullanıcı adınızı girin...">
      <?php } ?>  <br>
    
    

    <!-- Password -->
    <input type="password" name="hastasifre" id="defaultLoginFormPassword" class="form-control mb-4" <?php if (isset($_COOKIE['hsifre'])) {?>
        value="<?php echo $_COOKIE['hsifre'] ?>"
      <?php } else {?>
        placeholder="Şifrenizi girin...">
      <?php } ?><br>

&nbsp; &nbsp;
  <button type="submit" class="btn btn-success btn-lg"  style="width:100%; height:100%;">Giriş Yap</button>
        
            <!-- Remember me -->
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="beni_hatirla" <?php echo isset($_COOKIE['hadi']) ? "checked" : "" ?> class="custom-control-input" >
          <label class="custom-control-label" for="defaultUnchecked">BENİ HATIRLA</label> &nbsp; &nbsp; <span class="alert" role="alert"><strong><a href="sifreunut.php" style="color:red">Şifremi Unuttum</a></strong></span> 
        <br>
        </div>
      
</form>
<!-- Default form login -->
</body>
</html>

<?php $db = null; ?>