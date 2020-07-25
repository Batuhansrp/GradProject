<?php 


try {
	
	$db=new PDO("mysql:host=localhost;dbname=;charset=utf8");

//	echo "Veri tabanı bağlantısı başarılı";

} catch (PDOException $e) {
	
	echo $e-> getMessage();


}


$Site_Bilgileri = $db -> prepare("SELECT * FROM AYARLAR");
$Site_Bilgileri->execute();

$AyarSayisi			=	$Site_Bilgileri->rowCount();
$Ayarlar			=	$Site_Bilgileri->fetch(PDO::FETCH_ASSOC);

if($AyarSayisi>0){
	$SiteAdi				=	$Ayarlar["site_ad"];
	$SiteTitle				=	$Ayarlar["site_baslik"];
	$SiteDescription		=	$Ayarlar["site_aciklama"];
	$SiteKeywords			=	$Ayarlar["site_anahtar"];
	$SiteCopyrightMetni		=	$Ayarlar["site_copyright"];
	$SiteLogosu				=	$Ayarlar["site_logo"];
	$SiteEmailAdresi		=	$Ayarlar["site_email"];
	$SiteEmailSifresi		=	$Ayarlar["site_emailpass"];
					
}else{
	
	die();
}




function mesaj_gecmis_getir($gonderen_id, $alan_id, $db)
{
	$query = "
	SELECT * FROM sohbet_mesaj 
	WHERE (gonderen_id = '".$gonderen_id."' 
	AND alan_id = '".$alan_id."') 
	OR (gonderen_id = '".$alan_id."' 
	AND alan_id = '".$gonderen_id."') 
	ORDER BY timestamp DESC
	";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$kullanici_ad = '';
		$dynamic_background = '';
		$sohbet_mesaj = '';
		if($row["gonderen_id"] == $gonderen_id)
		{
			if($row["durum"] == '2')
			{
				$sohbet_mesaj = '<em>This message has been removed</em>';
				$kullanici_ad = '<b class="text-success">Sen</b>';
			}
			else
			{
				$sohbet_mesaj = $row['sohbet_mesaj'];
				$kullanici_ad = '<button type="button" class="btn btn-danger btn-xs mesaj_sil" id="'.$row['sohbet_mesaj_id'].'">x</button>&nbsp;<b class="text-success">Sen</b>';
			}
			

			$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["durum"] == '2')
			{
				$sohbet_mesaj = '<em>This message has been removed</em>';
			}
			else
			{
				$sohbet_mesaj = $row["sohbet_mesaj"];
			}
			$kullanici_ad = '<b class="text-danger">'.get_kullanici_ad($row['gonderen_id'], $db).'</b>';
			$dynamic_background = 'background-color:#ffffe6;';
		}
		$output .= '
		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
			<p>'.$kullanici_ad.' - '.$sohbet_mesaj.'
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	$query = "
	UPDATE sohbet_mesaj 
	SET durum = '0' 
	WHERE gonderen_id = '".$alan_id."' 
	AND alan_id = '".$gonderen_id."' 
	AND durum = '1'
	";
	$statement = $db->prepare($query);
	$statement->execute();
	return $output;
}

function get_kullanici_ad($kullanici_id, $db)
{
	$query = "SELECT doktor_ad FROM DOKTOR WHERE doktor_tc = '$kullanici_id'";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['doktor_ad'];
	}
}





?>

