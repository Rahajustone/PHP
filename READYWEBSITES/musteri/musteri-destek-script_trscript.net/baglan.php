<?php
$con['host']='localhost';
$con['dbname']=''; //// Veritabanı Adı
$con['dbuser']=''; ///// Kullanıcı Adı
$con['dbpass']=''; //// Kullanıcı Şifresi
$con['dizin']='/';  //// Altdizin adı # Eğer bir alt dizine yüklüyorsanız onun adını yazın örneğin panel/ #başında / olmamalı sonunda / olmalı
error_reporting(0);
try{
  $db = new PDO('mysql:host='.$con['host'].';dbname='.$con['dbname'].';charset=utf8',''.$con['dbuser'].'',''.$con['dbpass'].'');
}catch(PDOException $e){
    echo 'Hata: Veritabanına bağlanamadık!';
}
?>