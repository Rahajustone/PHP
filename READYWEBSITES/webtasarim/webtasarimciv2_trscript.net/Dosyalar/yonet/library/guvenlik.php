<?php
class Eretna_Guvenlik
{
	public function metin($veri)
		{
			return $veri=trim(strip_tags(mysql_real_escape_string($veri)));
		}
########################################################################################
	public function admin_giris($veri)
		{
			return trim(md5(sha1($veri)));
		}
########################################################################################	
	public function sayi($veri)
		{
			return trim(intval($veri));	
		}
########################################################################################
	public function escape($veri)
		{
			return trim(mysql_real_escape_string($veri));	
		}
########################################################################################
	public function slash($veri)
		{
			return trim(addslashes($veri));	
		}
########################################################################################
	public function tslash($veri)
		{
			return trim(stripslashes($veri));	
		}
}

?>