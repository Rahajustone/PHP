<?php
ob_start();
session_start();
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
define('ELKATEK_ELEKTRONIK_Panel-Content',false);
include_once("../library/Elkatek_Connection.php");
include_once("library/guvenlik.php");
include_once("library/sayfa.php");
include_once("library/resim.php");
include_once('library/dosya.php');
include_once("library/functions.php");
include_once("library/case.php");
include_once 'editor/ckeditor.php' ;
require_once 'ckfinder/ckfinder.php' ;
$eretna   = new Eretna_Guvenlik();
$eresim   = new Eretna_Resim();
$dosya    = new Eretna_Dosya();
$islem    = new Eretna_Araclar();
$ckeditor = new CKEditor();
$include= Eretna_Icerik($_GET['page']);
$ckeditor->basePath    = 'ckeditor/' ;
CKFinder::SetupCKEditor( $ckeditor, 'ckfinder/' ) ;
$config['height'] = '200';
$config['width'] = '98%';
if($_GET['exit']=='ok') { session_destroy(); header("Location: index.php"); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eyapim Kontrol Paneli</title>
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>
<link rel="stylesheet" href="css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize-light.css" type="text/css"/>
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" /><![endif]-->	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.idtabs.js"></script>
<script type="text/javascript" src="js/jquery.datatables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker2" ).datepicker();
				
	});
	function mesaj(mesaj,url) {
		$(document).ready(function(){
			var answer = confirm(mesaj)
			if (answer){ window.location.href=url; } else { return false;}
		});
	}	
	</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="editor/ckeditor.js"></script>
<script src="editor/_samples/sample.js" type="text/javascript"></script>

<script language="javascript">
function sil_kontrol(eid) {
if(!eid){ var eid = "Silmek istediğinizden eminmisiniz";}
if (confirm(eid)) {
return (true);
} else {
return (false);
}} 
</script>
</head>
<body>
<?php if($_SESSION['Elkatek_ELK_YENIYOL']==md5('ELK_YYM_TRUE')) { include_once("panel.php"); } else { include_once("login.php"); } ?> 
</body>
</html>
<?php
ob_end_flush();
$baglan->kapat();
?>