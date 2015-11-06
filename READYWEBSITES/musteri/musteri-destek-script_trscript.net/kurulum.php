<?php
session_start();
?>

      
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Kurulum</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
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
     
  

      

<?php

error_reporting(0);
require_once'baglan.php'; /* Veritabanı Bağlantı Dosyamızı Tanımlayalım . */
echo '<meta charset="utf-8"> ';
$baglanti=mysqli_connect($con['host'],$con['dbuser'],$con['dbpass'],$con['dbname']);
if($baglanti===FALSE){echo' <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Veritabanı Hatası!!</h4>
                   baglan.php"deki bilgilerden emin olun!</div>';exit;}
$filename = 'kurulum.sql'; /* İmport Edeceğimiz (İçeri Aktaracağımız) SQL Dosyasının Yolunu Değişkene Atayalım . */

$templine = ''; /* Templine Adında Bir String Oluşturduk . Neden Bu Şekilde Yaptık Derseniz , ''; Kısmı Olmasaydı Değerimizi NULL Olarak Görecek ve Değişkeni int Yani Tamsayı Değişkeni Olarak Tanımlayacaktı . */

$lines = file($filename); /* Yukarıda Yolunu Gösterdiğimiz SQL Dosyasının Tüm Kodlarını (İçeriğini) $lines Değişkenine Atıyoruz . */

foreach ($lines as $line) { /* Tüm Satırlar Bitene Kadar $lines Değişkenindeki Veriyi Satır Satır $line Değişkenine Atayalım . */

if (substr($line, 0, 2) == '--' || $line == '') /* Eğer SQL Satırı Yorum Satırı Ise Döngüyü 1 Tur Boş Döndürelim . */
continue;

$templine .= $line; /* Satırımız Yorum Satırı Değilse , .= Ile Tıpkı += Yapar Gibi String Birleştirme Yapalım . Yukarıda Neden Templine'ı Boş Olarak Tanımladığımızı Şimdi Daha İyi Anlamışsınızdır :) */

if (substr(trim($line), -1, 1) == ';') /* Satır Sonuna Geldiysek Yani Sorgu Bittiyse Query Işlemini Yapmaya Başlayalım . */
{

$bitti=mysqli_query($baglanti,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />'); /* Query'i Oluşturalım . */

$templine = ''; /* Query'i Çalıştırdık ve Satır Başarıyla Eklendi Bu Yüzden Yeni Query'nin Oluşturulması İçin $templine Değişkenini Boşluk Atayalım . */
}
}
echo ' <a href="index.php">Kurulum Tamamlandı</a><br>  </div> <div class="register-box-body"> <p class="login-box-msg"><b>Kullanıcı Adınız:</b> Admin <br><b>Şifre:</b>123456</p><div class="alert alert-warning  alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Uyarı!</h4>
                   <b> Biz silmeye çalıştık ama kurulum.php"nin silindiğinden emin olunuz!</b> <br><u> Oluşabilecek problemlerden dolayı musteri-destek.net ten ücretsiz destek alabilirsiniz!</u>
                  </div><br><a href="index.php" class="btn btn-primary btn-block btn-flat">Giriş Yap</a></div>  '; /* Tüm İşlemler Bittikten Sonra Sonraki Adıma Geçmek Isterseniz ... */

if($bitti){				  unlink("kurulum.php");
unlink("kurulum.sql");};


?>    
 </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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
