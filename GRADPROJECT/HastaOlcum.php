<?php 

session_start();
ob_start();
require_once 'baglanti.php';

if(isset($_GET['Message'])){
    echo $_GET['Message'];

}
$user= $_SESSION['hasta_kullaniciadi'];
 $goruntule= $db->prepare("SELECT *
 FROM HASTA where hasta_tc =  $user "); 
  $goruntule->execute();
  
  $vericekme=$goruntule->fetch(PDO ::FETCH_ASSOC);

$resim=$db->prepare("SELECT * FROM
 resim_hasta where hasta_tc =  $user "); 
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


   
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>






<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>









       <title><?php echo $SiteTitle; ?></title>
<link type="image/png" rel="icon" href="resimler/logo.png">
<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
  </head>
  <body>


    <div class="view-account">
        <section class="module ">
            <div class="module-inner">
           <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" src="resimler/<?php echo $resimcekme['resim_ad']?>" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">
                            
                            <label class="label label-info"> <?php 
                            echo $vericekme['hasta_ad'].' '.$vericekme['hasta_soyad']; ?> 
                            
                            </label>
                        </ul>
                    </div>
                <nav class="side-menu">
                <ul class="nav">
                    <li ><a class="active" href="HastaOlcum.php"><span class="fa fa-save"></span>Ölçüm Ekle</a></li>
                  <li ><a href="hmesaj.php"><span class="fa fa-envelope"></span>Doktorla sohbet</a></li>
                  <li><a href="hastarandevuform.php"><span class="fa fa-list"></span> Randevu Al</a></li>
                 <li><a href="Hasta_Ayar.php"><span class="fa fa-cog"></span> Hesap Ayar</a></li>
                  <li><a href="hcikis.php"><span class="fa fa-clock-o"></span>Çıkış Yap</a></li>
                </ul>
              </nav>
                </div>
                <div class="content-panel">
                    






<div>
				    <?php if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . ' Ana sayfaya dönmek için tamam a tıklayınız...");</script>';
} ?></div>








                    <div class="container">
    <div class="row clearfix">
       
   <div class="col-md-8 table-responsive">
			<table class="table table-bordered table-hover table-sortable" id="tab_logic">
				<thead>
					<tr >
					    <th class="text-center">
						Ölçüm Değeri
						</th>
						<th class="text-center">
						Ölçüm Zamanını Seçiniz
						</th>
						
        				<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
						</th>
					</tr>
				</thead>
				<form action="olcumekleme.php" method="POST">
				<tbody>
    				<tr id='addr0' data-id="0" class="hidden">
    				    <td data-name="name">
						    <input type="text" name='deger'  placeholder='Ölçüm Sonucunu Giriniz'  class="form-control" required/>
						</td>
						
    					<td data-name="sel" >
						    <select class="col-md-10" name="olcum_zaman">
        				        
    					        <option value="sabah_ac">Sabah Aç Ölçüm</option>
        				        <option value="sabah_tok">Sabah Tok Ölçüm</option>
        				        <option value="oglen_ac">Öğlen Aç Ölçüm</option>
        				        <option value="oglen_tok">Öğlen Tok Ölçüm</option>
        				         <option value="aksam_ac">Akşam Aç Ölçüm</option>
        				        <option value="aksam_tok">Akşam Tok Ölçüm</option>
        				    </select>
						</td>
								</td>
    					
                        <td data-name="del">
                            <button type="submit" name="olcumekle"class="btn btn-success">Ölçümü Kaydet</button>
                        </td>
					</tr>
				</tbody>
			</table>
			
		</div>
   
</div>
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
            <a href="HastaOlcum.php">Ana Sayfa</a>
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
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>

