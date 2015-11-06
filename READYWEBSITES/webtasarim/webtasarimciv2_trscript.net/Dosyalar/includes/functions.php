<?php
class yeniyol extends Yeniyol_Guvenlik
{
###########################################################################################################################		
	public function lang($dil,$url)
	{
		if(isset($dil) && isset($url) && !empty($dil) && !empty($url))
		{
			switch($dil)
			{
				case 2:
					$_SESSION['LANG']=2;
					header("Location: ".$url);	
				break;
				case 1:
					$_SESSION['LANG']=1;
					header("Location: ".$url);		
				break;
				default:
					$_SESSION['LANG']=1;
				break;
			}
		}
	}
###########################################################################################################################	
	public function home_lang($yol)
	{
		if(isset($_SESSION['LANG']) && !empty($_SESSION['LANG']))
		{
			if($_SESSION['LANG']==1) { include($yol.'tr.php'); } else  { include($yol.'eng.php'); }
		}
		else
		{
			$_SESSION['LANG']=1;
			 include($yol.'tr.php');
		}
	}
	public function dil()
	{
		if($_SESSION['LANG']==1) { return $dil='tr'; } else { return $dil='eng'; }		
	}	
###########################################################################################################################		
	public function sepet($sepet)
	{
		$sorgu=mysql_query("SELECT SUM(adet) AS toplam FROM sepet WHERE sepet='".$this->metin($sepet)."'");
		$yaz=mysql_fetch_assoc($sorgu);
		if(empty($yaz['toplam'])) { return $say=0; } else {  return $yaz['toplam']; }
	}
###########################################################################################################################		
	public function banner($aktif)
	{
		if($aktif==0) { include('includes/banner.php'); }	else { $_SESSION['AKTIF']=$aktif; include('includes/vitrin.php'); }
	}
###########################################################################################################################	
	public function content_banner()
	{
		$sorgu=mysql_query("SELECT resim FROM content_image WHERE kat=".$_SESSION['AKTIF']." LIMIT 1");
		$yaz=mysql_fetch_assoc($sorgu);
		return $yaz['resim'];
	}
###########################################################################################################################		
	public function content_menu($tablo,$kat=0,$id,$url,$sira='id')
	{
		if($kat!=0) { $k=" WHERE kat=".$kat.""; } else { $k=''; }
		$sorgu=mysql_query("SELECT id,baslik_".$this->dil()." FROM ".$tablo."".$k." ORDER BY ".$sira." ASC");	
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			if($yaz['id']==$id) { $a=' class="active"'; } else { $a=''; }
			
			echo '<li><a href="'.$url.'/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"'.$a.'>'.$yaz['baslik_'.$this->dil()].'</a></li>';	
		}
	}
########################################################################################
	public function data_say($alan,$tablo,$kosul)
	{
		$sorgu=@mysql_query("SELECT ".$alan." FROM ".$tablo." WHERE ".$kosul."");
		return $say=@mysql_num_rows($sorgu);
		@mysql_free_result($sorgu);
	}
########################################################################################	
	public function data_yaz($alanlar,$tablo,$kosul)
	{
		$sorgu=mysql_query("SELECT ".$alanlar." FROM ".$tablo." ".$kosul." LIMIT 1");
		$yaz=mysql_fetch_assoc($sorgu);
		$e=explode(',',$alanlar);
		
		foreach($e as $key)
		{
			$yaz[$key];	
		}
		return ($yaz);
		
		@mysql_free_result($sorgu);
	}
########################################################################################
	public function permalink($veri) {
		$tr=array('ç','Ç','ğ','Ğ','İ','ı','ö','Ö','ş','Ş','ü','Ü','-','  ',' ',",","'",'!','/','\\');
		$en=array('c','c','g','g','i','i','o','o','s','s','u','u','','-','-','','','','','','');
		$islem=str_replace($tr,$en,trim($veri));
		$islem=preg_replace("@[^A-Za-z0-9-_]+@i","",$islem);
		return strtolower($islem);
	}
########################################################################################
	public function ozet($o,$l=10) {
	$p=explode(" ",$o);
	for($i=0; $i<=$l; $i++) { $yaz.=$p[$i]." "; }
	return strip_tags($yaz);
	}
########################################################################################	
	public function menu($a,$b,$c,$d)
	{
		if($a==$b) { return $c; } else { return $d; }	
	}
