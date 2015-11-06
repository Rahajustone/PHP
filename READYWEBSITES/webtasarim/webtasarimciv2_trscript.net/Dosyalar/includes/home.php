<?php
include('library/kontrol.php');
$medya_sorgu=mysql_query("SELECT * FROM sabits");
$medya=mysql_fetch_assoc($medya_sorgu);
?>
<div class="cbg_top"></div>
    <div id="cbg">
    	<div id="c1">
        	<h3><?php echo BIZDEN_HABERLER; ?></h3>
             <div id="haberler">
                 <ul>
					<?php $fonks->haberler(); ?>	                 
                 </ul>
 			</div>
        </div>
        <div id="c2">
        	<h3><?php echo INDIRIMLI_URUNLER; ?></h3>
               <div id="indirim">
                 <ul>
					<?php $fonks->indirimli_urunler(); ?>
				</ul>
              </div> 	
            
        </div>
        <div id="c3">
            <div class="c3t">
			    <h1><?php echo ARAMA_ACIKLAMA1; ?></h1>
                <div class="clear"></div>
				<div class="icon1"></div>
				<div class="icon2"></div>
				<div class="icon3"></div>
				
			    <div class="cizgi"></div>
	            <div class="cizgi2"></div>
	            <div class="cizgi3"></div>
	            <div class="cizgi4"></div>
				
				 <div class="yazi1">Yeni Sunucu Sistemlerimizle Websiteleriniz Her Daim Güvenli ve Hizli isler.</div>
				 <div class="yazi2">Hosting Paketlerimizi Mutlaka inceleyin, Tüm Bütceye Uygun Paketlerimizden Yararlanin.</div>
				 <div class="yazi3">Hazir Websitelerimize Bir Göz Atin, %30 indirim ile Hemen Siteniz Kurulsun.</div>
				 
				
                	<div class="inputs">
               		 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 0px;" alt="upArrow" />
                        <div class="suggestionList" id="autoSuggestionsList"></div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="c3b">
                </form>            
            </div>
        </div>
        <div class="navi1"><a href="#" class="hn" onclick="return false;"></a><a href="#" class="hp" onclick="return false;"></a></div>
        <div class="navi2"><a href="#" class="in" onclick="return false;"></a><a href="#" class="ip" onclick="return false;"></a></div>
    </div>
	<div class="host-arka"></div>
	<div class="referans-arka">	
    <div class="clear"></div>
    <div id="medya">
    	<div class="med1">
		
 <div class="reklam-image"><img src="images/reklam-image.png" /></a></div>
 <div class="reklam-mobil"><img src="images/reklam-mobil.png" /></a></div>
  <div class="mobil"><img src="images/mobil.png" /></a></div>
	
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href=http://www.freshdesignweb.com/wp-content/themes/fv24/images/icon.ico />
    <link rel="stylesheet" type="text/css" href="elkatek.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<h1>HOSTiNG PAKETLERi</h1>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">

                <span class="right">

                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
            </header>       
     <!-- start header here-->
	<header>
<div id="fdw-pricing-table">
    <div class="plan plan1">
        <div class="header">Premium</div>
        <div class="price">59 TL</div>  
        <div class="monthly">AYLIK</div>      
        <ul>
            <li><b>10GB</b> Disk Alani</li>
            <li><b>100GB</b> Aylik Trafik</li>
            <li><b>20</b> E-Posta Hesabi</li>
			<li><b>Limitsiz</b> Subdomain</li>			
        </ul>
        <a class="signup" href="urun/311/premium-hosting-paket">Sipariş ver</a>         
    </div>
    <div class="plan plan2 popular-plan">
        <div class="header">Profesyonel</div>
        <div class="price">29 TL</div>
        <div class="monthly">AYLIK</div>  
        <ul>
            <li><b>5GB</b> Disk Alani</li>
            <li><b>50GB</b> Aylik Trafik</li>
            <li><b>10</b> E-Posta Hesabi</li>
			<li><b>Limitsiz</b> Subdomain</li>			
        </ul>
        <a class="signup" href="urun/312/profesyonel-hosting-paket">Sipariş ver</a>            
    </div>
    <div class="plan plan3">
        <div class="header">Standard</div>
        <div class="price">19 TL</div>
        <div class="monthly">AYLIK</div>
        <ul>
            <li><b>3GB</b> Disk Alani</li>
            <li><b>25GB</b> Aylik Trafik</li>
            <li><b>5</b> E-Posta Hesabi</li>
			<li><b>Limitsiz</b> Subdomain</li>			
        </ul>
        <a class="signup" href="urun/313/standart-hosting-paket">Sipariş ver</a>        
    </div>
    <div class="plan plan4">
        <div class="header">Basit</div>
        <div class="price">9 TL</div>
        <div class="monthly">AYLIK</div>
        <ul>
            <li><b>1GB</b> Disk Alani</li>
            <li><b>10GB</b> Aylik Trafik</li>
            <li><b>2</b> E-Posta Hesabi</li>
			<li><b>Limitsiz</b> Subdomain</li>			
        </ul>
        <a class="signup" href="urun/314/basit-hosting-paket">Sipariş ver</a>        
    </div>
<div class="reklame">
<?php
error_reporting(0);
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
include('../library/Elkatek_Connection.php');
$sorgu=mysql_query("SELECT video FROM ayarlar LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);

echo stripslashes($yaz['video']);
?> 
</div>	
</div>
	</header><!-- end header -->   
</div>
</body>
</html>
			
        </div>
    </div>