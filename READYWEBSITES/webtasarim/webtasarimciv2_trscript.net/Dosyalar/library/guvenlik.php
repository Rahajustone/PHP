<?php
class Yeniyol_Guvenlik
{
	public function metin($veri)
		{
			return $veri=trim(strip_tags(mysql_real_escape_string($veri)));
		}
########################################################################################
	public function user_giris($veri)
		{
			return trim(md5(sha1($veri)));
		}
########################################################################################	
	public function sayi($veri)
		{
			return trim(intval($veri));	
		}
########################################################################################
	public function decode($veri)
		{
			return trim(intval(base64_decode($veri)));	
		}
########################################################################################
	public function escape($veri)
		{
			return trim(mysql_real_escape_string($veri));	
		}
########################################################################################	
	public function stext($text) 
	{
		$string=explode('"',$text);
		return $string[0];
	}
########################################################################################	
	public function kontrol_metin($get,$pr) {
		
	if(isset($get)) {
		
		if(is_numeric($pr) || empty($pr)) { header("Location: ".URL.""); exit();}
	
		}
	}	
########################################################################################	
	public function zero($deger)
	{
		if(empty($deger))	{ header("Location: index.php"); exit();}
	}
########################################################################################
}

?>