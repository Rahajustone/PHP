<?php
error_reporting(0); 
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
	<script type="text/javascript" src="ckeditor.js"></script>
	<script src="_samples/sample.js" type="text/javascript"></script>
	<link href="_samples/sample.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="sample_posteddata.php" method="post">
	<h2 class="samples">&nbsp;</h2>
  <p>
			<textarea cols="80" id="editor_kama" name="editor_kama" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://ckeditor.com/"&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
			<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'editor_kama',
					{
						skin : 'kama'
					});

			//]]>
			</script>
  </p>
</form>
</body>
</html>
