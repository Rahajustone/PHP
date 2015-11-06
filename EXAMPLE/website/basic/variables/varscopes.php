<html>
<head>

	</head>
	<body>
		<?php
			echo "types of scope:  global,local,static <br>";
			echo "---------global scope example---------------<br>";
			$a=5;//global scope
			function mytest()
			{
				echo "number value is $a <br>";//cant access to global value inside fuction

			}
			mytest();//calling functioon like c programing or java language
			echo "global variable value $a<br>";//accessing global value
			echo "---------local scope example---------------<br>";	
			function FunctionName()
			{
				$var1="i am local var";
				echo "local var inside function: $var1<br>";# local var inside function only accesse inside there own function...
			}
			FunctionName();
			echo "i am local var cant access outside function $var1 value is:";//cant access outside function


		?>
	</body>

</html>