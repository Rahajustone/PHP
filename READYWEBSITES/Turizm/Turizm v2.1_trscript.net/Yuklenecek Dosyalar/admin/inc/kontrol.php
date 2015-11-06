<?
if(!isset($_SESSION['SESS_admin_id']) || (trim($_SESSION['SESS_admin_id']) == '')) {
	header("location: giris.php");
	exit();
}
?>