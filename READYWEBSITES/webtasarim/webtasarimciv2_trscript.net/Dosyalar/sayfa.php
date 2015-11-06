<?php
session_start();
ob_start();
error_reporting(0);
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
include('library/Elkatek_Connection.php');
include('library/guvenlik.php');
include('library/functions.php');
include('library/sayfa.php');
include('library/seo.php');
include('library/case.php');
$sec   =  new Yeniyol_Guvenlik();
$pages =  new Pager_Yeniyol();
$fonks =  new yeniyol();
$mains =  new icerik_yonetimi();
$fonks -> lang(intval($_GET['dil']),strip_tags($_GET['url']));
$fonks -> home_lang('library/lang/');
$page  =  $sec->metin($_GET['ym']);
$incs  =  $mains->icerik($page,$sec->sayi($_GET['id']));
$cont  =  $fonks->data_yaz('adres,tel,fax,eposta,sanal','ayarlar','');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $incs['title']; ?></title>
<meta name="description" content="<?php echo $incs['desc']; ?>" />
<meta name="keywords" content="<?php echo $incs['keyw']; ?>" />
<base href="<?php echo ELKATEK_ROOT; ?>" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/eyapim.css" rel="stylesheet" type="text/css" />
<link href="css/mobil.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<link href="css/auto.css" rel="stylesheet" type="text/css" />
<link href="css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="css/gallery.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/jcarousellite.js"></script>
<script type="text/javascript" src="js/basket.js"></script>
<script src="js/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="js/gallery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/form_valid.js"></script>
<script type="text/javascript" src="js/elkatek.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35134792-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>
<?php $fonks -> arama($_POST['ara']); ?>
<div class="solust"></div>
<div class="sagust"></div>
<div id="elkatek">
	<div id="top_area">
        <div id="header">
        	<div id="logo"><a href="anasayfa"><img boyd=""<img border="0"
onmouseout="this.src='images/logo.png';" onmouseover="this.src='images/logo22.png';" alt="" src="images/logo.png" /></a></div>
        	<div id="right">
            	<div id="sepet">
                	<span class="s1">
					<div id="basketTitleWrap"></div>
					<a href="sepet"><?php echo SEPET1; ?>  <strong><span id="basketItemsWrap"><?php echo $fonks->sepet($sessionID); ?></span></strong>  <?php echo SEPET2; ?></a>
                    </span>

                    </span>
				<div class="sepet-maske"><a href="sepet"><img src="images/sepet-maske.png" /></a></div>
                </div>
                <div class="clear"></div>
                <div id="menu">
                    <a href="webtasarim" <?php echo $fonks->menu(2,$incs['aktif'],'class="active"','class="m1"');?>><?php echo MENU1;?></a>
                    <a class="ayrac"></a>
                    <a href="hizmet" <?php echo $fonks->menu(3,$incs['aktif'],'class="active"','class="m1"'); ?>><?php echo MENU2; ?></a>
                    <a class="ayrac"></a>
                    <a href="urunler/" <?php echo $fonks->menu(8,$incs['aktif'],'class="active"','class="m1"'); ?>><?php echo MENU3; ?></a>
                    <a class="ayrac"></a>
                    <a href="kariyer" <?php echo $fonks->menu(5,$incs['aktif'],'class="active"','class="m1"'); ?>><?php echo MENU5; ?></a>
                    <a class="ayrac"></a>
                    <a href="iletisim" <?php echo $fonks->menu(6,$incs['aktif'],'class="active"','class="m1"'); ?>><?php echo MENU6; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear">
<!-- SLİDER -->
<?php $fonks->banner($incs['aktif']); ?>
<!-- SLİDER -->
<div class="clear"></div>
<div id="shadow"></div>
<div class="clear"></div>
<div id="content">
<div class="clear"></div>
<?php include($incs['icerik']); ?>
<div class="clear"></div>
    <div id="referans">

        <div class="clear"></div>
        <div id="reflist">
          <ul>

         </ul>
      </div>
    </div>
    
