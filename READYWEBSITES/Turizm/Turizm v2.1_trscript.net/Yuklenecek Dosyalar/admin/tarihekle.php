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
<title>Otel Y�netim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">TAR�H ARALI�I EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
	foreach($_POST AS $key => $value) {
	${$key} = $value;
	}
$ekle=mysql_query("INSERT INTO tarih_araligi (tarih_alis_gun,tarih_alis_ay,tarih_donus_gun,tarih_donus_ay,oda_tipi_id,tarih_ucret) ".
"VALUES('$tarih_alis_gun','$tarih_alis_ay','$tarih_donus_gun','$tarih_alis_ay','$_GET[oda_tipi_id]','$tarih_ucret')");

$odatipleri=mysql_query("select * from tarih_araligi order by tarih_id desc");
$odatipleriveri = mysql_fetch_array($odatipleri);

$yil=date(Y);

$giris_tarihi=$yil."-".$tarih_alis_ay."-".$tarih_alis_gun;

$t1_timestamp = mktime('0','0','0',$tarih_alis_ay,$tarih_donus_gun,$yil);  
$t2_timestamp = mktime('0','0','0',$tarih_alis_ay,$tarih_alis_gun,$yil); 

$gunsay = ($t1_timestamp - $t2_timestamp) / 86400;
$gun=ceil($gunsay);
$say=0;
while($gun>=$say){

list($y1,$a1,$g1) = explode("-",$giris_tarihi);  
$yenigun=$g1+01;


if($yenigun==1){ $gunozel='01'; }
elseif($yenigun==2){ $gunozel='02'; }
elseif($yenigun==3){ $gunozel='03'; }
elseif($yenigun==4){ $gunozel='04'; }
elseif($yenigun==5){ $gunozel='05'; }
elseif($yenigun==6){ $gunozel='06'; }
elseif($yenigun==7){ $gunozel='07'; }
elseif($yenigun==8){ $gunozel='08'; }
elseif($yenigun==9){ $gunozel='09'; }
else { $gunozel=$yenigun; }


$ekle=mysql_query("INSERT INTO stop_sale (tarih_id,tarih1,oda_tipi_id) ".
"VALUES('$odatipleriveri[tarih_id]','$giris_tarihi','$_GET[oda_tipi_id]')");


$giris_tarihi=$y1."-".$a1."-".$gunozel;

$say++;
}


echo '<div class="sol list4 fontkalin" style="background:#fff;">Tarih Aral��� Eklendi</div>';
}
?>

<form action="tarihekle.php?ekle=ekle&oda_tipi_id=<? echo $_GET[oda_tipi_id]; ?>" method="post">
					<div class="temizle sol inputadi fontkalin">
						<span class="sol" style="display:block; margin-left:0;">Giri� G�n / Ay</span>
					</div>
					<div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
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
							/
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
					</div>

					<div class="temizle sol inputadi fontkalin">
						<span class="sol" style="display:block; margin-left:0;">��k�� G�n</span>
					</div>
					<div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
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
					</div>

					<div class="temizle sol inputadi fontkalin">
						<span class="sol" style="display:block; margin-left:0;">�cret</span>
					</div>
					<div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<input type="text" name="tarih_ucret" />
					</div>



					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Ekle" style="width:110px" /></div>
</form>

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
