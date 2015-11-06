
<html lang='en'>
<head>
<title>Membership Form</title>
<link rel='stylesheet' type='text/css' href='common.css' />
</head>
<body>
<h1>Membership Form</h1>
<p>Thanks for choosing to join The Widget Club. To register, please fill
in your details below and click Send Details.</p>
<form action='process.php' method='post'>
<div style='width: 30em;'>
<label for='firstName'>First name</label>
<input type='text' name='firstName' id='firstName' value='' />
<label for='lastName'>Last name</label>
<input type='text' name='lastName' id='lastName' value='' />
<label
<input
<label
<input for='password1'>Choose a password</label>
type='password' name='password1' id='password1' value='' />
for='password2'>Retype password</label>
type='password' name='password2' id='password2' value='' />
<label
<input
<label
<input for='genderMale'>Are you male...</label>
type='radio' name='gender' id='genderMale' value='M' />
for='genderFemale'>...or female?</label>
type='radio' name='gender' id='genderFemale' value='F' />
<label for='favoriteWidgets'>What are your favorite widgets?</label>
<select name='favoriteWidgets[]' id='favoriteWidgets' size='3'
multiple='multiple'>
<option value='superWidget'>The SuperWidget</option>
<option value='megaWidget'>The MegaWidget</option>
<option value='wonderWidget'>The WonderWidget</option>
</select>
<label for='newsletterWidgetTimes'>Do you want to receive our
‘Widget Times’ newsletter?</label>
<input type='checkbox' name='newsletter[]' id='newsletterWidget
Times' value='widgetTimes' />

<label for='newsletterFunWithWidgets'>Do you want to receive our
‘Fun with Widgets’ newsletter?</label>
<input type='checkbox' name='newsletter[]' id='newsletterFunWith
Widgets' value='funWithWidgets' />
<label for='comments'>Any comments?</label>
<textarea name='comments' id='comments' rows='4' cols='50'>
</textarea>
<div style='clear: both;'>
<input type='submit' name='submitButton' id='submitButton'
value='Send Details' />
<input type='reset' name='resetButton' id='resetButton'
value='Reset Form' style='margin-right: 20px;' />
</div>
</div>
</form>
</body>
</html>