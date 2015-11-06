<?php
function Eretna_Icerik ($secim) {
$secim=strip_tags($secim);
if(is_numeric($secim) || strlen($secim)>20) { header("Location: index.php"); }
if(isset($secim)) { $secim=$secim; } else { $secim='anasayfa'; }

switch ($secim) {
	
	case 'icerik':																								
	$modul='icerik/';
	$sayfa='İçerik Yönetimi / Sabit İçerik Sayfalarını Düzenle';
	$icerik=$modul.'icerik.php';	
	$aktif=1;
	break;
	case 'sayfa_ekle':																								
	$modul='icerik/';
	$sayfa='İçerik Yönetimi / Sayfa Ekle';
	$icerik=$modul.'ekle.php';	
	$aktif=1;
	break;
	case 'iceriks':																								
	$modul='icerik/';
	$sayfa='İçerik Yönetimi / İçerik Sayfalarını Düzenle';
	$icerik=$modul.'iceriks.php';	
	$aktif=1;
	break;
	case 'ortak':																								
	$modul='icerik/';
	$sayfa='İçerik Yönetimi / İş Ortaklarımız';
	$icerik=$modul.'ortak.php';	
	$aktif=1;
	break;
		
	case 'banner':	
	$modul='banner/';
	$sayfa='Banner Yönetimi / Banner Ekle';
	$icerik=$modul.'banner.php';	
	$aktif=2;
	break;		
	case 'banner_duzenle':	
	$modul='banner/';
	$sayfa='Banner Yönetimi / Banner Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=2;
	break;

	case 'liste':																								
	$modul='haber/';
	$sayfa='Ürün Yönetimi / Kayıtlı Ürünler';
	$icerik=$modul.'liste.php';	
	$aktif=3;
	break;
	case 'ekle':																								
	$modul='haber/';
	$sayfa='Haber Yönetimi / Yeni Haber Ekle';
	$icerik=$modul.'ekle.php';	
	$aktif=3;
	break;	
	case 'haber_duzenle':																								
	$modul='haber/';
	$sayfa='Haber Yönetimi / Haber İçeriğini Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=3;
	break;					

	case 'ayar':																								
	$modul='ayar/';
	$sayfa='Sistem Genel Ayarları';
	$icerik=$modul.'ayar.php';	
	$aktif=4;
	break;	
	case 'links':																								
	$modul='ayar/';
	$sayfa='Medya Linkleri';
	$icerik=$modul.'links.php';	
	$aktif=4;
	break;	
	case 'bulten':																								
	$modul='ayar/';
	$sayfa='E-Bülten - Kayıtlı E-Mail Adresleri';
	$icerik=$modul.'bulten.php';	
	$aktif=4;
	break;			
	
	case 'kategori':																								
	$modul='kategori/';
	$sayfa='Kategori Yönetimi / Kategori Ekle - Düzenle';
	$icerik=$modul.'kategori.php';	
	$aktif=5;
	break;
	case 'akategori':	
	$modul='kategori/';
	$sayfa='Kategori Yönetimi / Alt Kategori';
	$icerik=$modul.'alt_kategori.php';	
	$aktif=5;
	break;		
	case 'kategori_duzenle':																								
	$modul='urun/';
	$sayfa='Kategori Yönetimi / Kategori Düzenle';
	$icerik=$modul.'kategori_duzenle.php';	
	$aktif=5;
	break;	
	case 'urun_ekle':																								
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Yeni Ürün Ekle';
	$icerik=$modul.'ekle.php';	
	$aktif=5;
	break;	
	case 'urun_duzenle':																								
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Ürün Bilgilerini Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=5;
	break;	
	case 'urun_detay':																								
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Ürün Detayları';
	$icerik=$modul.'detay.php';	
	$aktif=5;
	break;	
	case 'urunler':	
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Kayıtlı Ürünler';
	$icerik=$modul.'liste.php';	
	$aktif=5;
	break;
	case 'urun_duzenle':	
	$modul='kategori/';
	$sayfa='Ürün Yönetimi / Ürün Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=5;
	break;	
	case 'urun_detay':																								
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Ürün Detayları';
	$icerik=$modul.'detay.php';	
	$aktif=5;
	break;		
	case 'komponent':	
	$modul='urun/';
	$sayfa='Ürün Yönetimi / Komponent Ayarları';
	$icerik=$modul.'komponent.php';	
	$aktif=5;
	break;			

	case 'siparis':																								
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Yeni Siparişler';
	$icerik=$modul.'liste.php';
	$aktif=6;	
	break;	
	case 'odeme':																								
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Yeni Siparişler';
	$icerik=$modul.'odeme.php';
	$aktif=6;	
	break;
	case 'arama':																								
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Sipariş Arama';
	$icerik=$modul.'arama.php';
	$aktif=6;	
	break;		
	case 'odeme_onay':																								
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Onaylı Siparişler';
	$icerik=$modul.'odeme_onay.php';
	$aktif=6;	
	break;	
	case 'siparis_detay':																								
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Sipariş Bilgleri';
	$icerik=$modul.'detay.php';
	$aktif=6;	
	break;	
	
	case 'basvuru':																								
	$modul='basvuru/';
	$sayfa='İK Yönetimi / İş Başvuruları';
	$icerik=$modul.'liste.php';
	$aktif=7;	
	break;	
	case 'pozisyon':																								
	$modul='basvuru/';
	$sayfa='İK Yönetimi / Açık Pozisyonlar';
	$icerik=$modul.'pozisyon.php';
	$aktif=7;	
	break;				

	case 'iletisim':																								
	$modul='iletisim/';
	$sayfa='İletişim Yönetimi / Yeni Kayıt';
	$icerik=$modul.'ekle.php';
	$aktif=8;	
	break;	
	case 'iletisim_duzenle':																								
	$modul='iletisim/';
	$sayfa='İletişim Yönetimi / İletişim Bilgilerini Düzenle';
	$icerik=$modul.'duzenle.php';
	$aktif=8;	
	break;	

	case 'hliste':																								
	$modul='hizmet/';
	$sayfa='Hizmet Alanları Yönetimi / Kayıtlı Hizmet Alanları';
	$icerik=$modul.'liste.php';	
	$aktif=9;
	break;
	case 'hizmet_ekle':																								
	$modul='hizmet/';
	$sayfa='Hizmet Alanları Yönetimi / Yeni Kayıt Ekle';
	$icerik=$modul.'ekle.php';	
	$aktif=9;
	break;	
	case 'hizmet_duzenle':																								
	$modul='hizmet/';
	$sayfa='Hizmet Alanları Yönetimi / İçeriği Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=9;
	break;

	case 'dliste':																								
	$modul='ortak/';
	$sayfa='Distribütör Yönetimi / Kayıtlı Hizmet Alanları';
	$icerik=$modul.'liste.php';	
	$aktif=10;
	break;
	case 'dist_ekle':																								
	$modul='ortak/';
	$sayfa='Distribütör Yönetimi / Yeni Kayıt Ekle';
	$icerik=$modul.'ekle.php';	
	$aktif=10;
	break;	
	case 'dist_duzenle':																								
	$modul='ortak/';
	$sayfa='Distribütör Yönetimi / İçeriği Düzenle';
	$icerik=$modul.'duzenle.php';	
	$aktif=10;
	break;											
	
	default:
	$modul='siparis/';
	$sayfa='Sipariş Yönetimi / Gelen Siparişler';
	$icerik=$modul.'liste.php';	
	$aktif=6;

}
	return array('icerik'=>$icerik,'aktif'=>$aktif,'sayfa'=>$sayfa);
}
?>