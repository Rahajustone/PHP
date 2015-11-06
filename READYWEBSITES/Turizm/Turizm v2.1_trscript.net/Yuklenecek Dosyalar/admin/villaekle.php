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
                    <div class="sol solbaslik fontkalin">VİLLA EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) {
foreach($_POST AS $key => $value) {
${$key} = $value;
}

$villa_sef2=permayap($villaadi_tr).".html";

$sefkontrol=mysql_query("select * from villalar where villa_sef='$villa_sef2'");
$sefkontrolveri = mysql_fetch_array($sefkontrol);
if(!empty($sefkontrolveri[villa_sef])){
$villa_sef=permayap($villaadi_tr)."-2.html";
}
else {
$villa_sef=permayap($villaadi_tr).".html";
}

$bolge=mysql_query("select * from villailceler where ilce_id='$villa_bolge'");
$bolgeveri = mysql_fetch_array($bolge);

$bolge2=mysql_query("select * from villailler where il_id='$bolgeveri[il_id]'");
$bolge2veri = mysql_fetch_array($bolge2);
$villa_il_id=$bolge2veri[il_id];





	$pos = strpos($_FILES['villa_resim']['name'],"php");
	$pos2 = strpos($_FILES['villa_resim']['name'],"php3");
	$pos3 = strpos($_FILES['villa_resim']['name'],"exe");
	$pos4 = strpos($_FILES['villa_resim']['name'],"asp");
	$pos5 = strpos($_FILES['villa_resim']['name'],"php4");
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
		if ($_FILES['villa_resim']['type'] != "image/gif" && 
		$_FILES['villa_resim']['type'] != "image/jpeg" && 
		$_FILES['villa_resim']['type'] != "image/pjpeg" && 
		$_FILES['villa_resim']['type'] != "image/png"){ 
			echo '<div class="sol list4 fontkalin" style="background:#fff;">Dosya formatınız yanlış</div>';
		} else { 
		if($_FILES['villa_resim']['type'] == "image/gif") $uzanti=".gif"; 
		elseif($_FILES['villa_resim']['type'] == "image/jpeg") $uzanti=".jpeg"; 
		elseif($_FILES['villa_resim']['type'] == "image/pjpeg") $uzanti=".jpg"; 
		elseif($_FILES['villa_resim']['type'] == "image/png") $uzanti=".png"; 
		$resim=$_FILES['villa_resim']['name']; 
		$uzanti=substr_replace($resim,"",0,-3); 
		$isim=md5(rand(9,99999)); 
		$yeniisim=$isim.".".$uzanti; 
		$resim=$yeniisim; 
		move_uploaded_file($_FILES['villa_resim']['tmp_name'], "../oteller/".$yeniisim); 
$ekle=mysql_query("INSERT INTO villalar (villaadi_tr,villaadi_en,villa_il_id,villa_aciklama_tr,villa_aciklama_en,villa_resim,villa_bolge_id,villa_deniz,villa_merkez,villa_havaalani,villa_sef,kapasite,villa_title_tr,villa_title_en,villa_fiyatdahil_tr,villa_fiyatdahildegil_tr,villa_fiyatdahildegil_en,villa_fiyatdahil_en,villa_oda,villa_yatak,villa_banyo,villa_restaurant,villa_market,villa_supermarket,villa_ozelhavuz,villa_denizesifir,villa_ortakhavuz,villa_luksev,villa_balayi,villa_evcilhayvan) ".
"VALUES('$villaadi_tr','$villaadi_en','$villa_il_id','$villa_aciklama_tr','$villa_aciklama_en','$resim','$bolgeveri[ilce_id]','$villa_deniz','$villa_merkez','$villa_havaalani','$villa_sef','$kapasite','$villaadi_tr','$villaadi_en','$villa_fiyatdahil_tr','$villa_fiyatdahildegil_tr','$villa_fiyatdahildegil_en','$villa_fiyatdahil_en','$villa_oda','$villa_yatak','$villa_banyo','$villa_restaurant','$villa_market','$villa_supermarket','$villa_ozelhavuz','$villa_denizesifir','$villa_ortakhavuz','$villa_luksev','$villa_balayi','$villa_evcilhayvan')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Villa Eklendi</div>';
		} 
	}







}
?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<form action="villaekle.php?ekle=ekle" method="post" enctype="multipart/form-data">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villaadi_tr"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_aciklama_tr"></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahil_tr"></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olmayanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahildegil_tr"></textarea></div>


                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">

					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villaadi_en"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_aciklama_en"></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahil_en"></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olmayanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahildegil_en"></textarea></div>


                </div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Villa Tatil Bölgesi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_bolge" style="width:300px">
<?
$konaklama=mysql_query("select * from villailceler order by ilce_adi_tr asc");
while($konaklamaveri = mysql_fetch_array($konaklama)) {
?>   
							<option value="<? echo $konaklamaveri[ilce_id]; ?>"><? echo $konaklamaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Kapasite</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="kapasite" style="width:300px">  
							<option value="1">1 Kişilik</option>
							<option value="2">2 Kişilik</option>
							<option value="3">3 Kişilik</option>
							<option value="4">4 Kişilik</option>
							<option value="5">5 Kişilik</option>
							<option value="6">6 Kişilik</option>
							<option value="7">7 Kişilik</option>
							<option value="8">8 Kişilik</option>
							<option value="9">9 Kişilik</option>
							<option value="10">10 Kişilik</option>
							<option value="11">11 Kişilik</option>
							<option value="12">12+ Kişilik</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Oda Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_oda" style="width:300px">  
							<option value="1">1 Oda</option>
							<option value="2">2 Oda</option>
							<option value="3">3 Oda</option>
							<option value="4">4 Oda</option>
							<option value="5">5 Oda</option>
							<option value="6">6 Oda</option>
							<option value="7">7 Oda</option>
							<option value="8">8 Oda</option>
							<option value="9">9 Oda</option>
							<option value="10">10 Oda</option>
							<option value="11">11 Oda</option>
							<option value="12">12+ Oda</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Yatak Odası Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_yatak" style="width:300px">  
							<option value="1">1 Yatak Odası</option>
							<option value="2">2 Yatak Odası</option>
							<option value="3">3 Yatak Odası</option>
							<option value="4">4 Yatak Odası</option>
							<option value="5">5 Yatak Odası</option>
							<option value="6">6 Yatak Odası</option>
						</select>
					</div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Banyo Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_banyo" style="width:300px">  
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_deniz"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Merkeze Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_merkez"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Havaalanı Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_havaalani"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Restaurant Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_restaurant"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Market Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_market"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Süpermarket Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_supermarket"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Özel Havuz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_ozelhavuz" value="1" /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Sıfır</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_denizesifir" value="1" /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Ortak Havuz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_ortakhavuz" value="1" /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Lüks Ev</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_luksev" value="1" /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Balayı Evleri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_balayi" value="1" /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Evcil Hayvan Gelebilir</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_evcilhayvan" value="1" /></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Resim</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="file" name="villa_resim"></div>
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
