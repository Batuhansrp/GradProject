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

<!doctype html

<html lang="tr-TR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="asd.css">
    <title><?php echo $SiteTitle; ?></title>
<link type="image/png" rel="icon" href="resimler/logo.png">
<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
  </head>
  <body>
      


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
                  <table class="table">
  <thead class="thead-dark">
    <tr>
   
      <th scope="col">Hasta Adı</th>
      <th scope="col">Hasta Soyadı</th>
      <th scope="col">Randevu Tarihi</th>
      <th scope="col">Randevu Saati</th>
      <th scope="col">İptal Et</th>
    </tr>
  </thead>
  <tbody>
      
      <?php 
  $temp= $_SESSION['doktor_kullaniciadi'];
  $goruntule= $db->prepare("SELECT * 
 FROM randevu INNER JOIN HASTA ON HASTA.hasta_tc=randevu.hasta_tc where doktor_tc=$temp ORDER BY randevu_tarih"); 
 
  $goruntule->execute();
  
  while ($vericekme=$goruntule->fetch(PDO ::FETCH_ASSOC) ){ ?>
  
    <tr>
     
      <td><?php echo $vericekme['hasta_ad'] ?></td>
      <td><?php echo $vericekme['hasta_soyad'] ?></td>
      <td><?php echo $vericekme['randevu_tarih'] ?></td>
      <td><?php echo $vericekme['randevu_saat'] ?></td> 
      <td><a href="randevusil.php?rid=<?php echo $vericekme['rid'] ?>&rsil=ok"><button>Randevuyu İptal Et</button></td>
    </tr>
   <?php
      }
      ?>
  </tbody>
</table>  
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

