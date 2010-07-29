<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html;charset=ISO-8859-1" http-equiv="Content-Type">
<title><?php if (isset($title)) echo $title ?></title>


<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US" type="text/javascript"></script><script type="text/javascript">FB.init("344b466efbf24a5e767ff7c9f623fa13");</script>
<link rel="stylesheet" type="text/css"
	href="/lib/ext-3.0.0/resources/css/ext-all.css">

<?php if (isset($includes_header)) echo $includes_header ?>
</head>
<body>
<?php if (isset($includes_body)) echo $includes_body ?>
<div
	style="background-image: url(/content/images/header.jpg); height: 110px; margin-bottom: -110px;">&nbsp;
</div>
<?php if ($_SERVER["REQUEST_URI"] == '/app/') {?> 
<div style="margin-right: 30px; margin-top: 40px; margin-bottom: 100px;"
	align="right">

<form>
<a href="#" onclick="FB.Connect.requireSession(); return false;" class="fbconnect_login_button FBConnectButton FBConnectButton_Medium" style="z-index:5">
    <span id="RES_ID_fb_login_text" class="FBConnectButton_Text">Connect with Facebook</span>
</a>
<span style="color:white;">&nbsp;&nbsp;</span>
<input value="Email" name="firstname">&nbsp; <input
	value="Password" name="lastname" type="password">&nbsp;&nbsp;<input
	value="Submit" type="submit"></form>

</div>
<?php } else { ?>
<div style="margin-right: 30px; margin-top: 40px; margin-bottom: 50px;"
	align="right">
&nbsp;
</div>
<?php }?>
<?php if (isset($body)) echo $body ?>

<div
	style="background-image: url(/content/images/footer.jpg); height: 110px;">&nbsp;</div>
<br>
<br>
<?php 
	include_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/google_analytics.inc";
?>
</body>
</html>
