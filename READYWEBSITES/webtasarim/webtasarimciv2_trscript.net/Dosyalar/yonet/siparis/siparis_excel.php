<?php
ob_start();
session_start();
error_reporting(0);
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
define('ELKATEK_ELEKTRONIK_Panel-Content',false);
include_once("../../library/Elkatek_Connection.php");
include_once("../library/functions.php");
$islem    = new Eretna_Araclar();

$id=intval($_GET['id']);
########################################## SİPARİŞ BİLGİLERİ ##############################################
$sorgu = @mysql_query("SELECT * FROM siparis WHERE id=".$id." LIMIT 1");
$yaz=@mysql_fetch_assoc($sorgu);


header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=siparis_".$id.".xls" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sipariş Bilgilerini Yazdır</title>
<link href="../css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="../css/print.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

<table width="650" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center"><h2>Sipariş / Teslimat Bilgileri</h2></td>
  </tr>
  <tr>
    <td><table border="1">
      <tr>
        <td width="200"><strong>Sipariş No</strong></td>
        <td width="5"><strong>:</strong></td>
        <td align="left"><?php echo $yaz['id']; ?></td>
      </tr>
      <tr>
        <td><strong>Sipariş Tarihi</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $islem->tr_tarih($yaz['tarih']); ?> <?php echo $yaz['saat']; ?></td>
      </tr>
      <tr>
        <td><strong>Sipariş Verilen IP</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['ip']; ?></td>
      </tr>
      <tr>
        <td><strong>Firma </strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['firma']; ?></td>
      </tr>
      <tr>
        <td><strong>İsim</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['isim']; ?></td>
      </tr>
      <tr>
        <td><strong>Telefon</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['telefon']; ?></td>
      </tr>
      <tr>
        <td><strong>Gsm</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['gsm']; ?></td>
      </tr>
      <tr>
        <td><strong>Fax</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['fax']; ?></td>
      </tr>
      <tr>
        <td><strong>E-Posta</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['eposta']; ?></td>
      </tr>
      <tr>
        <td><strong>Adres</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['adres']; ?></td>
      </tr>
      <tr>
        <td><strong>Sipariş Mesajı</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $yaz['mesaj']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><h2> Ürünler</h2></td>
  </tr>
     <tr>      
      <td width="650"><table border="1">
        <tr>
          <td width="100"><strong>Türü</strong></td>
          <td><strong>Ürün Adı</strong></td>
          <td><strong>Adeti</strong></td>
        </tr>
        <?php 
			$siparis_sorgu=mysql_query("SELECT * FROM siparis_urun WHERE siparis_no=".$id." ORDER BY kat ASC"); 
			while($siparis=mysql_fetch_assoc($siparis_sorgu))
			{
		?>
        <tr>
          <td><?php if($siparis['kat']==1) echo '<span class="aktif">Ürün</span>'; else echo '<span class="onayli">Komponent</span>'; ?></td>
          <td><?php $islem->siparis_urun($siparis['kat'],$siparis['urun']); ?></td>
          <td><?php echo $siparis['adet']; ?> Adet</td>
        </tr>
        <?php } ?>
      </table></td>
      </tr>

</table>
</body>
</html>