<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<? include('inc/oteldetayjs.php'); ?>
<? include('inc/title.php'); ?>
</head>

<body onload="test();">
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>

        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">
<?
$ay=date(m);
$arac=mysql_query("select * from araclar where arac_sef='$_GET[arac_sef]'");
while($aracveri = mysql_fetch_array($arac)) {
$arac_resim="rent/".$aracveri[arac_resim];
?>
				<div class="sol aracuzunbaslik ubuntu"><? echo $aracveri[arac_adi_tr]; ?></div>
				<div class="temizle sol" style="margin:0; width:790px" id="rezervasyon">
					<div class="sol tablo2" style="margin-bottom:10px">
						<div class="sol">
							<div class="sol resim"><a href="<? echo $siteurl; ?>/rentacar/<? echo $aracveri[arac_sef]; ?>.html"><img src="<? echo $siteurl; ?>/<? echo $arac_resim; ?>" alt="" /></a></div>
						</div>
						<div class="sol" style="width:260px">
							<div class="sol ozellikler ubuntu">Ara� �zellikleri</div>
							<div class="sol" style="font-size:14px">
							<div class="temizle sol " style="height:25px; margin-top:20px; margin-left:5px; width:100px">Ki�i Say�s�</div><div class="sol " style="height:25px; margin-top:20px; color:#cc0000">: X <? echo $aracveri[arac_kisi]; ?></div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:100px">Bagaj Say�s�</div><div class="sol " style="height:25px; color:#cc0000">: X <? echo $aracveri[arac_bagaj]; ?></div>
							<div class="temizle sol " style="height:25px; margin-left:5px; color:#cc0000"><img src="<? echo $siteurl; ?>/tema/icon_benzin.png" alt="" /> <? if($aracveri[arac_yakit]==0){ echo "Dizel"; } if($aracveri[arac_yakit]==1){ echo "Benzin"; } if($aracveri[arac_yakit]==2){ echo "LPG"; } ?></div>
							<div class="temizle sol " style="height:25px; margin-left:5px; color:#cc0000"><img src="<? echo $siteurl; ?>/tema/icon_klima.png" alt="" /> <? if($aracveri[arac_klima]==1){ echo "Klimal�"; } if($aracveri[arac_klima]==0){ echo "Klimas�z"; } ?></div>
							<div class="temizle sol " style="height:25px; margin-left:5px; color:#cc0000"><img src="<? echo $siteurl; ?>/tema/icon_vites.png" alt="" /> <? if($aracveri[arac_vites]==1){ echo "Manuel"; } if($aracveri[arac_vites]==0){ echo "Otomatik"; } ?></div>
							</div>
						</div>
						<div class="sol" style="width:255px">
							<div class="sol fiyatlandirma ubuntu"><span style="color:#cc0000"><? if($ay==01){ echo "Ocak"; } elseif($ay==02){ echo "�ubat"; } elseif($ay==03){ echo "Mart"; } elseif($ay==04){ echo "Nisan"; } elseif($ay==05){ echo "May�s"; } elseif($ay==06){ echo "Haziran"; } elseif($ay==07){ echo "Temmuz"; } elseif($ay==08){ echo "A�ustos"; } elseif($ay==09){ echo "Eyl�l"; } elseif($ay==10){ echo "Ekim"; } elseif($ay==11){ echo "Kas�m"; } elseif($ay==12){ echo "Aral�k"; } ?></span> Ay� i�in �cretlerimiz</div>
							<div class="sol" style="font-size:14px">
							<div class="temizle sol " style="height:25px; margin-top:10px; margin-left:5px; width:150px">1-3 G�n Aras�</div><div class="sol " style="height:25px; margin-top:10px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun1ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun1ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun1ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun1ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun1ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun1ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun1ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun1ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun1ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun1ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun1ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun1ay12]; } ?>.00 TL</div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:150px">4-7 G�n Aras�</div><div class="sol " style="height:25px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun2ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun2ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun2ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun2ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun2ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun2ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun2ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun2ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun2ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun2ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun2ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun2ay12]; } ?>.00 TL</div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:150px">8-15 G�n Aras�</div><div class="sol " style="height:25px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun3ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun3ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun3ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun3ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun3ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun3ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun3ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun3ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun3ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun3ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun3ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun3ay12]; } ?>.00 TL</div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:150px">16-21 G�n Aras�</div><div class="sol " style="height:25px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun4ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun4ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun4ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun4ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun4ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun4ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun4ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun4ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun4ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun4ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun4ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun4ay12]; } ?>.00 TL</div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:150px">22-28 G�n Aras�</div><div class="sol " style="height:25px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun5ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun5ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun5ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun5ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun5ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun5ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun5ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun5ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun5ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun5ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun5ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun5ay12]; } ?>.00 TL</div>
							<div class="temizle sol " style="height:25px; margin-left:5px; width:150px">29 + G�n Aras�</div><div class="sol " style="height:25px; color:#cc0000">: <? if($ay=='01'){ echo $fiyat1=$aracveri[gun6ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun6ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun6ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun6ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun6ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun6ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun6ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun6ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun6ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun6ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun6ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun6ay12]; } ?>.00 TL</div>
							</div>
						</div>
					</div>
<? if(!empty($_GET[kayit])){ 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO aracrezervasyon (cinsiyet,adisoyadi,eposta,telefon,giristarihi,cikistarihi,talep,odatipi,odasayisi,otel_id,alis_sehri,alis_yeri,donus_sehri,donus_yeri) ".
"VALUES('$cinsiyet','$adisoyadi','$email','$telefon','$startdate','$enddate','$talep','$odatipi','$odasayisi','$aracveri[arac_id]','$alis_sehri','$alis_yeri','$donus_sehri','$donus_yeri')");
?>
	<div class="mavitablo sol temizle ubuntu" style="margin-bottom:10px">Rezervasyon Olu�turuldu.</div>
<? } ?>
		<ul id="tabs" class="tabs">
			<li class="active"><a href="#description">Kiralama Ko�ullar�</a></li>
			<li><a href="#usage">Sezon Fiyatlar�</a></li>
			<li><a href="#download">Rezervasyon</a></li>
		</ul>
		<div id="description" class="content text">
