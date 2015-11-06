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

$bolge=mysql_query("select * from villailceler where ilce_id='$villa_bolge'");
$bolgeveri = mysql_fetch_array($bolge);

$bolge2=mysql_query("select * from villailler where il_id='$bolgeveri[il_id]'");
$bolge2veri = mysql_fetch_array($bolge2);
$villa_il_id=$bolge2veri[il_id];




$sonuc=mysql_query("UPDATE villalar set villaadi_tr='$_POST[villaadi_tr]',villaadi_en='$villaadi_en',villa_il_id='$villa_il_id',villa_bolge_id='$villa_bolge',villa_aciklama_tr='$villa_aciklama_tr',villa_aciklama_en='$villa_aciklama_en',villa_deniz='$villa_deniz',villa_merkez='$villa_merkez',villa_havaalani='$villa_havaalani',kapasite='$kapasite',villa_fiyatdahil_tr='$villa_fiyatdahil_tr',villa_fiyatdahildegil_tr='$villa_fiyatdahildegil_tr',villa_fiyatdahildegil_en='$villa_fiyatdahildegil_en',villa_fiyatdahil_en='$villa_fiyatdahil_en',villa_oda='$villa_oda',villa_yatak='$villa_yatak',villa_banyo='$villa_banyo',villa_restaurant='$villa_restaurant',villa_market='$villa_market',villa_supermarket='$villa_supermarket',villa_ozelhavuz='$villa_ozelhavuz',villa_denizesifir='$villa_denizesifir',villa_ortakhavuz='$villa_ortakhavuz',villa_luksev='$villa_luksev',villa_balayi='$villa_balayi',villa_evcilhayvan='$villa_evcilhayvan' where villa_id='$_GET[villa_id]'");

echo '<div class="sol list4 fontkalin" style="background:#fff;">Villa Güncellendi</div>';

}
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);


