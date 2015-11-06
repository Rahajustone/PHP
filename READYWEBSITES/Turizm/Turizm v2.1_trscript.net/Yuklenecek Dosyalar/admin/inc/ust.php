    	<div class="sol" id="logo"><img src="tema/logo.png" alt="" /></div>
        <div class="sag" id="uyegirisi">
        <p style="color:#a2bacc">Hoþgeldiniz <span class="fontkalin">Yönetici</span></p>
        <p style="margin:10px 0; color:#78d4fe;"><a href="sifremidegistir.php">Þifremi Deðiþtir</a> | <a href="cikisyap.php">Çýkýþ Yap</a></p>
        <p style="margin:10px 0;"><a href="bekleyenrezervasyonlar.php" style="color:#9ef185">Bekleyen Rezervasyonlar</a></p>
        <p style="margin:30px 0 5px 0; color:#6f818e; font-size:10px">Saat : <? echo date(H.":".i); ?></p>
        <p style="margin:5px 0; color:#6f818e; font-size:10px">Ýp Adresiniz : <? echo $_SERVER['REMOTE_ADDR']; ?></p>
        </div>
        <?
  switch($page){
	  case "genelayarlar":
	  include 'genelayarlar.php';
	  break;
	  case "ftpayarlari":
	  include 'ftpayarlari.php';
	  break;
	  case "mailayarlari":
	  include 'mailayarlari.php';
	  break;
	    case "mailler":
	  include 'mailler.php';
	  break;
	      case "mailsil":
	  include 'mailsil.php';
	  break;
	    case "mailgoruntule":
	  include 'mailgoruntule.php';
	  break;
	  case "iletisimformu":
	  include 'iletisimformu.php';
	  break;
	  case "yoneticiayarlari":
	  include 'yoneticiayarlari.php';
	  break;
	  case "genelayarlarok":
	  include 'genelayarlarok.php';
	  break;
	  case "ftpayarlariok":
	  include 'ftpayarlariok.php';
	  break;
	  case "mailayarlariok":
	  include 'mailayarlariok.php';
	  break;
	  	  case "iletisimyonetimi":
	  include 'iletisimformu.php';
	  break;
	  case "iletisimyonetimiok":
	  include 'iletisimformuok.php';
	  break;
	  case "yoneticiayarlariok":
	  include 'yoneticiayarlariok.php';
	  break;
	  case "sayfalistesi":
	  include 'sayfalistesi.php';
	  break;
	  case "sayfaekleok":
	  include 'sayfaekleok.php';
	  break;
	    case "sayfaekle":
	  include 'sayfaekle.php';
	  break;
	    case "sayfaduzenleok":
	  include 'sayfaduzenleok.php';
	  break;
	    case "sayfaduzenle":
	  include 'sayfaduzenle.php';
	  break;
	  	  case "urunekle":
	  include 'urunekle.php';
	  break;
	  case "urunekleok":
	  include 'urunekleok.php';
	  break;
	  case "urunlistesi":
	  include 'urunlistesi.php';
	  break;
	  case "urunduzenle":
	  include 'urunduzenle.php';
	  break;
	  case "urunduzenleok":
	  include 'urunduzenleok.php';
	  break;
	  case "urunsil":
	  include 'urunsil.php';
	  break;
	  case "urunlerisil":
	  include 'urunlerisil.php';
	  break;
	  	  	     case "sliderekle":
	  include 'sliderekle.php';
	  break;
	     case "sliderlistesi":
	  include 'sliderlistesi.php';
	  break;
	     case "sliderekleok":
	  include 'sliderekleok.php';
	  break;
	  	  case "yoneticiduzenle":
	  include 'yoneticiduzenle.php';
	  break;
	  case "yduzenleok":
	  include 'yduzenleok.php';
	  break;
	  case "yoneticilistesi":
	  include 'yoneticilistesi.php';
	  break;
	    	  case "urnsil":
	  include 'urnsil.php';
	  break;
	    case "ajandagoruntule":
	  include 'ajandagoruntule.php';
	  break;
	  case "ajandaekle":
	  include 'ajandaekle.php';
	  break;
	  case "ajandaekleok":
	  include 'ajandaekleok.php';
	  break;
	   case "ajandasil":
	  include 'ajandasil.php';
	  break;
	  case "haberlistesi":
	  include 'haberlistesi.php';
	  break;
	  case "haberekle":
	  include 'haberekle.php';
	  break;
	  case "haberekleok":
	  include 'haberekleok.php';
	  break;
	  case "haberduzenle":
	  include 'haberduzenle.php';
	  break;
	  case "haberduzenleok":
	  include 'haberduzenleok.php';
	  break;
	  case "habersil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM haberler WHERE haberId = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Haber Silindi !');
window.location.href = 'index.php?page=haberlistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "iletisimsil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM iletisim WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Bilgiler Silindi !');
window.location.href = 'index.php?page=iletisimformu';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "mansetsil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM manset WHERE id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Manset Silindi !');
window.location.href = 'index.php?page=mansetlistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "slidersil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM slider WHERE id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Slider Resmi Silindi !');
window.location.href = 'index.php?page=sliderlistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "rkategorisil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM renkkategori WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Kategori Silindi !');
window.location.href = 'index.php?page=rkategorilistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;	  
	  case "resimekle":
	  include 'resimekle.php';
	  break;
	  case "resimekleok":
	  include 'resimekleok.php';
	  break;
	  case "resimlistesi":
	  include 'resimlistesi.php';
	  break;
	  case "resimsil":
       include 'resimsil.php';
	  break;
	  	  case "kategorisil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM kategoriler WHERE kategoriId = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Kategori Silindi !');
