<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html;charset=ISO-8859-1" http-equiv="Content-Type">
<title><?php if (isset($title)) echo $title ?></title>
<link rel="stylesheet" type="text/css"
	href="/lib/ext-3.0.0/resources/css/ext-all.css">

<?php if (isset($includes_header)) echo $includes_header ?>
</head>
<body>
<?php if (isset($includes_body)) echo $includes_body ?>
<div
	style="background-image: url(/content/images/header.jpg); height: 110px; ">&nbsp;
</div>


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
