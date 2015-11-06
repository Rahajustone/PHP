<?php
class Eretna_Resim
{
	public $succes;
	public function ayarlar($dizin,$thumb,$boyut,$maxsize,$kopya=1)
	{
		$this->buyuk=$dizin;
		$this->kucuk=$thumb;
		$this->boyut=$boyut;		
		$this->limit=$maxsize;	
		$this->kopya=$kopya;
		
	}
	public function yukle($dosya)
	{
		$this->dosya=$dosya;
		 
		if(isset($this->dosya['name']) && empty($this->dosya['name'])) { return $this->mesaj('Lütfen Yüklenecek Resmi Seçiniz.'); }	 else {
			
		if($this->dosya['size']>$this->limit*1024) { return $this->mesaj('Resim Yükleme Limitini Aştınız.! MAX: '.($this->limit).'KB Yükleyebilirsiniz.');} 	    else {
			
		if (($this->dosya['type']=="image/gif") || ($this->dosya['type']=="image/pjpeg") || ($this->dosya['type']=="image/jpeg") || 
		   ($this->dosya['type']=="image/png")) {
			$yeni=time().substr(md5(mt_rand(9,999)),8,4);
			$file = $this->dosya['name'];
			$dosya_yolu = $this->buyuk."/". basename($yeni.substr($file, strrpos($file, ".")));
			if(@move_uploaded_file($this->dosya['tmp_name'], $dosya_yolu)) {
			$resim=$yeni.substr($file, strrpos($file, "."));	
			@chmod("./" . $dosya_yolu . $resim,0644);	
			$this->createthumb($this->buyuk.$resim,$this->kucuk.$resim,$this->boyut,$this->boyut);
			return $this->mesaj($this->succes,$resim,1);		
		} 
				} else { return $this->mesaj('Yanlış Bir Format Yüklemeye Çalıştınız. Format : JPG - GIF - PNG'); }
			} 
			
		} 
			
	} 

	private function createthumb($name,$filename,$new_w,$new_h) { 
	if($this->kopya==1) {
	$system=explode('.',basename($name));
	if (preg_match('/jpg|jpeg|JPG/',$system[1])) { $src_img=imagecreatefromjpeg($name); }
	if (preg_match('/png|PNG/',$system[1])) 	 { $src_img=imagecreatefrompng($name); }
	if (preg_match('/gif|GIF/',$system[1])) 	 { $src_img=imagecreatefromgif($name); }
	$old_x=imagesx($src_img);
	$old_y=imagesy($src_img);
	if ($old_x > $old_y)  { $thumb_w=$new_w; $thumb_h=$old_y*($new_h/$old_x); }
	if ($old_x < $old_y)  { $thumb_w=$old_x*($new_w/$old_y);  $thumb_h=$new_h; }
	if ($old_x == $old_y) { $thumb_w=$new_w;  $thumb_h=$new_h; }
	$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
	if (preg_match("/png/",$system[1])) { imagepng($dst_img,$filename,100);  } 
	if (preg_match("/gif/",$system[1])) { imagegif($dst_img,$filename,100);  }
	else { imagejpeg($dst_img,$filename,100); }
	imagedestroy($dst_img); 
	imagedestroy($src_img); 
		}
	}
 
 	public function mesaj($durum,$resim=0,$sonuc=0)
	{
		return array($durum,$resim,$sonuc);	
	}
	
}

?>