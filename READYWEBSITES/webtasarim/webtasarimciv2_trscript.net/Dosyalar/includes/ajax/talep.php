<?php
session_start();
error_reporting(0);
include('../../library/Elkatek_Connection.php');
include('../../library/guvenlik.php');
include('../../library/functions.php');

$fonks = new yeniyol();
$sec = new Yeniyol_Guvenlik();
$fonks -> home_lang('../../library/lang/');

if(isset($_POST['isim']))

	$sorgu=mysql_query("SELECT iletisim_mail FROM ayarlar");
	$yaz=mysql_fetch_assoc($sorgu);

	$isim=$sec->metin($_POST['isim']);
	$telefon=$sec->metin($_POST['telefon']);
	$posta=$sec->metin($_POST['posta']);
	$firma=$sec->metin($_POST['firma']);
	$vdairesi=$sec->metin($_POST['vdairesi']);
	$vnumarasi=$sec->metin($_POST['vnumarasi']);
	$fax=$sec->metin($_POST['fax']);
	$gsm=$sec->metin($_POST['gsm']);
	$ktalep=$sec->metin($_POST['ktalep']);
	$adres=$sec->metin($_POST['adres']);
	$mesaj=$sec->metin($_POST['mesaj']);
	$tarih=date("d-m-Y H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$ileti='<hr /><strong>İsim : </strong>'.$isim.'<br>';
	$ileti.='<strong>Telefon : </strong>'.$telefon.'<br>';
	$ileti.='<strong>E-Posta : </strong>'.$posta.'<br>';
	$ileti.='<strong>Firma : </strong>'.$firma.'<br>';
	$ileti.='<strong>Vergi Dairesi : </strong>'.$vdairesi.'<br>';
	$ileti.='<strong>Vergi Numarası : </strong>'.$vnumarasi.'<br>';
	$ileti.='<strong>Faks : </strong>'.$fax.'<br>';
	$ileti.='<strong>Gsm: </strong>'.$gsm.'<br>';
	$ileti.='<strong>Talep : </strong>'.$ktalep.'<br>';
	$ileti.='<strong>Adres : </strong>'.$adres.'<br>';
	$ileti.='<strong>Mesaj : </strong>'.$mesaj.'<br>';
	$ileti.='<strong>Tarih : </strong>'.$tarih.'<br>';
	$ileti.='<strong>IP Adres : </strong>'.$ip.'<br><hr />';
	
	$fonks->mail_gonder($ileti,$yaz['iletisim_mail'],'Web Form [ Katalog Talebi ]');
	
	echo '<script type="text/javascript">$("#submits").hide();</script>';
	echo KATALOG_TALEP;
	
	

$baglan->kapat();
?>