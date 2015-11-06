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
                    <div class="sol solbaslik fontkalin"><? if($_GET[form]==form){ echo "FORM BİLGİLERİ"; } if($_GET[menuler]==menuler){ echo "MENÜLER"; } if($_GET[diger]==diger){ echo "DİĞER BİLGİLER"; } if($_GET[arac]==arac){ echo "ARAÇ BİLGİLER"; } ?></div>
                    <div class="sol alt">
<?
if(($_GET[duzenle]==duzenle) and ($_GET[anasayfa]==anasayfa)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_anasayfa_baslik='$dil_anasayfa_baslik',dil_anasayfa_aciklama='$dil_anasayfa_aciklama',dil_anasayfa_baslik2='$dil_anasayfa_baslik2',dil_anasayfa_odalarimiz='$dil_anasayfa_odalarimiz',dil_anasayfa_odalarimiz_aciklama='$dil_anasayfa_odalarimiz_aciklama',dil_anasayfa_aktivitelerimiz='$dil_anasayfa_aktivitelerimiz',dil_anasayfa_aktivitelerimiz_aciklama='$dil_anasayfa_aktivitelerimiz_aciklama',dil_anasayfa_restaurant='$dil_anasayfa_restaurant',dil_anasayfa_restaurant_aciklama='$dil_anasayfa_restaurant_aciklama',dil_anasayfa_spamasaj='$dil_anasayfa_spamasaj',dil_anasayfa_spamasaj_aciklama='$dil_anasayfa_spamasaj_aciklama' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Anasayfa Bilgileri Düzenlendi</div>';
}
if(($_GET[duzenle]==duzenle) and ($_GET[menuler]==menuler)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_menuler_anasayfa='$dil_menuler_anasayfa',dil_menuler_hakkimizda='$dil_menuler_hakkimizda',dil_menuler_aktiviteler='$dil_menuler_aktiviteler',dil_menuler_odalar='$dil_menuler_odalar',dil_menuler_rezervasyon='$dil_menuler_rezervasyon',dil_menuler_restaurant='$dil_menuler_restaurant',dil_menuler_galeri='$dil_menuler_galeri',dil_menuler_iletisim='$dil_menuler_iletisim',dil_butonlar_rezervasyon_bir='$dil_butonlar_rezervasyon_bir',dil_butonlar_rezervasyon_iki='$dil_butonlar_rezervasyon_iki',dil_butonlar_devaminioku='$dil_butonlar_devaminioku',dil_butonlar_gonder='$dil_butonlar_gonder' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Menü Bilgileri Düzenlendi</div>';
}
if(($_GET[duzenle]==duzenle) and ($_GET[ust]==ust)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_header_soz='$dil_header_soz',dil_header_dilsecenegi='$dil_header_dilsecenegi',dil_header_1='$dil_header_1',dil_header_2='$dil_header_2',dil_foother_copyright='$dil_foother_copyright',dil_foother_adres='$dil_foother_adres',dil_foother_telefon='$dil_foother_telefon',dil_foother_facebook='$dil_foother_facebook',dil_foother_twitter='$dil_foother_twitter' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Üst & Alt Bilgiler Düzenlendi</div>';
}

if(($_GET[duzenle]==duzenle) and ($_GET[ebulten]==ebulten)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_ebulten_baslik='$dil_ebulten_baslik',dil_ebulten_aciklama='$dil_ebulten_aciklama',dil_ebulten_onay='$dil_ebulten_onay',dil_ebulten_hata='$dil_ebulten_hata',dil_galeri_adi='$dil_galeri_adi' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">E-Bülten ve Galeri Bilgileri Düzenlendi</div>';
}

if(($_GET[duzenle]==duzenle) and ($_GET[sag]==sag)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_sag_rezervasyon_aciklama='$dil_sag_rezervasyon_aciklama',dil_sag_rezervasyon_baslik='$dil_sag_rezervasyon_baslik',dil_sag_rezervasyon_giristarihi='$dil_sag_rezervasyon_giristarihi',dil_sag_rezervasyon_cikistarihi='$dil_sag_rezervasyon_cikistarihi',dil_sag_rezervasyon_gece='$dil_sag_rezervasyon_gece' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Sağ Rezervasyon Bilgileri Düzenlendi</div>';
}

