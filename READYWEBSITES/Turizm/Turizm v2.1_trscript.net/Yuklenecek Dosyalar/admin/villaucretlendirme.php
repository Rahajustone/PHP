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
                    <div class="sol solbaslik fontkalin">TAR�H ARALI�I VE �CRETLEND�RME EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$tarih1=$tgun.".".$tay.".".$tyil;
$tarih2=$tgun2.".".$tay2.".".$tyil2;
$gtarih=$tyil."-".$tay."-".$tgun;
$ctarih=$tyil2."-".$tay2."-".$tgun2;
$ekle=mysql_query("INSERT INTO villa_fiyat (otel_oda_id,tarih1,tarih2,ucret,gtarih,ctarih,tay,villa_id) ".
"VALUES('$_GET[otel_oda_id]','$tarih1','$tarih2','$ucret','$gtarih','$ctarih','$tay2','$_GET[villa_id]')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Tarih Aral��� ve �cretlendirme Eklendi. <a href="villafiyatlandirma.php?villa_id='.$_GET[villa_id].'">Geri D�n</a></div>';
}
?>

<form action="villaucretlendirme.php?villa_id=<? echo $_GET[villa_id]; ?>&ekle=ekle" method="post">
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;">Giri� Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
                        <select name="tgun" >
                            <option>08</option>
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
                        <select name="tay" >
                            <option>04</option>
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
                        <select name="tyil" >
                            <option>2014</option>
                            <option>2015</option>
                        </select>
					</div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;">��k�� Tarihi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
                        <select name="tgun2" >
                            <option>08</option>
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
                        <select name="tay2" >
                            <option>04</option>
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
                        <select name="tyil2" >
                            <option>2014</option>
                            <option>2015</option>
                        </select>
					</div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;">G�nl�k �cret</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="ucret" style="border:1px solid #444; width:50px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Ekle" style="width:150px" /></div>
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
