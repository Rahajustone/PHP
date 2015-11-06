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


$sonuc=mysql_query("UPDATE oteller set oteladi_tr='$_POST[oteladi_tr]',otel_yemek_en='$otel_yemek_en',otel_yemek_tr='$otel_yemek_tr',cocuk2='$cocuk2',cocuk1='$cocuk1',konaklama_id='$konaklama_id',otel_havaalani='$otel_havaalani',otel_merkez='$otel_merkez',otel_deniz='$otel_deniz',otel_yildiz='$otel_yildiz',otel_il_id='$otel_il_id',otel_bolge_id='$otel_bolge',otel_aciklama_en='$otel_aciklama_en',otel_aciklama_tr='$otel_aciklama_tr',oteladi_en='$oteladi_en' where otel_id='$_GET[otel_id]'");

echo '<div class="sol list4 fontkalin" style="background:#fff;">Otel Güncellendi</div>';

}
$otel=mysql_query("select * from oteller where otel_id='$_GET[otel_id]'");
$otelveri = mysql_fetch_array($otel);
?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<form action="otelguncelle.php?ekle=ekle&otel_id=<? echo $_GET[otel_id]; ?>" method="post" enctype="multipart/form-data">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oteladi_tr" value="<? echo $otelveri[oteladi_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_aciklama_tr"><? echo $otelveri[otel_aciklama_tr]; ?></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Yemek Konsepti</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_yemek_tr"><? echo $otelveri[otel_yemek_tr]; ?></textarea></div>

                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oteladi_en" value="<? echo $otelveri[oteladi_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_aciklama_en"><? echo $otelveri[otel_aciklama_en]; ?></textarea></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Otel Yemek Konsepti</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="otel_yemek_en"><? echo $otelveri[otel_yemek_en]; ?></textarea></div>
                </div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Tatil Bölgesi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="otel_bolge" style="width:300px">
<?
$konaklama=mysql_query("select * from ilceler order by ilce_adi_tr asc");
while($konaklamaveri = mysql_fetch_array($konaklama)) {
?>   
							<option value="<? echo $konaklamaveri[ilce_id]; ?>" <? if($konaklamaveri[otel_bolge_id]==$otelveri[ilce_id]){ echo "selected"; }?>><? echo $konaklamaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Konaklama Türü</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="konaklama_id" style="width:300px">
<?
$konaklamaturu=mysql_query("select * from konaklama order by konaklama_adi_tr asc");
while($konaklamaturuveri = mysql_fetch_array($konaklamaturu)) {
?>   
							<option value="<? echo $konaklamaturuveri[konaklama_id	]; ?>" <? if($konaklamaturuveri[konaklama_id]==$otelveri[konaklama_id]){ echo "selected"; }?>><? echo $konaklamaturuveri[konaklama_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Yıldız Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="otel_yildiz" style="width:300px">
							<option value="0" <? if($otelveri[otel_yildiz]=='0'){ echo "selected"; }?>>Apart Otel</option>
							<option value="2" <? if($otelveri[otel_yildiz]=='2'){ echo "selected"; }?>>2 Yıldız</option>
							<option value="3" <? if($otelveri[otel_yildiz]=='3'){ echo "selected"; }?>>3 Yıldız</option>
							<option value="4" <? if($otelveri[otel_yildiz]=='4'){ echo "selected"; }?>>4 Yıldız</option>
							<option value="5" <? if($otelveri[otel_yildiz]=='5'){ echo "selected"; }?>>5 Yıldız</option>
							<option value="6" <? if($otelveri[otel_yildiz]=='6'){ echo "selected"; }?>>6 Yıldız</option>
							<option value="7" <? if($otelveri[otel_yildiz]=='7'){ echo "selected"; }?>>7 Yıldız</option>
						</select>
					</div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">1.Çoçuk (00-07,v.b.)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="cocuk1" value="<? echo $otelveri[cocuk1]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">2. Çoçuk (00-03,v.b.)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="cocuk2" value="<? echo $otelveri[cocuk2]; ?>"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_deniz" value="<? echo $otelveri[otel_deniz]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Merkeze Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_merkez" value="<? echo $otelveri[otel_merkez]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Havaalanı Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_havaalani" value="<? echo $otelveri[otel_havaalani]; ?>"></div>
				<input type="submit" value="Oteli Güncelle" />
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