</div>
<div class="clear"></div>
<div id="footer">
	<div id="center">
		<div id="f1"></div>
    <div id="map">
    	<div id="menus">
        	<ul class="map1">
            	<li class="baslik"><img src="images/webci.png" /> Webtasarim</li>
				<?php $fonks->footer_link('icerik',1,'webtasarim'); ?>
            </ul>
            <ul class="map2">
            	<li class="baslik"><img src="images/webci.png" /> <?php echo FMENU2; ?></li>
					<?php $fonks->footer_link('icerik',2,'hizmet'); ?>
            </ul>
            <ul class="map3">
            	<li class="baslik"><img src="images/webci.png" /> <?php echo FMENU3; ?></li>
				 <?php $fonks->footer_link('icerik',3,'teknik'); ?>
                <li><a href="urun/311/premium-hosting-paket"><img src="images/ok.png" align="absmiddle"/> Premium Paket</a></li>
				<li><a href="urun/312/profesyonel-hosting-paket"><img src="images/ok.png" align="absmiddle"/> Profesyonel Paket</a></li>
				<li><a href="urun/313/premium-hosting-paket"><img src="images/ok.png" align="absmiddle"/> Standart Paket</a></li>
				<li><a href="urun/314/premium-hosting-paket"><img src="images/ok.png" align="absmiddle"/> Basit Paket</a></li>
            </ul>
            <ul class="map4">
            	<li class="baslik"><img src="images/webci.png" /> <?php echo FMENU4; ?></li>
                <?php $fonks->footer_link('icerik',4,'kariyer'); ?>
                <li><a href="basvuru-formu"><img src="images/ok.png" align="absmiddle"/> <?php echo IS_BASVURUSU; ?></a></li>
            </ul>
            <ul class="map5">
            	<li class="baslik"><img src="images/webci.png" /> <?php echo FMENU5; ?></li>
                <li><a href="iletisim"><img src="images/ok.png" align="absmiddle"/> <?php echo ILETISIM_BILGILERI; ?></a></li>
                <li><a href="iletisim-formu"><img src="images/ok.png" align="absmiddle"/> <?php echo ILETISIM_FORMU; ?></a></li>
            </ul>
          <div class="clear"></div>
         <div id="band">
            <div id="elkatek_info">
            <span class="copy">© <?php echo date("Y"); ?>  <?php echo COPY; ?></span><br />
            <span><?php echo $cont['adres']; ?></span><br />
            <span><a class="tel"><?php echo $cont['tel']; ?></a><a class="fax"><?php echo $cont['fax']; ?></a> <a class="mail"><?php echo $cont['eposta']; ?></a></span>
            <div class="clear"></div>
            </div>
            <div id="eyapim"><a href="http://www.eyapim.com" title="web tasarım" target="_blank"><img src="images/eyapim.png" /></a></div>
			
			<div class="ortalogo"><img src="images/ortalogo.png"></div>
			<div class="bulten1">Bülten Aboneligi</div>
			<div class="sosyalag">Bizi Takip Edin!</div>
			<div class="facebook1"><a href="https://www.facebook.com/eyapimweb" title="web tasarım" target="_blank"><img src="images/facebook1.png" /></a></div>
			<div class="twitter1"><a href="https://twitter.com/eyapimweb" title="web tasarım" target="_blank"><img src="images/twitter1.png" /></a></div>
			<div class="google1"><a href="http://www.google.com.tr" title="web tasarım" target="_blank"><img src="images/google1.png" /></a></div>
			<div class="rss1"><a href="#" title="web tasarım" target="_blank"><img src="images/rss1.png" /></a></div>

            <div class="clear"></div>
			
			      </div>  
                      <div class="inputs">
               		 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 0px;" alt="upArrow" />
                        <div class="suggestionList" id="autoSuggestionsList"></div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="c3b">
            <div id="bulten_sonuc"></div>
                <form name="bultens" id="bultens" action="" method="post" onsubmit="return false;">
                	<div class="inputb">
                    <input type="text" id="ekayit" name="ekayit" onfocus="if (this.value=='<?php echo BULTEN_INPUT; ?>') this.value='';return;" onblur="if (this.value=='') this.value='<?php echo BULTEN_INPUT; ?>';return;" value="<?php echo BULTEN_INPUT; ?>"/>
                    <img src="images/sb.png" onclick="bulten_kayit();" />
         </div>   
      </div>
    </div>
</div>   
</div>
</body>
</html>
<?php
ob_end_flush();
?>