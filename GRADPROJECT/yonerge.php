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
		


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


.SorununBaslikAlani{
	width: 100%;
	height: 30px;
	padding-top: 10px;
	font-size: 14px;
	color: #000000;
	line-height: 1.5;
	font-style: normal;
	font-variant: normal;
	font-weight: bold;
	text-decoration: none;
	border-bottom: 1px dashed #CCCCCC;
	cursor: pointer;
}

.SorununBaslikAlani:hover{
	background: #F1F1F1;
	cursor: pointer;
}

.SorununCevapAlani{
	width: 100%;
	margin-top: 10px;
	font-size: 14px;
	line-height: 1.5;
}
</style>
 <script>
    
    
    
    
    $(document).ready(function(){
	
	$.SoruIcerigiGoster			=	function(ElemanIDsi){
		var SoruIDsi			=	ElemanIDsi;
		var IslenecekAlan		=	"#" + ElemanIDsi;
	
		$(IslenecekAlan).parent().find(".SorununCevapAlani").slideToggle();
	}
	
	
});
</script>
</head>
<body>
<div class="container">
  <div class="row">
<form action="index.php?SK=15" method="post" class="col-md-10 col-sm-8">
	<table  align="center" border="0" cellpadding="0" cellspacing="0" class="col-md-10 col-sm-8">
		<tr height="100" bgcolor="#FF9900">
			<td align="center"><h2 style="color: white;">&nbsp;SIK SORULAN SORULAR</h2></td>
		</tr>
		<tr height="50">
			<td align="left" style="border-bottom: 1px dashed #CCCCCC;">&nbsp;<h4>Aklınıza takılabileceğini düşündüğümüz soruların cevaplarını bu sayfada cevapladık. Fakat farklı bir sorunuz varsa lütfen bizlere iletiniz.</h4></td>
		</tr>
		<tr>
			<td><?php
			$SoruSorgusu		=	$db->prepare("SELECT * FROM sorular");
			$SoruSorgusu->execute();
			$SoruSayisi			=	$SoruSorgusu->rowCount();
			$SoruKayitlari		=	$SoruSorgusu->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($SoruKayitlari as $Kayitlar){
			?>
				<div>
					<div id="<?php echo $Kayitlar["soru_id"]; ?>" class="SorununBaslikAlani" onClick="$.SoruIcerigiGoster(<?php echo $Kayitlar["soru_id"]; ?>)"><?php echo $Kayitlar["soru_baslik"]; ?></div>
					<div class="SorununCevapAlani" style="display: none; color: green;"><strong><?php echo $Kayitlar["soru_cevap"]; ?></strong></div>
				</div>
			<?php
			}
			?>
			</td>
		</tr>
	</table>
</form>
</div></div>
</body>
</html>
