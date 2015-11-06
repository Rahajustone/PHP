<?php
class Eretna_Araclar
{
	public function yonlendir($yontem,$sure=0,$adres)
	{
		if($yontem==1) { header("Location: ".$adres.""); }
			
		elseif($yontem==2) { echo '<meta http-equiv="refresh" content="'.$sure.';URL='.$adres.'">';  }
	}
########################################################################################	
	public function active($menu,$icerik)
	{
		if($menu==$icerik) { echo ' class="active"'; }	 else { echo''; }
	}
########################################################################################	
	public function kategori_baslik($kat)
	{
		switch($kat)
		{
			case 1: $baslik='Kurumsal'; break;
			case 2: $baslik='Hizmetler'; break;
			case 3: $baslik='Teknik Servis'; break;
			case 4: $baslik='Kariyer'; break;
			default: $baslik='Kurumsal'; break;
		}	
		return $baslik;
	}
########################################################################################	
	public function siparis_urun($kat,$urun)
	{
		if($kat==1)
		{
			$sorgu=mysql_query("SELECT baslik_tr FROM urunler WHERE id=".$urun." LIMIT 1");
			$yaz=mysql_fetch_assoc($sorgu);
			echo $yaz['baslik_tr'];	
		}
		else
		{
			$sorgu=mysql_query("SELECT adi FROM komponent WHERE id=".$urun." LIMIT 1");
			$yaz=mysql_fetch_assoc($sorgu);
			echo $yaz['adi'];		
		}
	}
########################################################################################
	public function firma_baslik2($firma)
	{
		$sorgu=@mysql_query("SELECT baslik FROM firma WHERE id=".$firma."");
		$yaz=@mysql_fetch_assoc($sorgu);
		return $baslik=$yaz['baslik'];	
	}
########################################################################################
	public function sorun_bildir_resims($id)
	{
		$sorgu=@mysql_query("SELECT id,resim FROM sorun_resim WHERE sid=".$id."");
		$say=mysql_num_rows($sorgu);
		if($say<1) { echo $sonuc='Resim Eklenmemiş'; } 
		else
		{
			while($yaz=mysql_fetch_assoc($sorgu))
			{
				echo '<div style="float:left;" align="center">
				<a href="../resims/'.$yaz['resim'].'"><img src="../resims/thumb/'.$yaz['resim'].'" class="thumb size64 fl-space" /></a><br />
				<a href="index.php?page=sorun_duzenle&id='.$id.'&down='.$yaz['id'].'" class="aktif">indir</a><br>
				<a href="index.php?page=sorun_duzenle&id='.$id.'&resim_sil='.$yaz['id'].'" class="iptal" onclick="return sil_kontrol();">sil</a>
				</div>';	
			}
		}
	}
########################################################################################	
	public function kategori_form($s)
	{
		$kategori_sorgu=@mysql_query("SELECT * FROM firma_kat ORDER BY baslik ASC");	
		while($kategori=mysql_fetch_assoc($kategori_sorgu))
		{
			if($s==$kategori['id']) { $ss=' selected="selected"'; } else { $ss=''; }
			echo '<option value="'.$kategori['id'].'"'.$ss.'>'.$kategori['baslik'].'</option>';
		}
	}
########################################################################################	
	public function yeni($sorgu)
	{
		$result=@mysql_query("SELECT COUNT(id) toplam FROM  ".$sorgu."");
		$toplam=@mysql_fetch_assoc($result);
		echo $toplam['toplam'];	
		@mysql_free_result($result);
		
	}
########################################################################################	
	public function islem_durumu($tip,$durum)
	{
		switch($tip)
		{
		case ($tip=='COZUM' && $durum==1): $metin='<span class="aktif">Cevaplanmış Bildirim</span>'; break;
		case ($tip=='COZUM' && $durum==0): $metin='<span class="iptal">Cevaplanmamış Bildirim</span>'; break;
		case ($tip=='HOME'  && $durum==1): $metin='<span class="aktif">Ana Sayfada Gösteriliyor</span>'; break;
		case ($tip=='HOME'  && ( $durum==0 ||  $durum==2 )): $metin='<span class="iptal">Ana Sayfada Gösterilmiyor</span>'; break;
		case ($tip=='AKTIVASYON'  && $durum==1): $metin='<span class="aktif">Aktivasyon Onaylı</span>'; break;
		case ($tip=='AKTIVASYON'  && $durum==0): $metin='<span class="iptal">Kullanıcı Aktivasyon İşlemini Gerçekleştirmemiş</span>'; break;	
		case ($tip=='ONAY'  && $durum==1): $metin='<span class="aktif">Admin Onaylı</span>'; break;
		case ($tip=='ONAY'  && $durum==2): $metin='<span class="iptal">Admin Tarafından Onay Bekleniyor</span>'; break;					
		}	
		return $metin;
	}
########################################################################################	
	public function disabled($deger)
	{
		if($deger==1) { echo 'disabled="disabled"';} else { }	
	}
########################################################################################
	public function sistem_posta()
	{
		$genel_sorgu=@mysql_query("SELECT posta FROM ayarlar LIMIT 1");
		$ayar=@mysql_fetch_assoc($genel_sorgu);
		return $ayar['posta'];	
	}
########################################################################################
	public function mail_gonder($mesaj,$posta)
	{
	$body='<hr />'.$mesaj.'';
	$g_mail = "".$this->sistem_posta()."";
	$g_isim = "Dodo Cocuk";
	$giden = "".$posta."";
	$baslik = "[ Bayilik Başvurunuz Onaylanmıştır ]";
	$header = "From: $g_isim <".$g_mail.">\n"; 
	$header .= "Reply-To: $g_isim <".$g_mail.">\n";
	$header .= "Return-Path: $g_isim <".$g_mail.">\n";  
	$header .= "Delivered-to:  $g_isim <".$g_mail.">\n";
	$header .= "Date: ".date(r)."\n";
	$header .= "Content-Type: text/html; charset=utf-8\n";   
	$header .= "MIME-Version: 1.0\n";
	$header .= "Importance: Normal\n";
	$header .= "X-Sender: $g_isim <".$g_mail.">\n";   
	$header .= "X-Priority: 3\n";   
	$header .= "X-MSMail-Priority: Normal\n";
	$header .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\n";
	//$header .= "Disposition-Notification-To: $g_isim <".$g_mail.">\n";
	$header .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2900.2869\n";
	mail($giden, $baslik, $body, $header);	 
	}
########################################################################################
	public function islem_sonucu($sonuc,$mesaj)
	{
		if($sonuc==0) { $islem= '<div class="notification note-error"><a href="#" class="close" title="Close notification"><span>close</span></a>
							  <span class="icon"></span><p><strong>Hata Oluştu: </strong> '.$mesaj.'</p></div>'; 
					  }
			     else { $islem= '<div class="notification note-success"><a href="#" class="close" title="Close notification"><span>close</span></a>
				              <span class="icon"></span><p><strong>İşlem Başarılı: </strong> '.$mesaj.'</p></div>';
					  } return $islem;
	}
########################################################################################	
	public function tarihFark($basla, $bitir)
	{
		$bs_dizi=explode("-",$basla);
		$bt_dizi=explode("-",$bitir);
		$bs_tarih =mktime(0,0,0,$bs_dizi[1],$bs_dizi[2],$bs_dizi[0]);
		$bt_tarih =mktime(0,0,0,$bt_dizi[1],$bt_dizi[2],$bt_dizi[0]);
		return floor(($bt_tarih-$bs_tarih)/86400);
	}
########################################################################################		
	public function vir2nok($deger)
	{
		$virgul=',';
		$nokta='.';
		return str_replace($virgul,$nokta,$deger);	
	}
########################################################################################	
	public function uye_bul($id){
		$sorgu=@mysql_query("SELECT id,isim FROM user WHERE id=".$id." LIMIT 1");
		$yaz=@mysql_fetch_assoc($sorgu);
		$uye='<a href="index.php?page=user_detay&id='.$yaz['id'].'">'.$yaz['isim'].'</a>';
		return $uye;
		@mysql_free_result($sorgu);
	}
########################################################################################
	public function tr_tarih($tarih,$ayrac='')
	{
		$bol=explode('-',$tarih);
		$bol[0]; // Yıl
		$bol[1]; // Ay
		$bol[2]; // Gun - Rakam
		$bol[3]; // Gün - İsim
		$bol2=explode(' ',$bol[2]);
		
		$gun=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$gun_isim=array('Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar');
		$ay=array('01','02','03','04','05','06','07','08','09','10','11','12');
		$ay_isim=array('Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');	
		
		return $son=$bol2[0].' '.$ayrac.' '.str_replace($ay,$ay_isim,$bol[1]).' '.$ayrac.' '.$bol[0].'  '.str_replace($gun,$gun_isim,$bol[3]).' '.$bol2[1];
						
	}
########################################################################################	
	public function host_resim($table,$resim,$yol,$yol2) 
	{
		$sorgu=mysql_query("SELECT resim FROM ".$table." WHERE id=".$resim." LIMIT 1");
		$resimad=mysql_fetch_assoc($sorgu);
		@unlink($yol.$resimad['resim']);
		@unlink($yol2.$resimad['resim']);
	}
########################################################################################	
	public function host_dosya($table,$dosya,$yol) 
	{
		$sorgu=mysql_query("SELECT dosya FROM ".$table." WHERE id=".$dosya." LIMIT 1");
		$resimad=mysql_fetch_assoc($sorgu);
		@unlink($yol.$resimad['dosya']);
	}	
########################################################################################	
	public function tersle($veri)
	{
		if($veri==1) { $sayi=2; } else { $sayi=1; } return $sayi;	
	}
	public function tmetin($veri,$metin1,$metin2)
	{
		if($veri==1) { return $metin1; } else { return $metin2; }
	}
########################################################################################	
	public function banner($id)
	{
		$sorgu=mysql_query("SELECT * FROM banner WHERE id=".$id." LIMIT 1");
		$yaz=mysql_fetch_assoc($sorgu);
		$banner='<img src="../uploads/banner/'.$yaz['resim'].'" width="600"/>';

		return $banner;
	}	

########################################################################################	
	public function selected($form,$deger)
	{		
		if($form==$deger) { echo ' selected="selected"'; } else { echo $ss=''; }	
	}
}
?>