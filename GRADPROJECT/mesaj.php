<!--
//index.php
!-->

<?php


include('baglanti.php');

session_start();
ob_start();


?>
<!doctype html

<html lang="tr-TR">
<html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $SiteTitle; ?></title>

<meta name="description" content="<?php echo $SiteDescription; ?>">
<meta name="keywords" content="<?php echo $SiteKeywords; ?>">
<link type="image/png" rel="icon" href="resimler/logo.png">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center"></h3><br />
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Sohbet Edebileceğiniz Hastalar</h4>
				</div>
				<div class="col-md-2"> </div>
				<div class="col-md-2 col-sm-3">
					<p align="right"> <a href="doktorhastaliste.php">Ana Sayfama Dön</a></p>
				</div>
			</div>
			<div class="table-responsive">
				
				<div id="kullanici_bilgi"></div>
				<div id="kullanici_model_detaylari"></div>
			</div>
			<br />
			<br />
			
		</div>
		
    </body>  
</html>

<style>

.sohbet_mesajarea
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}


</style>  




<script>  
$(document).ready(function(){

	kullanici_getir();

	setInterval(function(){
		update_last_activity();
		kullanici_getir();
		update_mesaj_gecmisdata();
		fetch_group_mesaj_gecmisclass();
	}, 1000);

	function kullanici_getir()
	{
		$.ajax({
			url:"kullanici_getir.php",
			method:"POST",
			success:function(data){
				$('#kullanici_bilgi').html(data);
			}
		})
	}

	function sohbet_kutusu_olustur(alan_id, alan_ad)
	{
		var modal_content = '<div id="kullanici_dialog'+alan_id+'" class="kullanici_dialog" title="Mesaj yolladığın kişi: '+alan_ad+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="mesaj_gecmisclass" data-alantc="'+alan_id+'" id="mesaj_gecmis'+alan_id+'">';
		modal_content += mesaj_gecmis_getir(alan_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="sohbet_mesaj'+alan_id+'" id="sohbet_mesaj'+alan_id+'" class="form-control sohbet_mesaj"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="mesaj_gonder" id="'+alan_id+'" class="btn btn-info mesaj_gonder">Mesajı Gönder</button></div></div>';
		$('#kullanici_model_detaylari').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var alan_id = $(this).data('alantc');
		var alan_ad = $(this).data('alanad');
		sohbet_kutusu_olustur(alan_id, alan_ad);
		$("#kullanici_dialog"+alan_id).dialog({
			autoOpen:false,
			width:400
		});
		$('#kullanici_dialog'+alan_id).dialog('open');
		
	});

	$(document).on('click', '.mesaj_gonder', function(){
		var alan_id = $(this).attr('id');
		var sohbet_mesaj = $.trim($('#sohbet_mesaj'+alan_id).val());
		if(sohbet_mesaj != '')
		{
			$.ajax({
				url:"mesaj_ekle.php",
				method:"POST",
				data:{alan_id:alan_id, sohbet_mesaj:sohbet_mesaj},
				success:function(data)
				{
					//$('#sohbet_mesaj'+alan_id).val('');
					
					$('#mesaj_gecmis'+alan_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function mesaj_gecmis_getir(alan_id)
	{
		$.ajax({
			url:"mesaj_gecmis_getir.php",
			method:"POST",
			data:{alan_id:alan_id},
			success:function(data){
				$('#mesaj_gecmis'+alan_id).html(data);
				 update_mesaj_gecmisdata();
			}
		})
	}

	function update_mesaj_gecmisdata()
	{
		$('.mesaj_gecmisclass').each(function(){
			var alan_id = $(this).data('alantc');
			mesaj_gecmis_getir(alan_id);
		});
	}

	
	$(document).on('click', '.mesaj_sil', function(){
		var sohbet_mesajid = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"mesaj_sil.php",
				method:"POST",
				data:{sohbet_mesajid:sohbet_mesajid},
				success:function(data)
				{
					update_mesaj_gecmisdata();
				}
			})
		}
	});
	
});  
</script>