window.location.href = 'index.php?page=kategorilistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  case "blogsil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM blog WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Blog Silindi !');
window.location.href = 'index.php?page=bloglistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "yoneticisil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM yoneticiler WHERE id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Yonetici Silindi !');
window.location.href = 'index.php?page=yoneticilistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "mp3sil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM muzik WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Mp3 Silindi !');
window.location.href = 'index.php?page=mp3listesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "sayfasil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM icerikler WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Sayfa Silindi !');
window.location.href = 'index.php?page=sayfalistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "videosil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM videolar WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Video Silindi !');
window.location.href = 'index.php?page=videolistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>"; break;} ?>
<? include("jscripts/tiny_mce/plugins/media/player.php");?>
<?
switch($page){
	  	  case "epostasil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM eposta WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Mail Silindi !');
window.location.href = 'index.php?page=mailliste';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "smssil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM sms WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Numara Silindi !');
window.location.href = 'index.php?page=smsliste';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "renksilsil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM renkler WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Renk Silindi !');
window.location.href = 'index.php?page=renklistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;
	  	  case "albumsil":
	  $id = guvenlik($_GET['id']);
	  mysql_query("DELETE FROM album WHERE Id = '$id'");
	  echo "
<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Albüm Silindi !');
window.location.href = 'index.php?page=albumlistesi';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>
";
	  break;	  	  	  
	  case "hizmetcikart":
	  include 'hizmetcikart.php';
	  break;
	  case "kategoriekle":
	  include 'kategoriekle.php';
	  break;
	  case "kategoriekleok":
	  include 'kategoriekleok.php';
	  break;
	  case "kategorilistesi":
	  include 'kategorilistesi.php';
	  break;
	    case "kategoriduzenle":
	  include 'kategoriduzenle.php';
	  break;
	  case "kategoriduzenleok":
	  include 'kategoriduzenleok.php';
	  break;
	    case "manset":
	  include 'manset.php';
	  break;
	
	  case "blogekle":
	  include 'blogekle.php';
	  break;
	  case "blogekleok":
	  include 'blogekleok.php';
	  break;
	  case "bloglistesi":
	  include 'bloglistesi.php';
	  break;
	  case "blogduzenle":
	  include 'blogduzenle.php';
	  break;
	  case "blogduzenleok":
	  include 'blogduzenleok.php';
	  break;
	  case "mp3ekle":
	  include 'mp3ekle.php';
	  break;
	  case "mp3ekleok":
	  include 'mp3ekleok.php';
	  break;
	  case "mp3listesi":
	  include 'mp3listesi.php';
	  break;
	  case "videoekle":
	  include 'videoekle.php';
	  break;
	  case "videoekleok":
	  include 'videoekleok.php';
	  break;
	  case "videolistesi":
	  include 'videolistesi.php';
	  break;
	  case "mailliste":
	  include 'mailliste.php';
	  break;
	  case "smsliste":
	  include 'smsliste.php';
	  break;
	  case "mailgonder":
	  include 'mailgonder.php';
	  break;
	  case "smsgonder":
	  include 'smsgonder.php';
	  break;
	  case "mailgonderok":
	  include 'mailgonderok.php';
	  break;
	  case "rkategoriekle":
	  include 'rkategoriekle.php';
	  break;
	  case "rkategoriekleok":
	  include 'rkategoriekleok.php';
	  break;
	  case "rkategorilistesi":
	  include 'rkategorilistesi.php';
	  break;
	  case "renkekle":
	  include 'renkekle.php';
	  break;
	  case "renkekleok":
	  include 'renkekleok.php';
	  break;
	  case "renklistesi":
	  include 'renklistesi.php';
	  break;
	  case "albumekle":
	  include 'albumekle.php';
	  break;
	  case "albumekleok":
	  include 'albumekleok.php';
	  break;
	  case "albumlistesi":
	  include 'albumlistesi.php';
	  break;
	  case "cikis":
	  include 'cikis.php';
	  break;
	  
	  
	  
  }
  ?> 	
        <div class="sol temizle" id="menubar">
        	<div class="sol anasayfa fontkalin"><a href="index.php">Anasayfa</a></div>
        	<div class="sol menu fontkalin"><a href="rezervasyonlar.php">Rezervasyonlar</a></div>
        	<div class="sol menu fontkalin"><a href="otellistesi.php">Otel Listesi</a></div>
        	<div class="sol menu fontkalin"><a href="tatilbolgeleri.php">Tatil Bölgeleri</a></div>
        	<div class="sol menu fontkalin"><a href="rentacar.php">Rent A Car</a></div>
        	<div class="sol menu fontkalin"><a href="villalar.php">Villalar</a></div>
        	<div class="sol menu fontkalin"><a href="ayarlar.php">Ayarlar</a></div>
        	<div class="sol menu fontkalin"><a href="cikisyap.php">Çýkýþ Yap</a></div>
        </div>