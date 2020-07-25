<?php 
session_start();
ob_start();
require_once 'baglanti.php';

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
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?php echo $SiteTitle; ?></title>
<link type="image/png" rel="icon" href="resimler/logo.png">
<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="asd.css">
    
    
  
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 


<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />


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
                    


            

                    <div class="container">
   
			
				<div>
				    <?php if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . ' Ana sayfaya dönmek için tamam a tıklayınız...");</script>';
} ?></div>
			


<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post" action="randevuinter.php">
     <div class="form-group ">
      <label class="control-label " for="date">
      
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
       <input class="form-control" id="date" name="randevu_tarih" placeholder="DD/MM/YYYY" type="text" required/>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label " for="select">
       Lütfen Saat Seçiniz
      </label>
      <select class="select form-control" id="select" name="randevu_saat">
       <option value="9.00-9.30">
        9.00-9.30
       </option>
       <option value="9.30-10.00">
       9.30-10.00
       </option>
       <option value=" 10.00-10.30">
       10.00-10.30
       </option>
        <option value="10.30-11.00">
       10.30-11.00
       </option>
        <option value="11.00-11.30">
       11.00-11.30
       </option>
        <option value=" 11.30-12.00">
       11.30-12.00
       </option>
        <option value="13.00-13.30">
       13.00-13.30
       </option>
        <option value="13.30-14.00">
       13.30-14.00
       </option>
         <option value="14.00-14.30">
       14.00-14.30
       </option>
         <option value=" 14.30-15.00">
       14.30-15.00
       </option>
         <option value="15.00-15.30">
       15.00-15.30
       </option>
         <option value="15.30-16.00">
       15.30-16.00
       </option>
        <option value="16.00-16.30">
       16.00-16.30
       </option>
        <option value="16.30-17.00">
       16.30-17.00
       </option>
      </select>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="rformbtn" type="submit">
       Randevu Al
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>

    $(document).ready(function(){
        	var tarih=new Date();
        var date_input=$('input[name="randevu_tarih"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
           startDate: tarih,
        daysOfWeekDisabled: [0,6],
        })
       

                   
    })
</script>
   

  

	
	</div>

             
               
        </section>
    </div></div>
  
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
            <a href="">Yardım Yönergesine Git</a>
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