########################################################################################
	public function banners()
	{
		$sorgu=mysql_query("SELECT * FROM banner WHERE onay=1 ORDER BY sira ASC");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			if($yaz['url']=='http://www' || empty($yaz['url'])) $link=''; else $link=$yaz['url'];
			echo '<a href="'.$link.'">';
            echo '<img src="uploads/banner/'.$yaz['resim'].'" alt="'.$yaz['baslik_'.$this->dil()].'" title="'.$yaz['baslik_'.$this->dil()].'"/>';
            echo '<span>
            <b>'.$yaz['baslik_'.$this->dil()].'</b><br />
			'.nl2br(stripslashes($yaz['metin_'.$this->dil()])).'
            </span>
            </a>';	
		}
	}
########################################################################################
	public function haberler()
	{
		$sorgu=mysql_query("SELECT * FROM haberler ORDER BY id DESC");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<li>
                        <p>
                            <span class="frame">
							<a href="haber/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"><img src="uploads/thumbs/'.$yaz['resim'].'" /></a></span>
                            <a href="haber/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"><strong>'.$yaz['baslik_'.$this->dil()].'</strong></a>
                            <b>'.TARIH.' : '.$yaz['tarih'].'</b>
                            <i><a href="haber/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'">'.trim($this->ozet($yaz['metin_'.$this->dil()],15)).'...</a></i>
                        </p>
                   </li>';
		}
	}
########################################################################################
	public function indirimli_urunler()
	{
		$sorgu=mysql_query("SELECT * FROM urunler WHERE indirim!='0.00' ORDER BY id DESC");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo ' <li>
                        <p>
                            <div class="frm">
                            <span class="frame"></span>
                            <img src="uploads/thumbs/'.$yaz['resim'].'" />
                            </div>
                            <a href="urun/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"" class="baslik">'.$yaz['baslik_'.$this->dil()].'</a>
                            <a href="urun/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'" class="fiyat">'.$yaz['indirim'].''.$this->doviz($yaz['para_birim']).'<span class="kdv"> + KDV</span></a>
                        </p>
                   </li>';		   
		}
	}		
########################################################################################
	public function doviz($deger)
	{
		switch($deger)
		{
			case 1:  return 'TL'; break;
			case 2:  return '$';  break;
			case 3:  return '€';  break;
			case 4:  return '£';  break;
			default: return 'TL'; break;
		}	
	}
########################################################################################
	public function footer_link($tablo,$kat,$url)
	{
		$sorgu=mysql_query("SELECT id,baslik_tr,baslik_eng FROM ".$tablo." WHERE kat=".$kat);
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<li><a href="'.$url.'/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"><img src="images/ok.png" align="absmiddle"/> '.$yaz['baslik_'.$this->dil()].'</a></li>';	
		}
	}	
########################################################################################
	public function ortaks_footer()
	{
		$sorgu=mysql_query("SELECT id,logo,baslik_tr FROM ortaks ORDER BY RAND() ");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<li><a href="distributor/'.$yaz['id'].'/'.$this->permalink($yaz['baslik_tr']).'"><img src="uploads/thumbs/'.$yaz['logo'].'" /></a></li>';	
		}
	}
########################################################################################
	public function content_img($resim)
	{
		if(!empty($resim)) { echo '<span class="cimg"><img src="uploads/thumbs/'.$resim.'" alt="Product1"/></span>';} else {}
	}	
########################################################################################
	public function galeri($kat,$id)
	{
		$sorgu=mysql_query("SELECT resim FROM galeri WHERE kat=".$kat." AND icerik=".$id." ORDER BY id DESC ");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<a href="uploads/'.$yaz['resim'].'" class="group1"><img src="uploads/thumbs/'.$yaz['resim'].'" /></a>';	
		}
	}	
########################################################################################
	public function dokuman($id)
	{
		$sorgu=mysql_query("SELECT * FROM dokuman WHERE urun=".$id." ORDER BY id DESC ");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<li><a href="uploads/dosya/'.$yaz['dosya'].'" target="_blank">'.$yaz['baslik_'.$this->dil()].' <strong>'.GOZAT.'</strong></li> </a>';	
		}
	}		