<p class="fontkalin" style="margin-top:0px">EHL�YET VE YA�</p>
Kirac�n�n kira s�zle�mesi s�ras�nda A,B,C,D grubu ara�lar i�in yerli veya ge�erli uluslararas� ehliyete sahip olmas� ve 20 ya��n� doldurmu� olmas� gerekmektedir.

<p class="fontkalin">K�RALAMA S�RES�</p>
En az 1 g�nd�r. Ayl�k veya y�ll�k kiralamalar i�in �zel fiyatlar uygulan�r.

<p class="fontkalin">F�YATLAR</p>
Fiyatlara ya�lama, bak�m, ���nc� �ah�slara kar�� (yasal poli�e s�n�rlar� i�inde) kasko dahildir. % 18 KDV (KDV) dahildir. Yak�t kiralayana aittir. �of�rl� servis ve terc�man rehber istek �zerine temin edilir. Port bagaj istek �zerine g�nl��� 4 &euro; EURO' ye kiralanabilir. 48 saat �nceden bildirmek �art�yla �ocuk koltu�u kiralanabilir, bebek koltu�u �creti g�nl�k 2 &euro; EURO'dur.

<p class="fontkalin">�DEME VE DEPOZ�T</p>
Ara� tesliminde nakit veya Kredi Kart� ile toplam kira bedeli tahsil edilir.<br />
Ge�erli pasaport ve u�u� bilgileri al�nan yurtd��� m��terilerimizden depozit al�nmaz. Sadece Istanbul icin 100 Euro depozito veya kredi karti silip depozito olarak al�n�r. Pasaportun olmamas� durumunda son �al��t���n�z i� yerinizi adresiniz ile birlikte belgelemeniz gerekmektedir.

<p class="fontkalin">S�GORTA</p>
T�m ara�lar�m�z 2011 ve 2011 model olup Full Rent A Car kaskoludur.<br />
Sitemizde belirtilen fiyatlara Kasko �creti dahildir.

<p class="fontkalin">TESL�M VE BIRAKMA</p>
Yapt���n�z rezervasyonun taraf�m�zdan onaylanmas� durumunda rezervasyon formunuzda belirtti�iniz yerde ve zamanda 7/24 Rent A Car sizi kar��lamak ve arac� teslim etmek mecburiyetindedir. 7/24 Rent A Car b�rolar�n�n bulundu�u yerlerde teslim b�rakma �cretsizdir. Bu kentlerde teslim b�rakma, �nceden haber vermek ko�ulu ile; otel, i�yeri, gar, liman vb. yerlere yap�labilir. 7/24 Rent A Car b�rolar�n�n bulunmad��� �ehirlerdeki ara� teslim ve iadelerinde ek masraf olarak teslim �creti uygulan�r.

<p class="fontkalin">TRAF�K CEZALARI</p>

