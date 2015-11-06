<?php @include_once('library/sec.php');
class seo
{
	public function seo_sorgu($alanlar,$tablo,$kosul)
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
#################################################################################################################
	public function keywords($k)
	{
		$b=explode(' ',trim(strip_tags($k)));
		
		for($i=0; $i<=9; $i++)
		{
			$s.=$this->ozel_karakter($b[$i]).', ';	
		}
		return substr(trim($s),0,-1);
	}
#################################################################################################################	
	public function ozel_karakter($k)
	{
		$ozel=array(',','.','!','?',"'",'"',';',':','..','...','//','\\','*','-','_','+','|','=','(',')','[',']','%','&','#');
		$temiz=array('','','','','','','','','','','','','','','','','','','','','','','','','');	
		return str_replace($ozel,$temiz,$k);
	}
########################################################################################
	public function ozets($o,$l=10) {
	$p=explode(" ",$o);
	for($i=0; $i<=$l; $i++) { $yaz.=$p[$i]." "; }
	return strip_tags($yaz);
	}	
}
?>