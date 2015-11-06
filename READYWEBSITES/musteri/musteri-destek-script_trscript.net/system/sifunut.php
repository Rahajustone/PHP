<?php
session_start();
ob_start();
include("../fonk.php");
$ayar=ayar();

?>

      
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $ayar['firmaadi'];?> - Şifremi Unuttum</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b><?php echo $ayar['firmaadi'];?> </b>Destek Sistemi</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Şifrenizi Unuttuysanız:</p>
        <form method="post" action="sifunut.php">
          <div class="form-group has-feedback">
            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adı"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <input type="text" name="sifunut" class="form-control" placeholder="Şifre Unuttum Kodunuz:"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="tel"  class="form-control" placeholder="Telefon"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  name="sifre" class="form-control" placeholder=" Yeni Şifre"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  name="sifre2" class="form-control" placeholder="Şifre Tekrar"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
	
		  <div class="form-group has-feedback">
         <center>  <img  src="spam.php" /> </center>
           
          </div>
		    <div class="form-group has-feedback">
            <input type="text"  name="kod" class="form-control" placeholder="Güvenlik Kodu"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
         
              <button type="submit" class="btn btn-block btn-warning btn-lg">Şifremi Değiştir</button><br>
          
        </form>        
	
        <a href="giris.php" class="btn btn-block btn-danger btn-lg">Yada üye girişi yap</a>
      </div><!-- /.form-box -->

	  	 
     <center> <strong>Copyright &copy; 2014-2015 <a href="http://musteri-destek.net/">musteri-destek.net</a></strong> </center>
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>  

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{

if( $_POST["kod"] !== $_SESSION["guv"] ){
hata('Güvenlik Kodu Hatalı');
 exit;}
$kadi=igne($_POST['kadi']);	
$sifunut=$_POST['sifunut'];
if(!is_numeric($sifunut)){hata("Şifre Unuttum Kodu Hatalı!");};	
$tel = ltrim($_POST["tel"],"0");
$sifre=sifrele($_POST['sifre']);	
$sifre2=sifrele($_POST['sifre2']);		
/// KONTROLLER
if($kadi=="" or $tel=="" or igne($_POST['sifre'])=="" or $sifre2=="" or $sifunut=="")
{
hata('Tüm alanları eksiksiz doldurmalısın'); 
	return;
}elseif($sifre != $sifre2)
{
hata('Parolanız birbiri ile uyuşmuyor.'); 
	
	return;	
};
if (strlen($kadi)<4){
	hata('Kullanıcı adı 4 karakterden fazla olmalı!');
	return;
};
//TELEFON KONTROLÜ
if(strlen($tel) != 10 or !is_numeric($tel)){

hata('Telefon numaranı başına sıfır koymadan on haneli olarak gir'); 
	return;	
}
//KURAL KONTROLÜ
// KULLANICI ADI YADA TELEFON KULLANILIYOR MU?
 $sorgu = $db->prepare("SELECT id FROM uyeler WHERE kadi = ? and tel = ? and sifunut=?");
         $sorgu->bindParam(1, $kadi);
         $sorgu->bindParam(2, $tel);
         $sorgu->bindParam(3, $sifunut);
		  $sorgu->execute();
		    if($sorgu->rowCount() < 1){hata('Bilgilerinizde hata var lütfen firma ile iletişime geçin!');return;};
//KAYIT EKLENİYOR
$guncelle = $db->prepare("UPDATE uyeler SET sifre=? WHERE kadi = ?");
$guncelle->execute(array($sifre,$kadi));
if ( !$guncelle ){
    
    hata('Bir sorun oluştu lütfen tekrar deneyin');
	
}else{basarili("Şifreniz başarıyla değişmiştir!");};



};


ob_end_flush();
?>