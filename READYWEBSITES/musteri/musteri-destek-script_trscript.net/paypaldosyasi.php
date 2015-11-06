<?php
require_once("fonk.php");
if ($_POST)
   {
      $a = $_POST["mc_gross"];
      $b = $_POST["mc_fee"];
      $c = ceil($a - $b);
      $d = $_POST["item_number"];
	  if(!is_numeric($d)){return;};
	  	$sorgu = $db->prepare("SELECT id,kredi FROM uyeler WHERE id= ?");
         $sorgu->execute(array($d));
				$uye = $sorgu->fetch();	
$kredi=$uye['kredi']+$c;
$guncelle = $db->prepare("UPDATE uyeler SET kredi=? WHERE id = ?");
$guncelle->execute(array($kredi,$uye['id']));
   };
?>