if(($_GET[duzenle]==duzenle) and ($_GET[iletisim]==iletisim)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_iletisim_formu='$dil_iletisim_formu',dil_iletisim_adisoyadi='$dil_iletisim_adisoyadi',dil_iletisim_gsm='$dil_iletisim_gsm',dil_iletisim_emailadresimiz='$dil_iletisim_emailadresimiz',dil_iletisim_konu='$dil_iletisim_konu',dil_iletisim_email='$dil_iletisim_email',dil_iletisim_faks='$dil_iletisim_faks',dil_iletisim_telefon='$dil_iletisim_telefon',dil_iletisim_adresimiz='$dil_iletisim_adresimiz',dil_iletisim_unvanimiz='$dil_iletisim_unvanimiz',dil_iletisim_kroki='$dil_iletisim_kroki',dil_iletisim_bilgilerimiz='$dil_iletisim_bilgilerimiz',dil_iletisim_hatamesaji='$dil_iletisim_hatamesaji',dil_iletisim_onaymesaji='$dil_iletisim_onaymesaji',dil_iletisim_formugonder='$dil_iletisim_formugonder',dil_iletisim_mesajiniz='$dil_iletisim_mesajiniz' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">İletişim Bilgileri Düzenlendi</div>';
}


if(($_GET[duzenle]==duzenle) and ($_GET[rezervasyon]==rezervasyon)) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE diller set dil_rezervasyon_s_takvimi='$dil_rezervasyon_s_takvimi',dil_rezervasyon_s_musait='$dil_rezervasyon_s_musait',dil_rezervasyon_s_musaitdegil='$dil_rezervasyon_s_musaitdegil',dil_rezervasyon_s_cizelgesi='$dil_rezervasyon_s_cizelgesi',dil_rezervasyon_s_odatipi='$dil_rezervasyon_s_odatipi',dil_rezervasyon_s_tariharaligi='$dil_rezervasyon_s_tariharaligi',dil_rezervasyon_s_gunluk='$dil_rezervasyon_s_gunluk',dil_rezervasyon_s_isteginiz='$dil_rezervasyon_s_isteginiz',dil_rezervasyon_s_giristarihi='$dil_rezervasyon_s_giristarihi',dil_rezervasyon_s_cikistarihi='$dil_rezervasyon_s_cikistarihi',dil_rezervasyon_s_odatipleri='$dil_rezervasyon_s_odatipleri',dil_rezervasyon_s_konaklama='$dil_rezervasyon_s_konaklama',dil_rezervasyon_s_devamedin='$dil_rezervasyon_s_devamedin',dil_rezervasyon_s_sec='$dil_rezervasyon_s_sec',dil_rezervasyon_s_konaklamasekli='$dil_rezervasyon_s_konaklamasekli',dil_rezervasyon_s_odafiyati='$dil_rezervasyon_s_odafiyati',dil_rezervasyon_s_odasayisi='$dil_rezervasyon_s_odasayisi',dil_rezervasyon_s_devamedin2='$dil_rezervasyon_s_devamedin2',dil_rezervasyon_s_hatamesaji1='$dil_rezervasyon_s_hatamesaji1',dil_rezervasyon_s_oda='$dil_rezervasyon_s_oda',dil_rezervasyon_s_rezervasyonbilgileri='$dil_rezervasyon_s_rezervasyonbilgileri',dil_rezervasyon_s_kisiselbilgiler='$dil_rezervasyon_s_kisiselbilgiler',dil_rezervasyon_s_devamedin3='$dil_rezervasyon_s_devamedin3',dil_rezervasyon_s_cocuk='$dil_rezervasyon_s_cocuk',dil_rezervasyon_s_bayan='$dil_rezervasyon_s_bayan',dil_rezervasyon_s_bay='$dil_rezervasyon_s_bay',dil_rezervasyon_s_adisoyadi='$dil_rezervasyon_s_adisoyadi',dil_rezervasyon_s_ulke='$dil_rezervasyon_s_ulke',dil_rezervasyon_s_sehir='$dil_rezervasyon_s_sehir',dil_rezervasyon_s_faturabilgileri='$dil_rezervasyon_s_faturabilgileri',dil_rezervasyon_s_adres='$dil_rezervasyon_s_adres',dil_rezervasyon_s_ceptelefonu='$dil_rezervasyon_s_ceptelefonu',dil_rezervasyon_s_telefon='$dil_rezervasyon_s_telefon',dil_rezervasyon_s_eposta='$dil_rezervasyon_s_eposta',dil_rezervasyon_s_adinizsoyadiniz='$dil_rezervasyon_s_adinizsoyadiniz',dil_rezervasyon_s_cinsiyet='$dil_rezervasyon_s_cinsiyet',dil_rezervasyon_s_toplamtutar='$dil_rezervasyon_s_toplamtutar',dil_rezervasyon_s_kiralanacakodasayisi='$dil_rezervasyon_s_kiralanacakodasayisi',dil_rezervasyon_s_odemesekli='$dil_rezervasyon_s_odemesekli',dil_rezervasyon_s_nakit='$dil_rezervasyon_s_nakit',dil_rezervasyon_s_havale='$dil_rezervasyon_s_havale',dil_rezervasyon_s_mailorder='$dil_rezervasyon_s_mailorder',dil_rezervasyon_s_kredikarti='$dil_rezervasyon_s_kredikarti',dil_rezervasyon_s_tamamlandi='$dil_rezervasyon_s_tamamlandi',dil_rezervasyon_s_nakitaciklama='$dil_rezervasyon_s_nakitaciklama',dil_rezervasyon_s_havaleaciklama='$dil_rezervasyon_s_havaleaciklama',dil_rezervasyon_s_mailorderaciklama='$dil_rezervasyon_s_mailorderaciklama',dil_rezervasyon_s_indir='$dil_rezervasyon_s_indir',dil_rezervasyon_s_hataolustu='$dil_rezervasyon_s_hataolustu',dil_rezervasyon_s_hataaciklama='$dil_rezervasyon_s_hataaciklama' where dil_id='$_GET[dil_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Rezervasyon Sayfası Düzenlendi</div>';
}




