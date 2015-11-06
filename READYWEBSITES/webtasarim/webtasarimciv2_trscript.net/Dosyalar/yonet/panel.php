<?php
include('library/kontrol.php');
?>
<div class="clear">
	<div class="sidebar"> <!-- *** sidebar layout *** -->
		<div class="logo clear">
        <a href="index.php"><img src="images/logo.png" class="picture" /></a>
		</div>
		<div class="menu">
		<ul>
        <li <?php $islem->active(6,$include['aktif']); ?> ><a href="#" onclick="return false;">Sipariş Yönetimi ( <span class="renk3"><?php $islem->yeni('siparis WHERE onay=0'); ?></span> )</a>
        	<ul>
                <li <?php $islem->active('siparis',$_GET['page']); ?>>
                <a href="index.php?page=siparis">Yeni Siparişler ( <span class="iptal"><?php $islem->yeni("siparis WHERE onay=0"); ?></span> )</a>
                </li>
                <li <?php $islem->active('odeme_onay',$_GET['page']); ?>><a href="index.php?page=odeme_onay">Onaylı Siparişler
                ( <span class="iptal"><?php $islem->yeni("siparis WHERE onay=1"); ?></span> )</a></li>                
                <li <?php $islem->active('arama',$_GET['page']); ?>><a href="index.php?page=arama"> Sipariş Arama</a></li>                
                
            </ul>
        </li>         
        
        <li <?php $islem->active(5,$include['aktif']); ?> ><a href="#" onclick="return false;">Ürün Yönetimi</a>
        	<ul>
                <li <?php $islem->active('kategori',$_GET['page']); ?>><a href="index.php?page=kategori"> Kategori Yönetimi  </a></li>
                <li <?php $islem->active('akategori',$_GET['page']); ?>><a href="index.php?page=akategori"> Alt Kategori Yönetimi  </a></li>
                <li <?php $islem->active('urun_ekle',$_GET['page']); ?>><a href="index.php?page=urun_ekle"> Ürün Ekle  </a></li>
                <li <?php $islem->active('urunler',$_GET['page']); ?>><a href="index.php?page=urunler"> Ürün Listesi  </a></li>
                <li <?php $islem->active('komponent',$_GET['page']); ?>><a href="index.php?page=komponent"> Komponent Ayarları  </a></li>
            </ul>
        </li> 
         
        <li <?php $islem->active(3,$include['aktif']); ?> ><a href="#" onclick="return false;">Haber Yönetimi</a>
        	<ul>
                <li <?php $islem->active('ekle',$_GET['page']); ?>><a href="index.php?page=ekle">Haber Ekle </a></li>
                <li <?php $islem->active('liste',$_GET['page']); ?>><a href="index.php?page=liste">Haber Listesi  
                ( <span class="iptal"><?php $islem->yeni('haberler'); ?></span> )</a></li>
            </ul>
        </li> 
        
           <li <?php $islem->active(10,$include['aktif']); ?> ><a href="#" onclick="return false;">Referans Yönetimi</a>
        	<ul>
                <li <?php $islem->active('dist_ekle',$_GET['page']); ?>><a href="index.php?page=dist_ekle">Kayıt Ekle </a></li>
                <li <?php $islem->active('dliste',$_GET['page']); ?>><a href="index.php?page=dliste">Referans Listesi  
                ( <span class="iptal"><?php $islem->yeni('ortaks'); ?></span> )</a></li>
            </ul>
        </li>         
  
          <li <?php $islem->active(9,$include['aktif']); ?> ><a href="#" onclick="return false;">Hizmet Alanları</a>
        	<ul>
                <li <?php $islem->active('hizmet_ekle',$_GET['page']); ?>><a href="index.php?page=hizmet_ekle">Kayıt Ekle </a></li>
                <li <?php $islem->active('hliste',$_GET['page']); ?>><a href="index.php?page=hliste">Hizmet Listesi  
                ( <span class="iptal"><?php $islem->yeni('hizmet_alanlari'); ?></span> )</a></li>
            </ul>
        </li>       
            
       <li <?php $islem->active(1,$include['aktif']); ?>><a href="#" onclick="return false;">İçerik Yönetimi</a>
           <ul>
           <li <?php $islem->active('sayfa_ekle',$_GET['page']); ?>><a href="index.php?page=sayfa_ekle">Sayfa Ekle</a></li>
           <li <?php $islem->active('icerik',$_GET['page']); ?>><a href="index.php?page=icerik">Sabit Sayfalar</a></li>
           <li <?php $islem->active('1',$_GET['kat']); ?>><a href="index.php?page=iceriks&kat=1">Kurumsal Sayfalar</a></li>
           <li <?php $islem->active('2',$_GET['kat']); ?>><a href="index.php?page=iceriks&kat=2">Hizmetler</a></li>
           <li <?php $islem->active('3',$_GET['kat']); ?>><a href="index.php?page=iceriks&kat=3">Teknik Servis</a></li>
           <li <?php $islem->active('4',$_GET['kat']); ?>><a href="index.php?page=iceriks&kat=4">Kariyer</a></li>
           </ul>
       </li>
            
        <li <?php $islem->active(2,$include['aktif']); ?> ><a href="#" onclick="return false;">Banner Yönetimi</a>
        	<ul>
				<li <?php $islem->active('banner',$_GET['page']); ?>><a href="index.php?page=banner">Banner Ekle </a></li>
            </ul>
        </li>  
        
        <li <?php $islem->active(7,$include['aktif']); ?> ><a href="#" onclick="return false;">İK Yönetimi</a>
        	<ul>
				<li <?php $islem->active('basvuru',$_GET['page']); ?>><a href="index.php?page=basvuru">
                İş Başvuruları ( <span class="iptal"><?php $islem->yeni('basvuru'); ?></span> )</a>
                </li>
                <li <?php $islem->active('pozisyon',$_GET['page']); ?>><a href="index.php?page=pozisyon">Pozisyon Listesi</a></li>
            </ul>
        </li>   
               
         <li <?php $islem->active(8,$include['aktif']); ?> ><a href="#" onclick="return false;">İletişim Yönetimi</a>
        	<ul>
				<li <?php $islem->active('iletisim',$_GET['page']); ?>><a href="index.php?page=iletisim">İletişim Bilgileri </a></li>
            </ul>
        </li> 
               
        <li <?php $islem->active(4,$include['aktif']); ?>><a href="#" onclick="return false;">Genel Ayarlar</a>
       	  <ul>
               <li <?php $islem->active('ayar',$_GET['page']); ?>><a href="index.php?page=ayar">Site Ayarları</a></li>
               <li <?php $islem->active('links',$_GET['page']); ?>><a href="index.php?page=links">Medya Linkleri</a></li>
               <li <?php $islem->active('bulten',$_GET['page']); ?>><a href="index.php?page=bulten">E-Bülten ( <span class="iptal"><?php $islem->yeni("bulten"); ?></span> )</a></li>
      	 </ul>
       </li>      
 
</ul>
            
		</div>
	</div>
	
	<div class="main">
	<div class="main-wrap">
	  <div class="header clear">
        <ul class="linksl clear" style="float:left; margin-top:11px;">
                <li><h2><?php echo $include['sayfa']; ?></h2></li>
		  </ul>        
        
		  <ul class="links clear">
            <li><strong> Sistem Tarihi :</strong> <span class="aktif"><?php echo date("Y-m-d"); ?></span> 
            <strong>Sistem Saati  :</strong><span class="aktif"><?php echo date("H:i:s"); ?></span></li>
            <li><a href="index.php?exit=ok"><img src="images/ico_logout_24.png" alt="" class="icon" /> <span class="text">Güvenli Çıkış</span></a></li>

		  </ul>		
        </div>
        <?php include_once($include['icerik']); ?>
	</div>
	</div>
</div>
</body>
</html>   