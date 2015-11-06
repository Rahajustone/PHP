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
                    <div class="sol solbaslik fontkalin">VİLLA'NIN KİRALANMAYA AÇIK OLDUĞU TARİHLERİ EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}


$ekle=mysql_query("INSERT INTO villa_tarih_araligi (villa_id,tarih_alis_gun,tarih_alis_ay,tarih_donus_gun,tarih_donus_ay,tarih_yil) ".
"VALUES('$_GET[villa_id]','$tarih_alis_gun','$tarih_alis_ay','$tarih_donus_gun','$tarih_alis_ay','$tarih_yil')");


	echo '<div class="sol list4 fontkalin" style="background:#fff;">Rezervasyona Müsait Olan Tarih Aralığı Kaydedildi.</div>';

}
?>


<form action="villatarih.php?ekle=ekle&villa_id=<? echo $_GET[villa_id]; ?>" method="post" enctype="multipart/form-data">
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Başlangıç Gün</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="tarih_alis_gun" style="width:50px">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
						</select>
					</div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Bitiş Gün / Ay / Yıl</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="tarih_donus_gun" style="width:50px">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
						</select> 
						<select name="tarih_alis_ay" style="width:50px">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
						<select name="tarih_yil" style="width:80px">
							<option>2012</option>
							<option>2013</option>
							<option>2014</option>
						</select>
					</div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Tarih Aralığını Ekle" style="width:150px" /></div>
</form>
                  </div>
                </div>




                <div class="sol temizle" style="margin-top:10px">
                    <div class="sol solbaslik fontkalin">BU OTELİN MÜSAİT OLDUĞU TARİHLER</div>
                    <div class="sol alt">
<?
if(($_GET[sil]==sil) and !empty($_GET[villa_id])){
$silindi=mysql_query("DELETE FROM villa_tarih_araligi where tarih_id='$_GET[tarih_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Tarih Aralığı silindi.</div>';
}
?>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:610px">Tarih Aralığı</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from villa_tarih_araligi where villa_id='$_GET[villa_id]' order by tarih_alis_gun,tarih_alis_ay asc");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:610px"><? echo $ayarveri[tarih_alis_gun]; ?>.<? echo $ayarveri[tarih_alis_ay]; ?>.<? echo $ayarveri[tarih_yil]; ?> - <? echo $ayarveri[tarih_donus_gun]; ?>.<? echo $ayarveri[tarih_donus_ay]; ?>.<? echo $ayarveri[tarih_yil]; ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="villatarih.php?otel_id=<? echo $ayarveri[otel_id]; ?>&tarih_id=<? echo $ayarveri[tarih_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
<? $sayi++; } ?>
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