$ayar=mysql_query("select * from diller where dil_id='$_GET[dil_id]'");
$ayarveri = mysql_fetch_array($ayar);

if($_GET[dil_id]==1){ $bayrak='<img src="tema/tr.png" alt="" align="left" style="margin-right:3px" />'; }
if($_GET[dil_id]==2){ $bayrak='<img src="tema/en.png" alt="" align="left" style="margin-right:3px" />'; }
if($_GET[dil_id]==3){ $bayrak='<img src="tema/de.png" alt="" align="left" style="margin-right:3px" />'; }
if($_GET[dil_id]==4){ $bayrak='<img src="tema/ru.png" alt="" align="left" style="margin-right:3px" />'; }
if($_GET[dil_id]==5){ $bayrak='<img src="tema/fr.png" alt="" align="left" style="margin-right:3px" />'; }
?>
<? if($_GET[anasayfa]==anasayfa){ ?>
<form action="dillerduzenle.php?anasayfa=anasayfa&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Başlık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_baslik" value="<? echo $ayarveri[dil_anasayfa_baslik]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_aciklama" value="<? echo $ayarveri[dil_anasayfa_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Başlık 2</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_baslik2" value="<? echo $ayarveri[dil_anasayfa_baslik2]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Odalarımız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_odalarimiz" value="<? echo $ayarveri[dil_anasayfa_odalarimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Odalarımız Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_odalarimiz_aciklama" value="<? echo $ayarveri[dil_anasayfa_odalarimiz_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Aktivitelerimiz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_aktivitelerimiz" value="<? echo $ayarveri[dil_anasayfa_aktivitelerimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Aktivitelerimiz Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_aktivitelerimiz_aciklama" value="<? echo $ayarveri[dil_anasayfa_aktivitelerimiz_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Restaurant</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_restaurant" value="<? echo $ayarveri[dil_anasayfa_restaurant]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Restaurant Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_restaurant_aciklama" value="<? echo $ayarveri[dil_anasayfa_restaurant_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Spa & Masaj</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_spamasaj" value="<? echo $ayarveri[dil_anasayfa_spamasaj]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Spa & Masaj Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_anasayfa_spamasaj_aciklama" value="<? echo $ayarveri[dil_anasayfa_spamasaj_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>





<? if($_GET[rezervasyon]==rezervasyon){ ?>
<form action="dillerduzenle.php?rezervasyon=rezervasyon&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Rezervasyon Takvimi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_takvimi" value="<? echo $ayarveri[dil_rezervasyon_s_takvimi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Müsait</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_musait" value="<? echo $ayarveri[dil_rezervasyon_s_musait]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Müsait Değil</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_musaitdegil" value="<? echo $ayarveri[dil_rezervasyon_s_musaitdegil]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Rezervasyon Çizelgesi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_cizelgesi" value="<? echo $ayarveri[dil_rezervasyon_s_cizelgesi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Oda Tipi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_odatipi" value="<? echo $ayarveri[dil_rezervasyon_s_odatipi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Tarih Aralığı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_tariharaligi" value="<? echo $ayarveri[dil_rezervasyon_s_tariharaligi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Günlük</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_gunluk" value="<? echo $ayarveri[dil_rezervasyon_s_gunluk]; ?>" style="border:1px solid #444; width:400px"></div>

					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Rezervasyon İsteğiniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_isteginiz" value="<? echo $ayarveri[dil_rezervasyon_s_isteginiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Giriş Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_giristarihi" value="<? echo $ayarveri[dil_rezervasyon_s_giristarihi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Çıkış Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_cikistarihi" value="<? echo $ayarveri[dil_rezervasyon_s_cikistarihi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Oda Tipleri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_odatipleri" value="<? echo $ayarveri[dil_rezervasyon_s_odatipleri]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Konaklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_konaklama" value="<? echo $ayarveri[dil_rezervasyon_s_konaklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Devam Edin</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_devamedin" value="<? echo $ayarveri[dil_rezervasyon_s_devamedin]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Seç</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_sec" value="<? echo $ayarveri[dil_rezervasyon_s_sec]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Konaklama Şekli</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_konaklamasekli" value="<? echo $ayarveri[dil_rezervasyon_s_konaklamasekli]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Oda Fiyatı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_odafiyati" value="<? echo $ayarveri[dil_rezervasyon_s_odafiyati]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Oda Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_odasayisi" value="<? echo $ayarveri[dil_rezervasyon_s_odasayisi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Devam Edin Buton</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_devamedin2" value="<? echo $ayarveri[dil_rezervasyon_s_devamedin2]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">2-Hata Mesajı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_hatamesaji1" value="<? echo $ayarveri[dil_rezervasyon_s_hatamesaji1]; ?>" style="border:1px solid #444; width:400px"></div>


					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Kiralanacak Oda Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_kiralanacakodasayisi" value="<? echo $ayarveri[dil_rezervasyon_s_kiralanacakodasayisi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Toplam Tutar</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_toplamtutar" value="<? echo $ayarveri[dil_rezervasyon_s_toplamtutar]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Cinsiyet</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_cinsiyet" value="<? echo $ayarveri[dil_rezervasyon_s_cinsiyet]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Adınız Soyadınız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_adinizsoyadiniz" value="<? echo $ayarveri[dil_rezervasyon_s_adinizsoyadiniz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-E-Posta Adresi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_eposta" value="<? echo $ayarveri[dil_rezervasyon_s_eposta]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Telefon</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_telefon" value="<? echo $ayarveri[dil_rezervasyon_s_telefon]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Cep Telefonu</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_ceptelefonu" value="<? echo $ayarveri[dil_rezervasyon_s_ceptelefonu]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Adres</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_adres" value="<? echo $ayarveri[dil_rezervasyon_s_adres]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Fatura Bilgileri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_faturabilgileri" value="<? echo $ayarveri[dil_rezervasyon_s_faturabilgileri]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Şehir</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_sehir" value="<? echo $ayarveri[dil_rezervasyon_s_sehir]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Ülke</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_ulke" value="<? echo $ayarveri[dil_rezervasyon_s_ulke]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Adı Soyadı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_adisoyadi" value="<? echo $ayarveri[dil_rezervasyon_s_adisoyadi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Bay</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_bay" value="<? echo $ayarveri[dil_rezervasyon_s_bay]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Bayan</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_bayan" value="<? echo $ayarveri[dil_rezervasyon_s_bayan]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Çoçuk</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_cocuk" value="<? echo $ayarveri[dil_rezervasyon_s_cocuk]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Devam Et (Buton)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_devamedin3" value="<? echo $ayarveri[dil_rezervasyon_s_devamedin3]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Kişisel Bilgileriniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_kisiselbilgiler" value="<? echo $ayarveri[dil_rezervasyon_s_kisiselbilgiler]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Rezervasyon Bilgileri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_rezervasyonbilgileri" value="<? echo $ayarveri[dil_rezervasyon_s_rezervasyonbilgileri]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Oda</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_oda" value="<? echo $ayarveri[dil_rezervasyon_s_oda]; ?>" style="border:1px solid #444; width:400px"></div>

					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Ödeme Şekli</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_odemesekli" value="<? echo $ayarveri[dil_rezervasyon_s_odemesekli]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Nakit</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_nakit" value="<? echo $ayarveri[dil_rezervasyon_s_nakit]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Havale & EFT</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_havale" value="<? echo $ayarveri[dil_rezervasyon_s_havale]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Mail Order</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_mailorder" value="<? echo $ayarveri[dil_rezervasyon_s_mailorder]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">3-Kredi Kartı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_kredikarti" value="<? echo $ayarveri[dil_rezervasyon_s_kredikarti]; ?>" style="border:1px solid #444; width:400px"></div>


					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Onay Başlık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_tamamlandi" value="<? echo $ayarveri[dil_rezervasyon_s_tamamlandi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Nakit Ödeme Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_nakitaciklama" value="<? echo $ayarveri[dil_rezervasyon_s_nakitaciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Havale Ödeme Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_havaleaciklama" value="<? echo $ayarveri[dil_rezervasyon_s_havaleaciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Mailorder Ödeme Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_mailorderaciklama" value="<? echo $ayarveri[dil_rezervasyon_s_mailorderaciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-İndir</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_indir" value="<? echo $ayarveri[dil_rezervasyon_s_indir]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Hata Başlık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_hataolustu" value="<? echo $ayarveri[dil_rezervasyon_s_hataolustu]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">4-Hata Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_rezervasyon_s_hataaciklama" value="<? echo $ayarveri[dil_rezervasyon_s_hataaciklama]; ?>" style="border:1px solid #444; width:400px"></div>

					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>



<? if($_GET[menuler]==menuler){ ?>
<form action="dillerduzenle.php?menuler=menuler&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Anasayfa</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_anasayfa" value="<? echo $ayarveri[dil_menuler_anasayfa]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Hakkımızda</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_hakkimizda" value="<? echo $ayarveri[dil_menuler_hakkimizda]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Aktiviteler</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_aktiviteler" value="<? echo $ayarveri[dil_menuler_aktiviteler]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Odalar</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_odalar" value="<? echo $ayarveri[dil_menuler_odalar]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Rezervasyon</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_rezervasyon" value="<? echo $ayarveri[dil_menuler_rezervasyon]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Restaurant</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_restaurant" value="<? echo $ayarveri[dil_menuler_restaurant]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Galeri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_galeri" value="<? echo $ayarveri[dil_menuler_galeri]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">İletişim</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_menuler_iletisim" value="<? echo $ayarveri[dil_menuler_iletisim]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Rezervasyon Yap</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_butonlar_rezervasyon_bir" value="<? echo $ayarveri[dil_butonlar_rezervasyon_bir]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Devam Et</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_butonlar_rezervasyon_iki" value="<? echo $ayarveri[dil_butonlar_rezervasyon_iki]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Devamını Oku</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_butonlar_devaminioku" value="<? echo $ayarveri[dil_butonlar_devaminioku]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Gönder</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_butonlar_gonder" value="<? echo $ayarveri[dil_butonlar_gonder]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>






<? if($_GET[iletisim]==iletisim){ ?>
<form action="dillerduzenle.php?iletisim=iletisim&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Form Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_formu" value="<? echo $ayarveri[dil_iletisim_formu]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Adı Soyadı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_adisoyadi" value="<? echo $ayarveri[dil_iletisim_adisoyadi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Gsm No</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_gsm" value="<? echo $ayarveri[dil_iletisim_gsm]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Mail Adresiniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_emailadresimiz" value="<? echo $ayarveri[dil_iletisim_emailadresimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Konu</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_konu" value="<? echo $ayarveri[dil_iletisim_konu]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Mesajınız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_mesajiniz" value="<? echo $ayarveri[dil_iletisim_mesajiniz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Formu Gönder</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_formugonder" value="<? echo $ayarveri[dil_iletisim_formugonder]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Onay Mesajı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_onaymesaji" value="<? echo $ayarveri[dil_iletisim_onaymesaji]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Hata Mesajı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_hatamesaji" value="<? echo $ayarveri[dil_iletisim_hatamesaji]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Bilgilerimiz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_bilgilerimiz" value="<? echo $ayarveri[dil_iletisim_bilgilerimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Kroki</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_kroki" value="<? echo $ayarveri[dil_iletisim_kroki]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Ünvanımız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_unvanimiz" value="<? echo $ayarveri[dil_iletisim_unvanimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Adresimiz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_adresimiz" value="<? echo $ayarveri[dil_iletisim_adresimiz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Telefon</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_telefon" value="<? echo $ayarveri[dil_iletisim_telefon]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Faks</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_faks" value="<? echo $ayarveri[dil_iletisim_faks]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Mail</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_iletisim_email" value="<? echo $ayarveri[dil_iletisim_email]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>





<? if($_GET[ebulten]==ebulten){ ?>
<form action="dillerduzenle.php?ebulten=ebulten&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">

					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Bülten Başlık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_ebulten_baslik" value="<? echo $ayarveri[dil_ebulten_baslik]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Bülten Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_ebulten_aciklama" value="<? echo $ayarveri[dil_ebulten_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Bülten Onay Mesajı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_ebulten_onay" value="<? echo $ayarveri[dil_ebulten_onay]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">E-Bülten Hata Mesajı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_ebulten_hata" value="<? echo $ayarveri[dil_ebulten_hata]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Resim Galerisi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_galeri_adi" value="<? echo $ayarveri[dil_galeri_adi]; ?>" style="border:1px solid #444; width:400px"></div>

					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>




<? 
if($_GET[ust]==ust){ ?>
<form action="dillerduzenle.php?ust=ust&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Üst Logo Slogan</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_header_soz" value="<? echo $ayarveri[dil_header_soz]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Üst E-Mail</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_header_1" value="<? echo $ayarveri[dil_header_1]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Üst Rezervasyon Bilgi Hattı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_header_2" value="<? echo $ayarveri[dil_header_2]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Üst Dil Seçeneği</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_header_dilsecenegi" value="<? echo $ayarveri[dil_header_dilsecenegi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Alt Copyright</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_foother_copyright" value="<? echo $ayarveri[dil_foother_copyright]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Alt Adres</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_foother_adres" value="<? echo $ayarveri[dil_foother_adres]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Alt Telefon</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_foother_telefon" value="<? echo $ayarveri[dil_foother_telefon]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Alt Facebook</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_foother_facebook" value="<? echo $ayarveri[dil_foother_facebook]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Alt Twitter</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_foother_twitter" value="<? echo $ayarveri[dil_foother_twitter]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>

<? 
if($_GET[sag]==sag){ ?>
<form action="dillerduzenle.php?sag=sag&duzenle=duzenle&dil_id=<? echo $_GET[dil_id]; ?>" method="POST">
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Sağ Rezervasyon Başlık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_sag_rezervasyon_baslik" value="<? echo $ayarveri[dil_sag_rezervasyon_baslik]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Sağ Rezervasyon Açıklama</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_sag_rezervasyon_aciklama" value="<? echo $ayarveri[dil_sag_rezervasyon_aciklama]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Sağ Rezervasyon Giriş Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_sag_rezervasyon_giristarihi" value="<? echo $ayarveri[dil_sag_rezervasyon_giristarihi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Sağ Rezervasyon Çıkış Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_sag_rezervasyon_cikistarihi" value="<? echo $ayarveri[dil_sag_rezervasyon_cikistarihi]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><? echo $bayrak; ?><span style="padding-top:3px; display:block;">Sağ Rezervasyon Gece</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dil_sag_rezervasyon_gece" value="<? echo $ayarveri[dil_sag_rezervasyon_gece]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
</form>
<? } ?>

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
