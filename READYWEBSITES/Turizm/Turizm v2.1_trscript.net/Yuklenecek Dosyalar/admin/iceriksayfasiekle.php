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
                    <div class="sol solbaslik fontkalin">��ER�K SAYFASI EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) {
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$icerik_sef=permayap($icerik_adi_tr).".html";
$ekle=mysql_query("INSERT INTO icerik (icerik_adi_tr,icerik_adi_en,icerik_adi_de,icerik_adi_fr,icerik_adi_ru,icerik_aciklama_tr,icerik_aciklama_en,icerik_aciklama_de,icerik_aciklama_fr,icerik_aciklama_ru,icerik_sef,sabit_id) ".
"VALUES('$icerik_adi_tr','$icerik_adi_en','$icerik_adi_de','$icerik_adi_ru','$icerik_adi_fr','$icerik_aciklama_tr','$icerik_aciklama_en','$icerik_aciklama_de','$icerik_aciklama_fr','$icerik_aciklama_ru','$icerik_sef','$_GET[sabit_id]')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">��erik Sayfas� Eklendi</div>';

}?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">T�rk�e</a></li>
                    <li><a href="#EN">�ngilizce</a></li>
                    <li><a href="#DE">Almanca</a></li>
                    <li><a href="#RU">Rus�a</a></li>
                    <li><a href="#FR">Frans�zca</a></li>
                </ul>
<form action="iceriksayfasiekle.php?ekle=ekle&sabit_id=<? echo $_GET[sabit_id]; ?>" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ad�</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="icerik_adi_tr"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa A��klamas�</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="icerik_aciklama_tr"></textarea></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ad�</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="icerik_adi_en"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa A��klamas�</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="icerik_aciklama_en"></textarea></div>
                </div>
                <div id="DE" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/de.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ad�</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="icerik_adi_de"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/de.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa A��klamas�</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="icerik_aciklama_de"></textarea></div>
                </div>
                <div id="RU" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/ru.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ad�</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="icerik_adi_ru"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/ru.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa A��klamas�</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="icerik_aciklama_ru"></textarea></div>
                </div>
                <div id="FR" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/fr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ad�</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="icerik_adi_fr"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/fr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa A��klamas�</span></div>
					<div class="temizle sol"><textarea style="width:685px" name="icerik_aciklama_fr"></textarea></div>
                </div>
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
