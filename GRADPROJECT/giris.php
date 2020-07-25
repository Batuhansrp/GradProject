<?php
require_once ("ayarlar/baglanti.php"); 
session_start();

$kullaniciadi= $_POST['doktortcno'];
$sifre= $_POST['doktorsifre'];

if (!$kadi || !$kadi) {
    die("boş alan bırakmayınız!");
}

$doktor = $db->prepare("SELECT * FROM DOKTOR WHERE doktor_tc = '$kadi' AND doktor_sifre = '$sifre'")->fetch();

if ($user) {
    $_SESSION['user'] = $user;
    header("location:doktorhesapislem.php");
}else {
    echo "Bilgiler hatalı";
}

?>
<?php $db = null; ?>