<?php 
    // define("BASE_PATH",$_SERVER['DOCUMENT_ROOT'].'/foodzilla/'); 
    define("BASE_PATH",'http://localhost/foodzilla/');
?>
<html>
<head>
    <script src="<?php echo BASE_PATH; ?>/media/lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/media/lib/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/media/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    
    <link href="<?php echo BASE_PATH; ?>/media/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/media/css/custom.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/media/js/star-rating.js" type="text/javascript"></script>
    <script>
        function GoToHomePage()
        {
            window.location = '/foodzilla/';   
        }
    </script>
    <style>
    </style>
</head>

<!-- As a heading -->
<nav class="navbar navbar-dark bg-dark box-shadow">
  <span class="navbar-brand mb-0 h1"><a onclick="javascript:GoToHomePage()" href="javascript:void(0)">FoodZiLL</a></span>
</nav>