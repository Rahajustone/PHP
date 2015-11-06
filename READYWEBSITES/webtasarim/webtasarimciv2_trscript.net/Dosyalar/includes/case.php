<?php
@include_once('library/kontrol.php');
class icerik_yonetimi extends seo
{
	public function icerik($secim,$id=0) {
		
	@$secim=strip_tags($secim);
	if(is_numeric($secim) || $uz=strlen($secim)>20)
	{ header("Location: index.php"); }
		if(isset($secim))
		{ $secim=$secim; } else { $secim='yym'; }
		
			switch ($secim) {
				
			case 'haber':
			$icerik='includes/haber.php';
			$aktif=1;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','haberler','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Haberler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;					
		
			case 'kurumsal':
			$icerik='includes/kurumsal.php';
			$aktif=2;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','icerik','WHERE id='.$id.' AND kat=1');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Kurumsal Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;	
		
			case 'hizmet':
			$icerik='includes/hizmet.php';
			$aktif=3;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','icerik','WHERE id='.$id.' AND kat=2');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Hizmetler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;	
	
			case 'teknik':
			$icerik='includes/teknik.php';
			$aktif=4;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','icerik','WHERE id='.$id.' AND kat=2');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Teknik Servis Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;	
					
			case 'hizmet_alan':
			$icerik='includes/hizmet_alan.php';
			$aktif=4;
			$yaz=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title = 'Hizmet Verdiğimiz Alanlar - Elkatek Elektronik';
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break; 
			
			case 'hizmetler':
			$icerik='includes/hizmetler.php';
			$aktif=4;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','hizmet_alanlari','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Hizmet Alanları Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;				
			
			case 'kariyer':
			$icerik='includes/kariyer.php';
			$aktif=5;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','icerik','WHERE id='.$id.' AND kat=2');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Kariyer Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;	
			
			case 'bform':
			$icerik='includes/basvuru.php';
			$aktif=5;
			$yaz=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title = 'İş Başvurusu - Elkatek Elektronik';
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break;							
	
			case 'iletisim':
			$icerik='includes/iletisim.php';
			$aktif=6;
			$yaz=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title = 'İletişim - Elkatek Elektronik';
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break;	
			
			case 'iform':
			$icerik='includes/iletisim_form.php';
			$aktif=6;
			$yaz=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title = 'İletişim - Elkatek Elektronik';
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break;				
	
			case 'distributor':
			$icerik='includes/distributor.php';
			$aktif=7;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','ortaks','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Distribütörler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;		
			
			case 'urunler':
			$icerik='includes/urunler.php';
			$aktif=8;
			$sabit=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title='Ürünler Elkatek Elektronik';
			$desc  = trim($this->ozets($sabit['sitedesc'],30));
			$key   = $sabit['keyw'];
			break;	
			
			case 'urun':
			$icerik='includes/detay.php';
			$aktif=8;
			$yaz=$this->seo_sorgu('baslik_tr,metin_tr','urunler','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Ürünler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($yaz['metin_tr'],30));
			$key   = $sabit['keyw'];
			break;	
			case 'kategori':
			$icerik='includes/kategori.php';
			$aktif=8;
			$yaz=$this->seo_sorgu('baslik_tr','kategori','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Ürünler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($sabit['sitedesc'],30));
			$key   = $sabit['keyw'];
			break;
			case 'akategori':
			$icerik='includes/akategori.php';
			$aktif=8;
			$yaz=$this->seo_sorgu('baslik_tr','akat','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			if(empty($yaz['baslik_tr'])) $title='Ürünler Elkatek Elektronik';  else $title = $yaz['baslik_tr'].' - Elkatek Elektronik';
			$desc  = trim($this->ozets($sabit['sitedesc'],30));
			$key   = $sabit['keyw'];
			break;			
													
			case 'komponent':
			$icerik='includes/komponent.php';
			$aktif=8;
			$yaz=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			$title = 'Komponentler - Elkatek Elektronik';
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break;
			case 'component':
			$icerik='includes/komponent_detay.php';
			$aktif=8;
			$yaz=$this->seo_sorgu('adi,stok','komponent','WHERE id='.$id.'');
			$sabit=$this->seo_sorgu('keyw,sitedesc','ayarlar','');
			if(empty($yaz['adi'])) $title='Ürünler Elkatek Elektronik';  else $title = $yaz['stok'].' '.$yaz['adi'].' - Elkatek Elektronik';
			$desc  = trim($yaz['stok'].' '.$yaz['adi']);
			$key   = trim($yaz['stok'].' '.$yaz['adi']);
			break;					
	
			case 'arama':
			$icerik='includes/arama.php';
			$aktif=0;
			$manset=1;
			$yaz=$this->seo_sorgu('title,keyw,sitedesc','ayarlar','');
			$title = $yaz['title'];
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break; 
			
			case 'sepet':
			$icerik='includes/sepet.php';
			$aktif=9;
			$yaz=$this->seo_sorgu('title,keyw,sitedesc','ayarlar','');
			$title = $yaz['title'];
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break; 
					
						
			default:
			$icerik='includes/home.php';
			$aktif=0;
			$manset=1;
			$yaz=$this->seo_sorgu('title,keyw,sitedesc','ayarlar','');
			$title = $yaz['title'];
			$desc  = $yaz['keyw'];
			$key   = $yaz['sitedesc'];
			break; 
		}
			return array('icerik'=>$icerik,'aktif'=>$aktif,'title'=>$title,'desc'=>$desc,'keyw'=>$key);
	}
}
?>