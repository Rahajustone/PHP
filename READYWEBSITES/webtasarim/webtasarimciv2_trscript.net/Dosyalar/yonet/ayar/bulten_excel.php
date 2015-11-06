<?php
ob_start();
session_start();
error_reporting(0);
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
define('ELKATEK_ELEKTRONIK_Panel-Content',false);
include_once("../../library/Elkatek_Connection.php");
include_once("../library/functions.php");
$islem    = new Eretna_Araclar();


$yaz=@mysql_fetch_assoc($sorgu);


header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=bulten_".date("d-m-Y").".xls" );
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

<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Tarih</th>
      <th>E-Posta</th>
      <th>IP Adresi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$i=1;
	$sorgu = @mysql_query("SELECT * FROM bulten");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $islem->tr_tarih($yaz['tarih']); ?></td>
      <td><?php echo $yaz['posta']; ?></td>
      <td><?php echo $yaz['ip']; ?></td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
</body>
</html>