<?php

//fetch_user.php
session_start();
ob_start();
include('baglanti.php');
$temp4=$_SESSION['doktor_kullaniciadi'];


$query = "
SELECT * FROM HASTA 
WHERE doktor_id= $temp4";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Hastalarım</td>
		
		<th width="10%">Eylem</td>
	</tr>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

	
	$output .= '
	<tr>
		<td>'.$row['hasta_ad'].' </td>
		
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-alantc="'.$row['hasta_tc'].'" data-alanad="'.$row['hasta_ad'].'">Sohbete Başla</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>