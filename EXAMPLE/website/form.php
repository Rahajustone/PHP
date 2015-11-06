<html>
<head>

	</head>
	<body>

		<form action="form.php" method="post">
			ad:<input type='text' name="ad">
			<input type='button' name='submit' value='submit'>
			
		</form>
		<?php
		$ad=$_POST["ad"];
		echo $ad;
		?>

	</body>

</html>