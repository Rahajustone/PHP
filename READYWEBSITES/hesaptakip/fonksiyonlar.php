<?php
$suan = date("d.m.Y");
$aylar = date("m");
$bul=array("Ocak","Subat","Mart","Nisan","Mayis","Haziran","Temmuz","Agustos","Eylul","Ekim","Kasim","Aralik");
$ok=array("01","02","03","04","05","06","07","08","09","10","11","12");
$degistir = str_replace($ok,$bul,$aylar);
$yil = date("Y"); 
$ayyil = $aylar.'/'.$yil;
$tamtarih = "$degistir/$yil";
// Oturum Kontrolü
function kontrol() {
if (empty($_SESSION['kullanici'])) {
Header ("Location:index.php");
}
}
// Çýkýþ Yapma
function cikisyap() {
session_unregister("kullanici");
session_destroy();
Header("location:index.php");
}
// Menuler 
function menuler() {
echo'<div class="baslik1">Menü</div>
	<div class="yazi">
	<ul class="menuler">
	<li class="alacaklar"><a href="alacaklar.php?islem=bak" title="Alacaklar">Alacaklar</a></li>
	<li class="borclar"><a href="borclar.php?islem=bak" title="Borçlar">Borçlar</a></li>
	<li class="arsiv"><a href="arsiv.php?islem=bak" title="Arþiv">Arþiv</a></li>
	<li class="cikis"><a href="cikis.php" title="Çýkýþ">Çýkýþ</a></li>
	</ul>
	</div>';
}
// Alacak Listesi
function alacaklistesi() { global $toplam; global $sonkalan; global $odenen;global $suan;
$bul= mysql_fetch_array(mysql_query("select SUM(borc) as veri from hesaplar where durum='1'")); $toplam = $bul['veri'];
$bul= mysql_fetch_array(mysql_query("select SUM(alinan) as veri from hesaplar where durum='1'")); $odenen = $bul['veri'];
$sonkalan = $toplam-$odenen;
$baglan = mysql_query("select * from hesaplar where durum='1' and arsiv='0' order by id desc");
if (mysql_num_rows($baglan) == 0) {
echo '<div class="tamam">Þu anda hiç gelecek paranýz bulunmamaktadýr.</div>';
} else {
while ($yaz = mysql_fetch_array($baglan)) {
$id = $yaz[id];
$kalan = $yaz[borc]-$yaz[alinan];
echo'<div class="satir">
	<div class="kisi">'.$yaz[adsoyad].'</div>
	<div class="site">'.$yaz[site].'</div>
	<div class="email">'.$yaz[email].'</div>
	<div class="telefon">'.$yaz[telefon].'</div>
	<div class="yapilan">'.$yaz[yapilan].'</div>
	<div class="tarih">'.$yaz[tarih].'</div>
	<div class="borcu">'.$yaz[borc].' TL</div>
	<div class="alinan">'.$yaz[alinan].' TL</div>
	<div class="kalan">'.$kalan.' TL</div>
	<div class="islemler">
	<div class="sec">
	<ul class="islem">
	<li><a href="?islem=odeme&id='.$id.'" title="Ödeme Al"><img src="resimler/odeme.png" alt="Ödeme Al"/></a></li>
	<li><a href="?islem=duzenle&id='.$id.'" title="Düzenle"><img src="resimler/duzenle.png" alt="Düzenle"/></a></li>
	</ul>
	</div>
	</div>
	</div>';
	}
	echo'
	<div class="toplam">
	<ul class="islem">
	<li><b>Toplam: </b>'.$toplam.' TL</li>
	<li><b>Alýnan: </b>'.$odenen.' TL</li>
	<li><b>Kalan: </b>'.$sonkalan.'TL</li>
	</ul>
	</div>
	';

}}
// Verecek Listesi
function borclistesi() {global $toplam; global $sonkalan; global $odenen;
$bul= mysql_fetch_array(mysql_query("select SUM(borc) as veri from hesaplar where durum='2'")); $toplam = $bul['veri'];
$bul= mysql_fetch_array(mysql_query("select SUM(alinan) as veri from hesaplar where durum='2'")); $odenen = $bul['veri'];
$sonkalan = $toplam-$odenen;
$baglan = mysql_query("select * from hesaplar where durum='2' and arsiv='0' order by id desc");
if (mysql_num_rows($baglan) == 0) {
echo '<div class="tamam">Þu anda hiç borcunuz bulunmamaktadýr.</div>';
} else {
while ($yaz = mysql_fetch_array($baglan)) {
$kalan = $yaz[borc]-$yaz[alinan];
$id = $yaz[id];
echo'<div class="satir">
	<div class="kisi">'.$yaz[adsoyad].'</div>
	<div class="site">'.$yaz[site].'</div>
	<div class="email">'.$yaz[email].'</div>
	<div class="telefon">'.$yaz[telefon].'</div>
	<div class="yapilan">'.$yaz[yapilan].'</div>
	<div class="tarih">'.$yaz[tarih].'</div>
	<div class="borcu">'.$yaz[borc].' TL</div>
	<div class="alinan">'.$yaz[alinan].' TL</div>
	<div class="kalan">'.$kalan.' TL</div>
	<div class="islemler">
	<div class="sec">
	<ul class="islem">
	<li><a href="?islem=odeme&id='.$id.'" title="Ödeme Yap"><img src="resimler/odeme.png" alt="Ödeme Yap"/></a></li>
	<li><a href="?islem=duzenle&id='.$id.'" title="Düzenle"><img src="resimler/duzenle.png" alt="Düzenle"/></a></li>
	</ul>
	</div>
	</div>
	</div>
	<div class="toplam">
	<ul class="islem">
	<li><b>Toplam: </b>'.$toplam.' TL</li>
	<li><b>Ödenen: </b>'.$odenen.' TL</li>
	<li><b>Kalan: </b>'.$sonkalan.'TL</li>
	</ul>
	</div>
	';
}
}
}
// Ödeme Al
function odemeal() { global $suan; global $tamtarih;
$alinan = intval($_POST[alinan]); $id = intval($_GET[id]);
if($_POST){
if($alinan <= 0) { echo '<div class="hata">Lütfen aldýðýnýz ödemeyi giriniz.</div>';} else {
$baglan = mysql_query("select * from hesaplar where id='$id'"); 
$al = mysql_fetch_array($baglan); $onceki = $al[alinan]; $son = $onceki+$alinan; $adsoyad = $al[adsoyad];
$yapilan = $al[yapilan]; $borc = $al[borc]; $durum = 1; $kalan = $borc-$son;
$guncelle = mysql_query("update hesaplar set alinan='$son' where id='$id'");
if ($guncelle) {
if ($son >= $borc) {
$arsivle = mysql_query("insert into arsiv (durum,bitis,tarih,adsoyad,yapilan,borc) values ('$durum','$suan','$tamtarih','$adsoyad','$yapilan','$borc')");
$sil = mysql_query("delete from hesaplar where id='$id'");
if ($arsivle) {
echo '<div class="tamam">Bu kiþiden hiç alacaðýnýz kalmadý. Hesabýnýz otomatik olarak arþivlendi.</div>';
}
} else {
echo '<div class="tamam">Alacak bilgileriniz baþarýyla güncellendi.Kalan alacaðýnýz: <b>'.$kalan.'</b> TL.</div>';
}}
}}
echo'<div class="yazi">
<form action="?islem=odeme&id='.$id.'" method="post">
<div class="yazi2">Alýnan Tutar:</div>
<div class="inputalani"><input name="alinan" type="text" class="inputlar2"/></div>
<div class="inputalani"><input name="kaydet" type="submit" value="Ödeme Al" class="gonder"/></div>
</form>
</div>';
}
// Ödeme Yap
function odemeyap() { global $suan; global $tamtarih;
$alinan = intval($_POST[alinan]); $id = intval($_GET[id]);
if($_POST){
if($alinan <= 0) { echo '<div class="hata">Lütfen aldýðýnýz ödemeyi giriniz.</div>';} else {
$baglan = mysql_query("select * from hesaplar where id='$id'"); 
$al = mysql_fetch_array($baglan); $onceki = $al[alinan]; $son = $onceki+$alinan; $adsoyad = $al[adsoyad];
$yapilan = $al[yapilan]; $borc = $al[borc]; $durum = 2; $kalan = $borc-$son;
$guncelle = mysql_query("update hesaplar set alinan='$son' where id='$id'");
if ($guncelle) {
if ($son >= $borc) {
$arsivle = mysql_query("insert into arsiv (durum,bitis,tarih,adsoyad,yapilan,borc) values ('$durum','$suan','$tamtarih','$adsoyad','$yapilan','$borc')");
$sil = mysql_query("delete from hesaplar where id='$id'");
if ($arsivle) {
echo '<div class="tamam">Bu kiþiye hiç borcunuz kalmadý. Hesabýnýz otomatik olarak arþivlendi.</div>';
}
} else {
echo '<div class="tamam">Borç bilgileriniz baþarýyla güncellendi. Kalan borcunuz : <b>'.$kalan.'</b> TL.</div>';
}}
}}
echo'<div class="yazi">
<form action="?islem=odeme&id='.$id.'" method="post">
<div class="yazi2">Ödenen Tutar:</div>
<div class="inputalani"><input name="alinan" type="text" class="inputlar2"/></div>
<div class="inputalani"><input name="kaydet" type="submit" value="Ödeme Al" class="gonder"/></div>
</form>
</div>';
}
// Alacak Ekleme
function alacakekle() {
if ($_POST) {
$adsoyad = htmlspecialchars(strip_tags($_POST['adsoyad'])); $email = htmlspecialchars(strip_tags($_POST['email']));  $telefon = htmlspecialchars(strip_tags($_POST['telefon'])); $site = htmlspecialchars(strip_tags($_POST['site']));
$yapilan = htmlspecialchars(strip_tags($_POST['yapilan']));  $tarih = htmlspecialchars(strip_tags($_POST['tarih']));  $para = intval(htmlspecialchars(strip_tags($_POST['para']))); $durum = 1;
if (empty($adsoyad) || empty($email) || empty($telefon) || empty($yapilan) || empty($tarih) || empty($para) || $para <=0) {
echo '<div class="hata">Lütfen bütün alanlarý eksiksiz doldurunuz.</div>'; 
} else {
$ekle = mysql_query("insert into hesaplar (adsoyad,site,email,yapilan,tarih,telefon,borc,durum) values ('$adsoyad','$site','$email','$yapilan','$tarih','$telefon','$para','$durum')");
if ($ekle) { echo '<div class="tamam">Bilgiler baþarýyla eklendi.</div>'; } else { echo '<div class="hata">Bilgileri eklerken bir hata oluþtu.</div>';}}}
echo'
<div class="yazi">
<form action="" method="post">
<div class="satir2"><div class="yazi2">Ad Soyad (Rumuz):</div><div class="inputalani"><input name="adsoyad" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Telefon :</div><div class="inputalani"><input name="telefon" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">E-Mail :</div><div class="inputalani"><input name="email" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Web Sitesi :</div><div class="inputalani"><input name="site" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Yapýlan Ýþ :</div><div class="inputalani"><input name="yapilan" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Alacak Tarihi :</div><div class="inputalani"><input name="tarih" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Alýnacak Para :</div><div class="inputalani"><input name="para" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2"> </div><div class="inputalani"><input name="ekle" value="Alacak Ekle" type="submit" class="gonder"/></div></div>
</form>
</div>';
}
// Borç Ekleme
function borcekle() {
if ($_POST) {
$adsoyad = htmlspecialchars(strip_tags($_POST['adsoyad'])); $email = htmlspecialchars(strip_tags($_POST['email']));  $telefon = htmlspecialchars(strip_tags($_POST['telefon'])); $site = htmlspecialchars(strip_tags($_POST['site']));
$yapilan = htmlspecialchars(strip_tags($_POST['yapilan']));  $tarih = htmlspecialchars(strip_tags($_POST['tarih']));  $para = intval(htmlspecialchars(strip_tags($_POST['para']))); $durum = 2;
if (empty($adsoyad) || empty($email) || empty($telefon) || empty($yapilan) || empty($tarih) || empty($para) || $para <=0) {
echo '<div class="hata">Lütfen bütün alanlarý eksiksiz doldurunuz.</div>'; 
} else {
$ekle = mysql_query("insert into hesaplar (adsoyad,site,email,yapilan,tarih,telefon,borc,durum) values ('$adsoyad','$site','$email','$yapilan','$tarih','$telefon','$para','$durum')");
if ($ekle) { echo '<div class="tamam">Bilgiler baþarýyla eklendi.</div>'; } else { echo '<div clasS="hata">Bilgileri eklerken bir hata oluþtu.</div>';}}}
echo'
<div class="yazi">
<form action="" method="post">
<div class="satir2"><div class="yazi2">Ad Soyad (Rumuz):</div><div class="inputalani"><input name="adsoyad" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Telefon :</div><div class="inputalani"><input name="telefon" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">E-Mail :</div><div class="inputalani"><input name="email" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Web Sitesi :</div><div class="inputalani"><input name="site" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Alýnan Hizmet :</div><div class="inputalani"><input name="yapilan" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Verilecek Tarih :</div><div class="inputalani"><input name="tarih" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Verilecek Para :</div><div class="inputalani"><input name="para" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2"> </div><div class="inputalani"><input name="ekle" value="Borç Ekle" type="submit" class="gonder"/></div></div>
</form>
</div>';
}
// Alacak ve Borç Düzenleme
function duzenle() {
$id = intval($_GET[id]);
if ($_POST) {
$adsoyad = htmlspecialchars(strip_tags($_POST['adsoyad'])); $email = htmlspecialchars(strip_tags($_POST['email']));  $telefon = htmlspecialchars(strip_tags($_POST['telefon'])); $site = htmlspecialchars(strip_tags($_POST['site']));
$yapilan = htmlspecialchars(strip_tags($_POST['yapilan']));  $tarih = htmlspecialchars(strip_tags($_POST['tarih']));  $para = intval(htmlspecialchars(strip_tags($_POST['para']))); $durum = 1;
if (empty($adsoyad) || empty($email) || empty($telefon) || empty($yapilan) || empty($tarih) || empty($para) || $para <=0) {
echo '<div class="hata">Lütfen bütün alanlarý eksiksiz doldurunuz.</div>'; 
} else {
$ekle = mysql_query("update hesaplar set adsoyad='$adsoyad',telefon='$telefon',email='$email',site='$site',yapilan='$yapilan',tarih='$tarih',borc='$para' where id='$id' ");
if ($ekle) { echo '<div class="tamam">Bilgiler baþarýyla güncellendi.</div>'; } else { echo '<div clasS="hata">Bilgiler güncellenirken bir hata oluþtu.</div>';}}}
$cek = mysql_fetch_array(mysql_query("select * from hesaplar where id='$id'"));
echo'
<div class="yazi">
<form action="" method="post">
<div class="satir2"><div class="yazi2">Ad Soyad (Rumuz):</div><div class="inputalani"><input name="adsoyad" value="'.$cek[adsoyad].'" type="text" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Telefon :</div><div class="inputalani"><input name="telefon" type="text" value="'.$cek[telefon].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">E-Mail :</div><div class="inputalani"><input name="email" type="text" value="'.$cek[email].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Web Sitesi :</div><div class="inputalani"><input name="site" type="text" value="'.$cek[site].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Yapýlan Ýþ :</div><div class="inputalani"><input name="yapilan" type="text" value="'.$cek[yapilan].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Alacak Tarihi :</div><div class="inputalani"><input name="tarih" type="text" value="'.$cek[tarih].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2">Alýnacak Para :</div><div class="inputalani"><input name="para" type="text" value="'.$cek[borc].'" class="inputlar2"/></div></div>
<div class="satir2"><div class="yazi2"> </div><div class="inputalani"><input name="ekle" value="Düzenle" type="submit" class="gonder"/></div></div>
</form>
</div>';
}
// Arþiv Listele 
function arsiv() { global $ayyil;
$baglan = mysql_query("select * from arsiv group by tarih");
$sonbilgi = mysql_query("select SUM(borc) as fiyatlar from arsiv where durum ='1'");
$h=mysql_fetch_array($sonbilgi);
$alinantoplam = $h['fiyatlar'];
$sonbilgi = mysql_query("select SUM(borc) as fiyatlar from arsiv where durum ='2'");
$h=mysql_fetch_array($sonbilgi);
$odenentoplam = $h['fiyatlar'];
$kalan = $alinantoplam-$odenentoplam;
if (mysql_num_rows($baglan) <= 0) {
echo '<div class="tamam">Herhangi bir aya ait hesap arþivi bulunamadý.</div>';
} else {
while ($yaz = mysql_fetch_array($baglan)) { 
$tarih = $yaz[tarih]; $ay = str_replace('/',' - ',$tarih);
$sonbilgi = mysql_query("select SUM(borc) as fiyatlar from arsiv where tarih='$tarih' and durum ='1'");
$hh=mysql_fetch_array($sonbilgi);
$alinanlar = $hh['fiyatlar'];
$sonbilgi2 = mysql_query("select SUM(borc) as fiyatlar from arsiv where tarih='$tarih' and durum ='2'");
$hh2=mysql_fetch_array($sonbilgi2);
$odenenler = $hh2['fiyatlar'];
$kar = $alinanlar-$odenenler;
if ($kar < 0) { $kar = '<b>Zarar: </b>'.$kar.' TL'; } else { $kar = '<b>Kâr: </b>'.$kar.' TL'; }
echo '
<div class="aylar">
<div class="ay"><a class="kalin" href="arsivebak.php?islem=bak&tarih='.$tarih.'">'.$ay.'</a></div>
<div class="aysonu">
	<ul class="islem">
	<li><b>Alýnan: </b>'.$alinanlar.' TL</li>
	<li><b>Ödenen: </b>'.$odenenler.' TL</li>
	<li>'.$kar.'</li>
	</ul> 
</div> 
<div class="aysil"><a href="?islem=sil&grup='.$tarih.'" title="Sil"><img src="resimler/sil.png" alt="Sil"/></a></div>
</div>
';
}
echo '<div class="toplam">
<ul class="islem">
	<li><b>Alýnan: </b>'.$alinantoplam.' TL</li>
	<li><b>Ödenen: </b>'.$odenentoplam.' TL</li>
	<li><b>Kazanc: </b>'.$kalan.' TL</li>
	</ul> 
</div>';
}
}
// Arþiv Silme 
function arsivsil() { global $grup;
$grup = htmlspecialchars(strip_tags($_GET['grup']));
$sil = mysql_query("delete from arsiv where tarih= '$grup'");
if ($sil) {
echo '<div class="tamam">'.$grup.' tarihli tüm veriler baþarýyla silindi</div>';
} else {
echo '<div class="hata">Aylýk arþiv bilgisi silinemedi.</div>';
}
}
// Aylýk Arþive Bak
function arsivebak() {global $tarih;
$islem = htmlspecialchars(strip_tags($_GET['islem']));
$tarih = htmlspecialchars(strip_tags($_GET['tarih']));
$bak = mysql_query("select * from arsiv where tarih='$tarih'");
while ($yaz = mysql_fetch_array($bak)) {
$id = $yaz['id']; $durum = $yaz['durum']; $bitis = $yaz['bitis'];
echo'<div class="satir3">
	<div class="kisi">'.$yaz[adsoyad].'</div>
	<div class="yapilan">'.$yaz[yapilan].'</div>';
	if ($durum == 1) { echo '<div class="alinan">'.$yaz[borc].' TL</div>
	<div class="islemler">
	<div class="uyari">
	Bu kiþinin ödemesi <b>'.$bitis.'</b> tarihinde alýndý.	
	';
	} else { echo '<div class="kalan">'.$yaz[borc].' TL</div>
	<div class="islemler">
	<div class="uyari">
	Bu kiþinin ödemesi <b>'.$bitis.'</b> tarihinde yapýldý.	
	'; }
	echo'
	</div>
	<div class="arsivsil"><a href="?islem=sil&id='.$id.'" title="Ödeme Yap"><img src="resimler/sil.png" alt="Sil"/></a>	</div>
	</div>
	</div>';
}
}
// Arþiv Hesap Silme 
function arsivhesapsil() { global $id;
$id = htmlspecialchars(strip_tags($_GET['id']));
$sil = mysql_query("delete from arsiv where id= '$id'");
if ($sil) {
echo '<div class="tamam">Hesap bilgisi baþarýyla silindi.</div>';
} else {
echo '<div class="hata">Hesap bilgisi silinemedi.</div>';
}
}
// Yapýmcý
function yapan() {
echo '<div class="yapan">Þu an kullandýðýnýz bu script <a class="mavi" href="http://www.yuregim.com" title="Tasarým / Yazýlým" class="erturk">
Ertürk KUMAÞ</a> tarafýndan 21 Mart 2010 Tarihinde yapýlmýþtýr.Sistem tamamen açýk kaynak kodlu olup, 
geliþtirilmeye açýktýr.Yapýlan yenilikler yine <a class="mavi" href="http://www.fuub.net" title="Fuub - Bir Avuç Webmaster">Fuub</a> - <a class="mavi" href="http://www.iyinet.com" title="iyiNET">iyiNET</a> ve <a class="mavi" href="http://www.r10.net" title="R10">R10</a>
üzerinden verilecektir.Fikirleriniz, önerileriniz ve geliþtirmeleriniz için lütfen <a href="mailto:destek@yuregim.com" title="" class="mavi" >destek@yuregim.com</a> adresini kullanýnýz.</div>';
}