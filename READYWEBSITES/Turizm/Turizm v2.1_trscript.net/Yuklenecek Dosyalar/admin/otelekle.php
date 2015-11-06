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
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">

	tinyMCE.init({

		// General options

		mode : "textareas",

		theme : "advanced",

		skin : "o2k7",

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",



		// Theme options

		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",

		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		theme_advanced_resizing : true,



		// Example word content CSS (should be your site CSS) this one removes paragraph margins

		content_css : "css/word.css",



		// Drop lists for link/image/media/template dialogs

		template_external_list_url : "lists/template_list.js",

		external_link_list_url : "lists/link_list.js",

		external_image_list_url : "lists/image_list.js",

		media_external_list_url : "lists/media_list.js",



		// Replace values for the template plugin

		template_replace_values : {

			username : "Some User",

			staffid : "991234"

		}

	});

</script>
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
                    <div class="sol solbaslik fontkalin">OTEL EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) {
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$otel_sef=permayap($oteladi_tr).".html";

$bolge=mysql_query("select * from ilceler where ilce_id='$otel_bolge'");
$bolgeveri = mysql_fetch_array($bolge);

$bolge2=mysql_query("select * from iller where il_id='$bolgeveri[il_id]'");
$bolge2veri = mysql_fetch_array($bolge2);
$otel_il_id=$bolge2veri[il_id];





	$pos = strpos($_FILES['otel_resim']['name'],"php");
	$pos2 = strpos($_FILES['otel_resim']['name'],"php3");
	$pos3 = strpos($_FILES['otel_resim']['name'],"exe");
	$pos4 = strpos($_FILES['otel_resim']['name'],"asp");
	$pos5 = strpos($_FILES['otel_resim']['name'],"php4");
	if (($pos !== false) or ($pos2 !== false) or ($pos3 !== false) or ($pos4 !== false) or ($pos5 !== false)) {
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}
$ip_adresi = GetIP();
$hacktarih=date("d.m.Y");
$ekle=mysql_query("INSERT INTO hack (ipadres,tarih) ".
"VALUES('$ip_adresi','$hacktarih')");
			echo '<div class="sol list4 fontkalin" style="background:#fff;">Sistemi hacklemeye çalıştığınız şüphesiyle. Ip adresin kayıtlarımıza alındı. Teşekkürler ilginiz için</div>';
	} 
	else {
		if ($_FILES['otel_resim']['type'] != "image/gif" && 
		$_FILES['otel_resim']['type'] != "image/jpeg" && 
		$_FILES['otel_resim']['type'] != "image/pjpeg" && 
		$_FILES['otel_resim']['type'] != "image/png"){ 
			echo '<div class="sol list4 fontkalin" style="background:#fff;">Dosya formatınız yanlış</div>';
		} else { 
		if($_FILES['otel_resim']['type'] == "image/gif") $uzanti=".gif"; 
		elseif($_FILES['otel_resim']['type'] == "image/jpeg") $uzanti=".jpeg"; 
		elseif($_FILES['otel_resim']['type'] == "image/pjpeg") $uzanti=".jpg"; 
		elseif($_FILES['otel_resim']['type'] == "image/png") $uzanti=".png"; 
		$resim=$_FILES['otel_resim']['name']; 
		$uzanti=substr_replace($resim,"",0,-3); 
		$isim=md5(rand(9,99999)); 
		$yeniisim=$isim.".".$uzanti; 
		$resim=$yeniisim; 
		move_uploaded_file($_FILES['otel_resim']['tmp_name'], "../oteller/".$yeniisim); 
$ekle=mysql_query("INSERT INTO oteller (oteladi_tr,oteladi_en,otel_aciklama_tr,otel_aciklama_en,otel_bolge_id,otel_il_id,otel_yildiz,otel_deniz,otel_merkez,otel_havaalani,otel_resim,otel_sef,konaklama_id,cocuk1,cocuk2,otel_yemek_tr,otel_yemek_en,otel_title_tr,otel_title_en,otel_keyword_tr,otel_keyword_en,otel_metatag_tr,otel_metatag_en) ".
"VALUES('$oteladi_tr','$oteladi_en','$otel_aciklama_tr','$otel_aciklama_en','$otel_bolge','$otel_il_id','$otel_yildiz','$otel_deniz','$otel_merkez','$otel_havaalani','$resim','$otel_sef','$konaklama_id','$cocuk1','$cocuk2','$otel_yemek_tr','$otel_yemek_en','$oteladi_tr','$oteladi_tr','$oteladi_tr','$oteladi_tr','$oteladi_tr','$oteladi_tr')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Otel Eklendi</div>';
		} 
	}







}
?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<form action="otelekle.php?ekle=ekle" method="post" enctype="multipart/form-data">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oteladi_tr"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_aciklama_tr"></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Yemek Konsepti</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_yemek_tr"></textarea></div>

                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oteladi_en"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_aciklama_en"></textarea></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Yemek Konsepti</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_yemek_en"></textarea></div>
                </div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Tatil Bölgesi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="otel_bolge" style="width:300px">
<?
$konaklama=mysql_query("select * from ilceler order by ilce_adi_tr asc");
while($konaklamaveri = mysql_fetch_array($konaklama)) {
?>   
							<option value="<? echo $konaklamaveri[ilce_id]; ?>"><? echo $konaklamaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Konaklama Türü</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="konaklama_id" style="width:300px">
<?
$konaklamaturu=mysql_query("select * from konaklama order by konaklama_adi_tr asc");
while($konaklamaturuveri = mysql_fetch_array($konaklamaturu)) {
?>   
							<option value="<? echo $konaklamaturuveri[konaklama_id	]; ?>"><? echo $konaklamaturuveri[konaklama_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Yıldız Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="otel_yildiz" style="width:300px">
							<option value="0">Apart Otel</option>
							<option value="2">2 Yıldız</option>
							<option value="3">3 Yıldız</option>
							<option value="4">4 Yıldız</option>
							<option value="5">5 Yıldız</option>
							<option value="6">6 Yıldız</option>
							<option value="7">7 Yıldız</option>
						</select>
					</div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">1.Çoçuk (00-07,v.b.)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="cocuk1"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">2. Çoçuk (00-03,v.b.)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="cocuk2"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_deniz"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Merkeze Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_merkez"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Havaalanı Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_havaalani"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Resim</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="file" name="otel_resim"></div>
				<input type="submit" value="Ekle" />
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
