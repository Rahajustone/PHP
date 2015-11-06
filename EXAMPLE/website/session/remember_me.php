<?php
	if(isset($_POST["sendInfo"])){
	storeInfo();
	} elseif ( isset( $_GET["action"] ) and $_GET["action"] == "forget" ) {
	forgetInfo();
	} else {
		displayPage();
		}
	function storeInfo() {
	if ( isset( $_POST["firstName"] ) ) {
	setcookie( "firstName", $_POST["firstName"], time() + 60 * 60 * 24 * 365,
	"", "", false, true );
	}
	if ( isset( $_POST["location"] ) ) {
		setcookie( "location", $_POST["location"], time() + 60 * 60 * 24 * 365, "",
	"", false, true );
	}
	header( "Location: remember_me.php" );
	}
	function forgetInfo() {
	setcookie( "firstName", "", time() - 3600, "", "", false, true );
	setcookie( "location", "", time() - 3600, "", "", false, true );
	header( "Location: remember_me.php" );
	}
		function displayPage() {
	$firstName = ( isset( $_COOKIE["firstName"] ) ) ? $_COOKIE["firstName"] : "";
		$location = ( isset( $_COOKIE["location"] ) ) ? $_COOKIE["location"] : "";
	?>

<html lang="en" >
<head >
<title > Remembering user information with cookies < /title >
<link rel="stylesheet" type="text/css" href="common.css" / >
</head >
<body>
<h2>Rememberinguserinformationwithcookies</h2>
<?phpif($firstNameor$location){?>
<p>Hi,<?phpecho$firstName?$firstName:"visitor"?><?phpecho
$location?"in$location":""?>!</p>
<p>Here’salittlenurseryrhymeIknow:</p>
<p><em>Heydiddlediddle,<br/>
Thecatplayedthefiddle,<br/>
Thecowjumpedoverthemoon.<br/>
Thelittledoglaughedtoseesuchsport,<br/>
Andthedishranawaywiththespoon.</em></p>
<p><ahref="remember_me.php?action=forget">Forgetaboutme!</a></p>
<?php}else{?>
<formaction="remember_me.php"method="post">
<divstyle="width:30em;">
<labelfor="firstName">What’syourfirstname?</label>
<inputtype="text"name="firstName"id="firstName"value=""/>
<labelfor="location">Wheredoyoulive?</label>
<inputtype="text"name="location"id="location"value=""/>
<divstyle="clear:both;">
<inputtype="submit"name="sendInfo"value="SendInfo"/>
</div>
</div>
</form>
<?php}?>
<?php
}
?>
</body>
</html>