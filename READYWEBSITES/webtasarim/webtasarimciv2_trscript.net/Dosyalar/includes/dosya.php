<?php
class Yeniyol_Dosya
{

	public $Yukleme_Yeri;
	public $success;

	public function dosya_yukle($Eretna_File)
	{
		$dizin =$this->Yukleme_Yeri;
   		$yeni=time().substr(md5(mt_rand(1,9)),8,4);	
		$hedef = $dizin ."/". $dosya=basename($yeni."-".$this->dosya($Eretna_File['name']));
		if(empty($Eretna_File['name'])) { return $this->sonuc($dosya,'Lütfen Yüklenecek Dosyayı Seçiniz.',2); } {   
  	    if(@move_uploaded_file($Eretna_File['tmp_name'], $hedef)) { return $this->sonuc($dosya,$this->success,1); }
		}
		
		
	}
	
	private function dosya($b) {
	$s='_SAKINCALI-DOSYA_';
	$bos=array(' ','  ','.php','.exe','.html','.asp','.aspx','js','.conf','.ini','.jsp','.htm','.htaccess','İ','ı','Ü','ü','Ö','ö','Ş','ş','Ç','ç','Ğ','ğ');
	$dolu=array('_','_',$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,'i','i','u','u','o','o','s','s','c','c','g','g');
	$cevir=str_replace($bos,$dolu,$b);
	return $cevir;
	
	}
	
	public function sonuc($dosya,$result=0,$sonuc=0)
	{
		return array($dosya,$result,$sonuc);
	}
	
}

?>