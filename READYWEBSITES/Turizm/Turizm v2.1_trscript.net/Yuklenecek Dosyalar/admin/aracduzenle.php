<?
include('inc/ayar.php');
include('inc/kontrol.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link rel="stylesheet" type="text/css" href="css/terminal.css" />
<script type="text/javascript" src="js/jquery-1.4.2.js"></script> 
<title>Otel Yönetim Paneli</title>
</head>

<body>
	<div id="genel">
<?
include('inc/ust.php');
include('inc/altmenu.php');
?>

        <div class="temizle sol" style="margin-top:25px">
        	<div id="solmenu" class="sol">
<?
include('inc/sol.php');
?>
            </div>
        	<div id="ortaalan" class="sol">
                <div class="sol temizle">
                    <div class="sol solbaslik fontkalin">ARAÇ DÜZENLE</div>
                    <div class="sol alt">
<? if($_GET[duzenle]==duzenle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$guncelle = mysql_query("UPDATE araclar SET arac_kategori_id='$arac_kategori_id',arac_adi_tr='$arac_adi_tr',arac_adi_en='$arac_adi_en',arac_adi_de='$arac_adi_de',arac_title_tr='$arac_title_tr',arac_title_en='$arac_title_en',arac_anahtar_tr='$arac_anahtar_tr',arac_anahtar_en='$arac_anahtar_en',arac_anahtar_de='$arac_anahtar_de',arac_desc_tr='$arac_desc_tr',arac_desc_en='$arac_desc_en',arac_desc_de='$arac_desc_de',arac_kisi='$arac_kisi',arac_bagaj='$arac_bagaj',arac_vites='$arac_vites',arac_klima='$arac_klima',arac_yakit='$arac_yakit',gun1ay1='$gun1ay1',gun1ay2='$gun1ay2',gun1ay3='$gun1ay3',gun1ay4='$gun1ay4',gun1ay5='$gun1ay5',gun1ay6='$gun1ay6',gun1ay7='$gun1ay7',gun1ay9='$gun1ay9',gun1ay10='$gun1ay10',gun1ay8='$gun1ay8',gun1ay11='$gun1ay11',gun1ay12='$gun1ay12',gun2ay1='$gun2ay1',gun2ay2='$gun2ay2',gun2ay3='$gun2ay3',gun2ay4='$gun2ay4',gun2ay5='$gun2ay5',gun2ay6='$gun2ay6',gun2ay7='$gun2ay7',gun2ay8='$gun2ay8',gun2ay9='$gun2ay9',gun2ay10='$gun2ay10',gun2ay11='$gun2ay11',gun2ay12='$gun2ay12',gun3ay1='$gun3ay1',gun3ay2='$gun3ay2',gun3ay3='$gun3ay3',gun3ay4='$gun3ay4',gun3ay5='$gun3ay5',gun3ay6='$gun3ay6',gun3ay7='$gun3ay7',gun3ay8='$gun3ay8',gun3ay9='$gun3ay9',gun3ay10='$gun3ay10',gun3ay11='$gun3ay11',gun3ay12='$gun3ay12',gun4ay1='$gun4ay1',gun4ay2='$gun4ay2',gun4ay3='$gun4ay3',gun4ay4='$gun4ay4',gun4ay5='$gun4ay5',gun4ay6='$gun4ay6',gun4ay7='$gun4ay7',gun4ay8='$gun4ay8',gun4ay9='$gun4ay9',gun4ay10='$gun4ay10',gun4ay11='$gun4ay11',gun4ay12='$gun4ay12',gun5ay1='$gun5ay1',gun5ay2='$gun5ay2',gun5ay3='$gun5ay3',gun5ay4='$gun5ay4',gun5ay5='$gun5ay5',gun5ay6='$gun5ay6',gun5ay7='$gun5ay7',gun5ay8='$gun5ay8',gun5ay9='$gun5ay9',gun5ay10='$gun5ay10',gun5ay11='$gun5ay11',gun5ay12='$gun5ay12',gun6ay1='$gun6ay1',gun6ay2='$gun6ay2',gun6ay3='$gun6ay3',gun6ay4='$gun6ay4',gun6ay5='$gun6ay5',gun6ay6='$gun6ay6',gun6ay7='$gun6ay7',gun6ay8='$gun6ay8',gun6ay9='$gun6ay9',gun6ay10='$gun6ay10',gun6ay11='$gun6ay11',gun6ay12='$gun6ay12',arac_aciklama_tr='$arac_aciklama_tr',arac_aciklama_en='$arac_aciklama_en',arac_aciklama_de='$arac_aciklama_de',arac_title_de='$arac_title_de',arac_sezon='$arac_sezon' WHERE arac_id='$_GET[arac_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Araç Düzenlendi.</div>';
}
$ayar=mysql_query("select * from araclar where arac_id='$_GET[arac_id]'");
$ayarveri = mysql_fetch_array($ayar);
?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>

<form action="aracduzenle.php?duzenle=duzenle&arac_id=<? echo $_GET[arac_id]; ?>" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Araç Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_adi_tr" value="<? echo $ayarveri[arac_adi_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Özel Title </span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_title_tr" value="<? echo $ayarveri[arac_title_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelimeler (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_anahtar_tr" value="<? echo $ayarveri[arac_anahtar_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Araç Açıklaması (Description)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_desc_tr" value="<? echo $ayarveri[arac_desc_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Vitrin Açıklaması </span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_aciklama_tr" value="<? echo $ayarveri[arac_aciklama_tr]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Araç Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_adi_en" value="<? echo $ayarveri[arac_adi_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Özel Title </span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_title_en" value="<? echo $ayarveri[arac_title_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelimeler (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_anahtar_en" value="<? echo $ayarveri[arac_anahtar_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Araç Açıklaması (Description)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_desc_en" value="<? echo $ayarveri[arac_desc_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Vitrin Açıklaması </span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="arac_aciklama_en" value="<? echo $ayarveri[arac_aciklama_en]; ?>"></div>
                </div>

					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block;">Kişi Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="arac_kisi" style="width:200px;height:25px">
							<option><? echo $ayarveri[arac_kisi]; ?></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block;">Bagaj Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="arac_bagaj" style="width:200px;height:25px">
							<option><? echo $ayarveri[arac_bagaj]; ?></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block;">Klima</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<input type="radio" name="arac_klima" value="1" <? if($ayarveri[arac_klima]==1) { echo "checked"; } ?>> Var <input type="radio" name="arac_klima" value="0" <? if($ayarveri[arac_klima]==0) { echo "checked"; } ?>> Yok 
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block;">Vites</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<input type="radio" name="arac_vites" value="1" <? if($ayarveri[arac_vites]==1) { echo "checked"; } ?>> Manuel <input type="radio" name="arac_vites" value="0" <? if($ayarveri[arac_vites]==0) { echo "checked"; } ?>> Otomatik 
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block;">Yakıt</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<input type="radio" name="arac_yakit" value="0"  <? if($ayarveri[arac_yakit]==0) { echo "checked"; } ?>> Dizel <input type="radio" name="arac_yakit" value="1" <? if($ayarveri[arac_yakit]==1) { echo "checked"; } ?>> Benzin  <input type="radio" name="arac_yakit" value="2" <? if($ayarveri[arac_yakit]==2) { echo "checked"; } ?>> LPG 
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block; color:#cc0000">Fiyat Ayarları</span></div>
					<div class="temizle sol gunaraligi" style="background:#fff; color:#cc0000">Gün Aralığı</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Ocak</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Şubat</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Mart</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Nisan</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Mayıs</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Haziran</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Temmuz</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Ağustos</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000">Eylül</div>
					<div class="sol duzenle" style="background:#fff; color:#cc0000">Ekim</div>
					<div class="sol duzenle" style="background:#fff; color:#cc0000">Kasım</div>
					<div class="sol duzenle" style="background:#fff; color:#cc0000">Aralık</div>
<? 
$gun=mysql_query("select * from siteayarlari where site_id='1'");
$gunveri = mysql_fetch_array($gun);
?>
					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun1]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay1" value="<? echo $ayarveri[gun1ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay2" value="<? echo $ayarveri[gun1ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay3" value="<? echo $ayarveri[gun1ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay4" value="<? echo $ayarveri[gun1ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay5" value="<? echo $ayarveri[gun1ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay6" value="<? echo $ayarveri[gun1ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay7" value="<? echo $ayarveri[gun1ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay8" value="<? echo $ayarveri[gun1ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun1ay9" value="<? echo $ayarveri[gun1ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun1ay10" value="<? echo $ayarveri[gun1ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun1ay11" value="<? echo $ayarveri[gun1ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun1ay12" value="<? echo $ayarveri[gun1ay12]; ?>"></div>

					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun2]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay1" value="<? echo $ayarveri[gun2ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay2" value="<? echo $ayarveri[gun2ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay3" value="<? echo $ayarveri[gun2ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay4" value="<? echo $ayarveri[gun2ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay5" value="<? echo $ayarveri[gun2ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay6" value="<? echo $ayarveri[gun2ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay7" value="<? echo $ayarveri[gun2ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay8" value="<? echo $ayarveri[gun2ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun2ay9" value="<? echo $ayarveri[gun2ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun2ay10" value="<? echo $ayarveri[gun2ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun2ay11" value="<? echo $ayarveri[gun2ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun2ay12" value="<? echo $ayarveri[gun2ay12]; ?>"></div>

					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun3]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay1" value="<? echo $ayarveri[gun3ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay2" value="<? echo $ayarveri[gun3ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay3" value="<? echo $ayarveri[gun3ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay4" value="<? echo $ayarveri[gun3ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay5" value="<? echo $ayarveri[gun3ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay6" value="<? echo $ayarveri[gun3ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay7" value="<? echo $ayarveri[gun3ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay8" value="<? echo $ayarveri[gun3ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun3ay9" value="<? echo $ayarveri[gun3ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun3ay10" value="<? echo $ayarveri[gun3ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun3ay11" value="<? echo $ayarveri[gun3ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun3ay12" value="<? echo $ayarveri[gun3ay12]; ?>"></div>

					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun4]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay1" value="<? echo $ayarveri[gun4ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay2" value="<? echo $ayarveri[gun4ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay3" value="<? echo $ayarveri[gun4ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay4" value="<? echo $ayarveri[gun4ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay5" value="<? echo $ayarveri[gun4ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay6" value="<? echo $ayarveri[gun4ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay7" value="<? echo $ayarveri[gun4ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay8" value="<? echo $ayarveri[gun4ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun4ay9" value="<? echo $ayarveri[gun4ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun4ay10" value="<? echo $ayarveri[gun4ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun4ay11" value="<? echo $ayarveri[gun4ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun4ay12" value="<? echo $ayarveri[gun4ay12]; ?>"></div>

					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun5]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay1" value="<? echo $ayarveri[gun5ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay2" value="<? echo $ayarveri[gun5ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay3" value="<? echo $ayarveri[gun5ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay4" value="<? echo $ayarveri[gun5ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay5" value="<? echo $ayarveri[gun5ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay6" value="<? echo $ayarveri[gun5ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay7" value="<? echo $ayarveri[gun5ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay8" value="<? echo $ayarveri[gun5ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun5ay9" value="<? echo $ayarveri[gun5ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun5ay10" value="<? echo $ayarveri[gun5ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun5ay11" value="<? echo $ayarveri[gun5ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun5ay12" value="<? echo $ayarveri[gun5ay12]; ?>"></div>

					<div class="temizle sol gunaraligi" style="background:#fff"><? echo $gunveri[gun6]; ?></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay1" value="<? echo $ayarveri[gun6ay1]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay2" value="<? echo $ayarveri[gun6ay2]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay3" value="<? echo $ayarveri[gun6ay3]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay4" value="<? echo $ayarveri[gun6ay4]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay5" value="<? echo $ayarveri[gun6ay5]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay6" value="<? echo $ayarveri[gun6ay6]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay7" value="<? echo $ayarveri[gun6ay7]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay8" value="<? echo $ayarveri[gun6ay8]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezoninput" name="gun6ay9" value="<? echo $ayarveri[gun6ay9]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun6ay10" value="<? echo $ayarveri[gun6ay10]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun6ay11" value="<? echo $ayarveri[gun6ay11]; ?>"></div>
					<div class="sol sezon2" style="background:#fff"><input type="text" class="sezon2input" name="gun6ay12" value="<? echo $ayarveri[gun6ay12]; ?>"></div>



<div class="sol temizle">
				<input type="submit" value="Düzenle" />
</div>
</form>
<script src="js/jquery.tabify.js" type="text/javascript"></script>
<script type="text/javascript">
                    // <![CDATA[
                        
                    $(document).ready(function () {
                        $('#tabsmenu').tabify();
                        $('#menu2').tabify();
                    });
                            
                    // ]]>
</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
include('inc/foother.php');
?>
</body>
</html>
