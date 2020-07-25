<?php

//remove_chat.php

include('baglanti.php');

if(isset($_POST["sohbet_mesajid"]))
{
	$query = "
	UPDATE sohbet_mesaj 
	SET durum = '2' 
	WHERE sohbet_mesaj_id = '".$_POST["sohbet_mesajid"]."'
	";

	$statement = $db->prepare($query);

	$statement->execute();
}

?>