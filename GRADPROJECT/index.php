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
<!-- Default form login -->
<form class="col-sm-4" action="#!" style="margin-top:10px; margin-left:0px; float:left;">
    <img src="resimler/logo.png" class="img-fluid" alt="Logo resmi" style="width:100%; height:100%;">
    <div class="col-sm-12">
   <button type="button"  class="btn btn-danger btn-lg" style="width:100%; height:100%;"> <a href="DoktorGirisii.php">Doktor Girişi İçin Tıklayınız</a></button>&nbsp;&nbsp;
   <button type="button" class="btn btn-success btn-lg"  style="width:100%; height:100%;"> <a href="HastaGirisi.php">Hasta Girişi İçin Tıklayınız</a></button>
  &nbsp;
   <button type="button"  class="btn  btn-lg"  style="width:100%; height:100%;"> <a href="yonerge.php">Yardım Yönergesine Git</a></button>
   
   </div>
</form>
<!-- Default form login -->
</body>
</html>

<?php $db = null; ?>