Trafik cezalar� kiralayana aittir.<br />
Ara�lar�m�z yurtd���na ��kart�lamaz.

		</div>
		<div id="usage" class="content">
				<div class="sol fiyatlandirma ubuntu">
					<div class="sol" style="width:180px">Sezonlar</div>
					<div class="sol" style="width:90px; text-align:center">1-3 G�n</div>
					<div class="sol" style="width:90px; text-align:center">4-7 G�n</div>
					<div class="sol" style="width:90px; text-align:center">8-15 G�n</div>
					<div class="sol" style="width:90px; text-align:center">16-21 G�n</div>
					<div class="sol" style="width:90px; text-align:center">22-28 G�n</div>
					<div class="sol" style="width:90px; text-align:center">29+ G�n</div>
				</div>
				<div class="temizle sol" style="width:180px; margin-left:10px; margin-top:8px; color:#cc0000">Ocak</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun1ay1]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun2ay1]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun3ay1]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun4ay1]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun5ay1]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center; margin-top:8px;"><? echo $fiyat1=$aracveri[gun6ay1]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">�ubat</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay2]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay2]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay2]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay2]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay2]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay2]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Mart</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay3]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay3]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay3]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay3]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay3]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay3]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Nisan</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay4]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay4]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay4]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay4]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay4]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay4]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">May�s</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay5]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay5]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay5]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay5]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay5]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay5]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Haziran</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay6]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay6]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay6]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay6]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay6]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay6]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Temmuz</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay7]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay7]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay7]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay7]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay7]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay7]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">A�ustos</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay8]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay8]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay8]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay8]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay8]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay8]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Eyl�l</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay9]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay9]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay9]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay9]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay9]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay9]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Ekim</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay10]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay10]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay10]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay10]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay10]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay10]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Kas�m</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay11]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay11]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay11]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay11]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay11]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay11]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>

				<div class="temizle sol" style="width:180px; margin-left:10px; color:#cc0000">Aral�k</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun1ay12]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun2ay12]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun3ay12]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun4ay12]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun5ay12]; ?>.00 TL</div>
				<div class="sol" style="width:90px; text-align:center;"><? echo $fiyat1=$aracveri[gun6ay12]; ?>.00 TL</div>
				<div class="sol temizle" style="width:100%"><hr /></div>
		</div>
		<div id="download" class="content">
				<div class="sol fiyatlandirma ubuntu">Rezervasyon Formu</div>
			<form action="<? echo $siteurl."/rentacar/".$aracveri[arac_sef].".html-kayitolusturuldu"; ?>" method="post" id="formID">
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Al�� �ehri</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="alis_sehri">
<?
$sehirler=mysql_query("select * from sehirler order by sehir_id asc");
while($sehirlerveri = mysql_fetch_array($sehirler)) {
?>
        	     	<option value="<? echo $sehirlerveri[il_adi]; ?>" <? if($siteayarlarveri[varsayilan_sehir]==$sehirlerveri[sehir_id]){ echo ' selected="selected"'; }?>><? echo $sehirlerveri[il_adi]; ?></option>
<? } ?></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Al�� Yeri</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="alis_yeri">
						<?
						    $bul2 = mysql_query("select * from yerler order by yer_adi_tr asc");
							while ($goster2 = mysql_fetch_object($bul2)){
						?>
						<option value="<? echo $goster2->yer_adi_tr; ?>"><? echo $goster2->yer_adi_tr; ?></option>
						<? } ?></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">D�n�� �ehri</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="donus_sehri">
<?
$sehirler=mysql_query("select * from sehirler order by sehir_id asc");
while($sehirlerveri = mysql_fetch_array($sehirler)) {
?>
        	     	<option value="<? echo $sehirlerveri[il_adi]; ?>" <? if($siteayarlarveri[varsayilan_sehir]==$sehirlerveri[sehir_id]){ echo ' selected="selected"'; }?>><? echo $sehirlerveri[il_adi]; ?></option>
<? } ?></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">D�n�� Yeri</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="donus_yeri">
						<?
						    $bul2 = mysql_query("select * from yerler order by yer_adi_tr asc");
							while ($goster2 = mysql_fetch_object($bul2)){
						?>
						<option value="<? echo $goster2->yer_adi_tr; ?>"><? echo $goster2->yer_adi_tr; ?></option>
						<? } ?></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Cinsiyet</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="cinsiyet"><option>Bay</option><option>Bayan</option></select></span></div>

			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Ad�n�z Soyad�n�z</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="isim" name="adisoyadi" class="validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Telefon Numaran�z</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="telefon" name="telefon" class="validate[required,custom[phone]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">E-Mail Adresiniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="email" name="email" class="validate[required,custom[email]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Talepleriniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><textarea name="talep" style="width:400px; resize:none; height:100px; font-family:arial; background:#fefefe; border-radius:5px; border:1px solid #ccc;" cols="45" rows="5"></textarea></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Al�� Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="startdate" name="startdate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">�ade Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="enddate" name="enddate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;"></div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px"></span> <span style="display:block; margin-top:2px; margin-left:5px" class="sol"><input type="submit" class="fontkalin" value="Rezervasyonu Kaydet" style="width:250px; height:30px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" /></span></div>
			</form>
				</div>

		</div>






<? } ?>


            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>


</body>
</html>
