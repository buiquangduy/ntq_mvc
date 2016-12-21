<!DOCTYPE html>
<html>
<head>
	<title>NTQ-Thuan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="icon" type="image/ico" href="./app/assets/img/favicon.ico"/>
    <link href="./app/assets/css_template/stylesheets.css" rel="stylesheet" type="text/css"/>
    <link href="./app/assets/css_template/icons.css" rel="stylesheet" type="text/css"/>
    <link href="./app/assets/css_template/stylesheet.css" rel="stylesheet" type="text/css"/>
    <link href="./app/assets/css_template/login.css" rel="stylesheet" type="text/css"/>
    <link href="./app/assets/css_template/bootstrap.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="./app/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./app/assets/js/duy-validate/jquery.validate.min.js"></script><!--phai dat truoc additional -->
	<script type="text/javascript" src="./app/assets/js/duy-validate/additional-methods.min.js"></script>
    <script type="text/javascript" src="./app/assets/js_template/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="./app/assets/js_template/myscript.js"></script>
</head>
<body>
	<?php if(!isset($_SESSION["username"])){
	 	 	session_destroy();
	 	 	include "./routes.php";
		 } 
		 else
		 {
			include "./app/views/header.php"; 
		 	include "./routes.php"; 
		 }
		?>
</body>
</html>