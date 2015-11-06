<?
include('inc/ayar.php');
include('inc/kontrol.php');
?>
<?
$id=$_GET["id"];
$sil=mysql_query("DELETE FROM slider WHERE slider_id='$id'");
if($sil)
{
echo "<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Resim Silindi !');
window.location.href = 'slider.php';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>";
}else
{echo "<script>
var nowOnload = window.onload;
window.onload = function () { 
alert('Hata Olustu Resim Silinemedi !');
window.location.href = 'slider.php';
if(nowOnload != null && typeof(nowOnload) == 'function') { 
nowOnload(); 
} 
} 
</script>";}
?>