?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<form action="villaguncelle.php?ekle=ekle&villa_id=<? echo $_GET[villa_id]; ?>" method="post" enctype="multipart/form-data">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villaadi_tr" value="<? echo $otelveri[villaadi_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_aciklama_tr"><? echo $otelveri[villa_aciklama_tr]; ?></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahil_tr"><? echo $otelveri[villa_fiyatdahil_tr]; ?></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olmayanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahildegil_tr"><? echo $otelveri[villa_fiyatdahildegil_tr]; ?></textarea></div>


                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">

					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villaadi_en" value="<? echo $otelveri[villaadi_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Villa Açıklaması</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_aciklama_en"><? echo $otelveri[villa_aciklama_en]; ?></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahil_en"><? echo $otelveri[villa_fiyatdahil_en]; ?></textarea></div>

					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Fiyatlara Dahil Olmayanlar</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="villa_fiyatdahildegil_en"><? echo $otelveri[villa_fiyatdahildegil_en]; ?></textarea></div>


                </div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Villa Tatil Bölgesi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_bolge" style="width:300px">
<?
$konaklama=mysql_query("select * from villailceler order by ilce_adi_tr asc");
while($konaklamaveri = mysql_fetch_array($konaklama)) {
?>   
							<option value="<? echo $konaklamaveri[ilce_id]; ?>" <? if($otelveri[villa_bolge]==$konaklamaveri[villa_bolge]){ echo 'selected="selected"'; } ?>><? echo $konaklamaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Kapasite</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="kapasite" style="width:300px">  
							<option value="1" <? if($otelveri[kapasite]==1){ echo 'selected="selected"'; } ?>>1 Kişilik</option>
							<option value="2" <? if($otelveri[kapasite]==2){ echo 'selected="selected"'; } ?>>2 Kişilik</option>
							<option value="3" <? if($otelveri[kapasite]==3){ echo 'selected="selected"'; } ?>>3 Kişilik</option>
							<option value="4" <? if($otelveri[kapasite]==4){ echo 'selected="selected"'; } ?>>4 Kişilik</option>
							<option value="5" <? if($otelveri[kapasite]==5){ echo 'selected="selected"'; } ?>>5 Kişilik</option>
							<option value="6" <? if($otelveri[kapasite]==6){ echo 'selected="selected"'; } ?>>6 Kişilik</option>
							<option value="7" <? if($otelveri[kapasite]==7){ echo 'selected="selected"'; } ?>>7 Kişilik</option>
							<option value="8" <? if($otelveri[kapasite]==8){ echo 'selected="selected"'; } ?>>8 Kişilik</option>
							<option value="9" <? if($otelveri[kapasite]==9){ echo 'selected="selected"'; } ?>>9 Kişilik</option>
							<option value="10" <? if($otelveri[kapasite]==10){ echo 'selected="selected"'; } ?>>10 Kişilik</option>
							<option value="11" <? if($otelveri[kapasite]==11){ echo 'selected="selected"'; } ?>>11 Kişilik</option>
							<option value="12" <? if($otelveri[kapasite]==12){ echo 'selected="selected"'; } ?>>12+ Kişilik</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Oda Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_oda" style="width:300px">  
							<option value="1" <? if($otelveri[villa_oda]==1){ echo 'selected="selected"'; } ?>>1 Oda</option>
							<option value="2" <? if($otelveri[villa_oda]==2){ echo 'selected="selected"'; } ?>>2 Oda</option>
							<option value="3" <? if($otelveri[villa_oda]==3){ echo 'selected="selected"'; } ?>>3 Oda</option>
							<option value="4" <? if($otelveri[villa_oda]==4){ echo 'selected="selected"'; } ?>>4 Oda</option>
							<option value="5" <? if($otelveri[villa_oda]==5){ echo 'selected="selected"'; } ?>>5 Oda</option>
							<option value="6" <? if($otelveri[villa_oda]==6){ echo 'selected="selected"'; } ?>>6 Oda</option>
							<option value="7" <? if($otelveri[villa_oda]==7){ echo 'selected="selected"'; } ?>>7 Oda</option>
							<option value="8" <? if($otelveri[villa_oda]==8){ echo 'selected="selected"'; } ?>>8 Oda</option>
							<option value="9" <? if($otelveri[villa_oda]==9){ echo 'selected="selected"'; } ?>>9 Oda</option>
							<option value="10" <? if($otelveri[villa_oda]==10){ echo 'selected="selected"'; } ?>>10 Oda</option>
							<option value="11" <? if($otelveri[villa_oda]==11){ echo 'selected="selected"'; } ?>>11 Oda</option>
							<option value="12" <? if($otelveri[villa_oda]==12){ echo 'selected="selected"'; } ?>>12+ Oda</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Yatak Odası Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_yatak" style="width:300px">  
							<option value="1" <? if($otelveri[villa_yatak]==1){ echo 'selected="selected"'; } ?>>1 Yatak Odası</option>
							<option value="2" <? if($otelveri[villa_yatak]==2){ echo 'selected="selected"'; } ?>>2 Yatak Odası</option>
							<option value="3" <? if($otelveri[villa_yatak]==3){ echo 'selected="selected"'; } ?>>3 Yatak Odası</option>
							<option value="4" <? if($otelveri[villa_yatak]==4){ echo 'selected="selected"'; } ?>>4 Yatak Odası</option>
							<option value="5" <? if($otelveri[villa_yatak]==5){ echo 'selected="selected"'; } ?>>5 Yatak Odası</option>
							<option value="6" <? if($otelveri[villa_yatak]==6){ echo 'selected="selected"'; } ?>>6 Yatak Odası</option>
						</select>
					</div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Banyo Sayısı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="villa_banyo" style="width:300px">  
							<option value="1" <? if($otelveri[villa_banyo]==1){ echo 'selected="selected"'; } ?>>1</option>
							<option value="2" <? if($otelveri[villa_banyo]==2){ echo 'selected="selected"'; } ?>>2</option>
							<option value="3" <? if($otelveri[villa_banyo]==3){ echo 'selected="selected"'; } ?>>3</option>
							<option value="4" <? if($otelveri[villa_banyo]==4){ echo 'selected="selected"'; } ?>>4</option>
							<option value="5" <? if($otelveri[villa_banyo]==5){ echo 'selected="selected"'; } ?>>5</option>
						</select>
					</div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_deniz" value="<? echo $otelveri[villa_deniz]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Merkeze Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_merkez" value="<? echo $otelveri[villa_merkez]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Havaalanı Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_havaalani" value="<? echo $otelveri[villa_havaalani]; ?>"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Restaurant Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_restaurant" value="<? echo $otelveri[villa_restaurant]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Market Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_market" value="<? echo $otelveri[villa_market]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Süpermarket Uzaklık</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_supermarket" value="<? echo $otelveri[villa_supermarket]; ?>"></div>

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Özel Havuz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_ozelhavuz" value="1" <? if($otelveri[villa_ozelhavuz]==1){ echo 'checked="checked"'; } ?> /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Denize Sıfır</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_denizesifir" value="1" <? if($otelveri[villa_denizesifir]==1){ echo 'checked="checked"'; } ?> /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Ortak Havuz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_ortakhavuz" value="1" <? if($otelveri[villa_ortakhavuz]==1){ echo 'checked="checked"'; } ?> /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Lüks Ev</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_luksev" value="1" <? if($otelveri[villa_luksev]==1){ echo 'checked="checked"'; } ?> /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Balayı Evleri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_balayi" value="1" <? if($otelveri[villa_balayi]==1){ echo 'checked="checked"'; } ?> /></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Evcil Hayvan Gelebilir</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="checkbox" name="villa_evcilhayvan" value="1" <? if($otelveri[villa_evcilhayvan]==1){ echo 'checked="checked"'; } ?> /></div>

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
