<?php

//fetch_user.php
session_start();
ob_start();
include('hbaglanti.php');
$temp4=$_SESSION['hasta_kullaniciadi'];


$query = "SELECT *
 FROM DOKTOR INNER JOIN HASTA ON DOKTOR.doktor_tc=HASTA.doktor_id where hasta_tc=$temp4";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Doktorum</td>
		
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
		<td>'.$row['doktor_ad'].' </td>
		
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-alantc="'.$row['doktor_tc'].'" data-alanad="'.$row['doktor_ad'].'">Sohbete Başla</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>