########################################################################################	
	public function urun_menu($id,$aid=0,$k=0)
	{
		$icerik_sorgu=mysql_query("SELECT * FROM kategori ORDER BY sira ASC");
		while($icerik=mysql_fetch_assoc($icerik_sorgu))
		{
			if($icerik['id']==$id) { $a=' class="active"'; } else { $a=''; }
			echo '<li><a href="kategori/'.$icerik['id'].'/'.$this->permalink($icerik['baslik_'.$this->dil()]).'/" title="'.stripslashes($icerik['baslik_'.$this->dil()]).'" '.$a.'>'.stripslashes($icerik['baslik_'.$this->dil()]).'</a></li>';
			if($id==$icerik['id']) 
			{
				$sub_sorgu=mysql_query("SELECT * FROM akat WHERE ana=".$icerik['id'].""); 
				if(mysql_num_rows($sub_sorgu)>0) 
				{
					while($sub=mysql_fetch_assoc($sub_sorgu))
					{	
						if($sub['id']==$aid) { $b=' class="active"'; } else { $b=''; }
						echo'<ul class="submenu">
						<li><a href="akategori/'.$sub['id'].'/'.$this->permalink($sub['baslik_'.$this->dil()]).'/"'.$b.'>'.$sub['baslik_'.$this->dil()].'</a></li>
						</ul>';
					} 
				} 
			} 
		}
		if($k==1) $s=' class="active"'; else $s=''; 
		echo '<li><a href="components/"'.$s.'>'.MENU9.'</a></li>';
		echo '<li><a href="http://www.canelsanstore.com" target="_blank">İndirimli Ürünler</a></li>';
	}
########################################################################################	
	public function olcek($text,$w,$h) {
	
	preg_match('/width="(\d+)(px)?" height="(\d+)(px)?"/', $text, $matches);
	
	$width = intval($matches[1]);
	$height = intval($matches[3]);
	$new_width = $w;
	$new_height = $h; //intval($new_width * $height / $width);
	
	return $text = preg_replace('/width="(\d+)(px)?" height="(\d+)(px)?"/', 'width="' . $new_width . '" height="' . $new_height . '"', $text);
	
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
	public function stokno($b,$s)
	{
		if(!empty($s)) return $s.'  '.$b; else  return $b;	
	}
########################################################################################
	public function arama($ara)
	{
		if(isset($ara))
		{
			$ara=$this->metin($ara);
			if(empty($ara)) { include('includes/error.php');	 } else {
			$urun_sorgu=mysql_query("SELECT id,baslik_".$this->dil()." FROM urunler WHERE baslik_".$this->dil()."='".trim($ara)."' LIMIT 1");
			if(mysql_num_rows($urun_sorgu)>0)
			{
				$urun=mysql_fetch_assoc($urun_sorgu);
				header("Location: urun/".$urun['id']."/".$this->permalink($urun['baslik_tr'])."");	
			}
			else
			{
				$komp_sorgu=mysql_query("SELECT id,adi FROM komponent WHERE adi LIKE '".trim($ara)."%' LIMIT 1");		
				if(mysql_num_rows($komp_sorgu)>0)
				{
					$komp=mysql_fetch_assoc($komp_sorgu);
					header("Location: component/".$komp['id']."/".$this->permalink($komp['adi'])."");	
				}
				else
				{
					include('includes/error.php');	
				}	
			}
		}

		}
	}
########################################################################################
	public function urun_resim($urun,$kat)
	{
		if($kat==2) { $resim='images/komponent_img.png'; } else
		{
			$sorgu=mysql_query("SELECT resim FROM urunler WHERE id=".$urun." LIMIT 1");	
			$yaz=mysql_fetch_assoc($sorgu);
			if(empty($yaz['resim'])) $resim='images/komponent_img.png'; else $resim='uploads/thumbs/'.$yaz['resim'];
		}
		
		return $resim;
	}
########################################################################################
	public function urun_baslik($urun,$kat)
	{
		if($kat==2) 
		{  
			$sorgu=mysql_query("SELECT adi FROM komponent WHERE id=".$urun." LIMIT 1");	
			$yaz=mysql_fetch_assoc($sorgu);
			$baslik=$yaz['adi'];
		} 
		else
		{
			$sorgu=mysql_query("SELECT baslik_".$this->dil()." FROM urunler WHERE id=".$urun." LIMIT 1");	
			$yaz=mysql_fetch_assoc($sorgu);
			$baslik=$yaz['baslik_'.$this->dil()];
		}
		
		return $baslik;
	}	
########################################################################################	
	public function mail_gonder($mesaj,$posta,$baslik)
	{
		$body='<hr />'.$mesaj.'';
		$g_mail = "elkatek@elkatek.com.tr";
		$g_isim = "Elkatek";
		$giden = "".$posta."";
		$baslik = "".$baslik."";
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
}
?>