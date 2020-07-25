<?php 
session_start();
ob_start();
require_once 'baglanti.php';
$temp1= $_SESSION['doktor_kullaniciadi'];
  $goruntule1= $db->prepare("SELECT *
 FROM DOKTOR where doktor_tc=$temp1"); 
  $goruntule1->execute();
  
 $vericekme1=$goruntule1->fetch(PDO ::FETCH_ASSOC);



$resim=$db->prepare("SELECT * FROM
 resim_doktor where doktor_tc =  $temp1 "); 
 $resim->execute();
 $resimcekme=$resim->fetch(PDO ::FETCH_ASSOC);
 
?>
<!doctype html>
<html lang="tr-TR">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="asd.css">
        <title><?php echo $SiteTitle; ?></title>
<link type="image/png" rel="icon" href="resimler/logo.png">
<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery.maskedinput.js"></script>
<script>
    
    
    $( document ).ready(function() {
    $('#doktor_tel').mask("9(9999)999 9999");
});
    
    
</script>
  
  
  
  
  
  
  </head>
  <body>

<div>
				    <?php if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . ' Ana sayfaya dönmek için tamam a tıklayınız...");</script>';
} ?></div>

    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                       <img class="img-profile img-circle img-responsive center-block" src="resimler/<?php echo $resimcekme['resim_ad']?>" alt="">
                         <ul class="meta list list-unstyled">
                            <li class="name">
                            
                            <label class="label label-info"> <?php 
                            echo $vericekme1['doktor_ad'].' '.$vericekme1['doktor_soyad']; ?> 
                            
                            </label>
                        </ul>
                    </div>
                <nav class="side-menu">
               <ul class="nav">
                    <li ><a class="active" href="doktorhastaliste.php"><span class="fa fa-user"></span>Hastalarım</a></li>
                  <li ><a href="doktorhastakayit.php"><span class="fa fa-save"></span>Hasta Kayıt</a></li>
                  <li><a href="randevulistedoktor.php"><span class="fa fa-list"></span> Randevularımı Gör</a></li>
                 <li><a href="mesaj.php"><span class="fa fa-envelope"></span> Sohbet</a></li>
                   <li ><a href="doktorhesapislem.php"><span class="fa fa-cog"></span> Hesap İşlemleri</a></li>
                  <li><a href="dcikis.php"><span class="fa fa-clock-o"></span>Çıkış Yap</a></li>
                </ul>
              </nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">HESABIM<span class="pro-label label label-warning">Değişiklik Sayfası</span></h2>
                     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Hesap İşlemleri</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="resimler/unknown.png"  alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left" name="yukle_resim">
                                     <input class="btn btn-primary" type="submit"  name="resimyukle" value="Resmimi Değiştir">
                                </div>
                           </div>
                           
                        </fieldset> </form>
                        
                        
                        
                        <?php



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
    
     $Message = urlencode("Bir Dosya Seç  ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
    exit();
}
//boyut kontrol

if($boyut> (1024*1024*3)){
    
    $Message = urlencode("Resmin Boyutu Büyük ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
	
    
    exit();
}


//tip kontrol

if($tip != 'image/jpeg' &&  $tip != 'image/png' && $uzanti != '.jpg ' )
{
    
     $Message = urlencode("Resminiz Değiştirilemedi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
	
    exit();
}


move_uploaded_file($tmp_name,"$yukleklasor/$resimad");

    
    $resimsor = $db->prepare("update  resim_doktor set resim_ad=:ad where doktor_tc=$temp1" );
$resimyukle = $resimsor->execute(array('ad'=> $resimad));
    


}






?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                            <form class="form-horizontal" action="dtelara.php" method="POST">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Telefon Numarası Güncelleme</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Telefon</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="doktor_tel" id="doktor_tel" required placeholder="Numaranızı Giriniz">
                                   
                                </div>
                            </div>
                           <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button type="submit" class="btn btn-primary" type="submit" name="dtelbtn">Telefon Numarası Güncelle</button>
                            </div>
                        </div>
                            </fieldset> </form>
                         
                            
                            
                       <form class="form-horizontal" action="dsifreara.php" method="POST">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Şifre İşlemleri</h3>
                
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Şifreniz</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" name="doktor_sifre" required  placeholder="********">
                                    
                                </div>
                           &nbsp;&nbsp;
                        
                       
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <button type="submit" class="btn btn-primary" type="submit" name="dsifrebtn">Şifremi Değiştir</button>
                            </div>
                        </div></fieldset>
                    </form>
                </div>
            </div>
        </section>
    </div>

<footer class="page-footer font-small  pt-4">

  
  <div class="container-fluid text-center text-md-left">

    
    <div class="row">

      
      <div class="col-md-6 mt-md-0 mt-3">

        <h5 class="text-uppercase">HAKKIMIZDA</h5>
        <p>E-Diyabetik Projesi Doktor Hasta Takip Sistemidir.</p>

      </div>
     

      <hr class="clearfix w-100 d-md-none pb-3">

      
      <div class="col-md-3 mb-md-0 mb-3">

   
        <h5 class="text-uppercase">Menü</h5>

        <ul class="list-unstyled">
          <li>
            <a href="doktorhastaliste.php">Ana Sayfa</a>
          </li>
          <li>
            <a href="dcikis.php">Çıkış Yap</a>
          </li>
        
        </ul>

      </div>
      

   
      <div class="col-md-3 mb-md-0 mb-3">

        
        <h5 class="text-uppercase">Yardım</h5>

        <ul class="list-unstyled">
          <li>
            <a href="yonerge.php">Yardım Yönergesine Git</a>
          </li>
       
        </ul>

      </div>
      

    </div>
 

  </div>
  

  
  <div class="footer-copyright text-center py-3">Copyright-2020 E-Diyabetik'in tüm hakları saklıdır.
  </div>
  

</footer>

</body>
</html>

<?php $db = null; ?>

