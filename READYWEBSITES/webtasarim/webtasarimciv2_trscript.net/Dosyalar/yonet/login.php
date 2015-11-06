<?php
include_once("library/kontrol.php");
$hata=0;
		if(!empty($_POST['user']) && !empty($_POST['password']))
		{
			$user=$eretna->metin($_POST['user']);
			$sifre=$eretna->admin_giris($_POST['password']);
			
			$admin_sor=mysql_query("SELECT id FROM admin_kontrol WHERE user='".$user."' AND password='".$sifre."' LIMIT 1");
			if(mysql_num_rows($admin_sor)>0) { $_SESSION['Elkatek_ELK_YENIYOL']=md5('ELK_YYM_TRUE'); $islem->yonlendir(1,0,'index.php'); } else { $hata=1; }
		}
?>
<body class="no-side">
<div class="login-box">
<div class="login-border">
<div class="login-style">
	<div class="login-header">
		<div class="logo clear"><span class="title"></span></div>
	</div>
	<form action="index.php" method="post">
		
		<div class="login-inside">
			<div class="login-data">
				<div class="row clear">
					<label for="user">Kullanıcı Adı:</label>
    					<input type="text" size="25" class="text" name="user" id="user" />
    				</div>
 				<div class="row clear">
					<label for="password">Şifre:</label>
					<input type="password" size="25" class="text" name="password" id="password" />
				</div>
				<input type="submit" class="submit" value="Giriş" />
			</div>
		</div>
	</form>
</div>
</div>
<?php if($hata==1) { ?>
<br /><div class="notification note-error"><a href="#" class="close" title="Close notification"><span>close</span></a>
<span class="icon"></span><p><strong>Hata Oluştu:</strong> Kullanıcı Adı veya Şifreniz Hatalı.</p>
</div>
<?php  } ?>
</div>
</body>