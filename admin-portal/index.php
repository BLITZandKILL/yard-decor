<?php session_start();if($_SESSION['pass'] == "password"){ header('location:tools/inventory/index.php');} else {?>
	<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Admin Portal Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="signin.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom styles for this template -->
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

	      <form class="form-signin" action="doLogin.php" method="post">
	        <h2 class="form-signin-heading">Please&nbsp;sign&nbsp;in&nbsp;<h5>(<?php echo $_SERVER['REMOTE_ADDR'];?>)</h5></h2>
	        <label for="pass" class="sr-only" autofocus>Password</label>
	        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="">
	        <?php if(isset($_GET["e"])) { if($_GET["e"] == 1) { echo "<font color=\"red\">Incorrect Password</font><br />"; };};?>
	        <input type="submit" class="btn btn-success" name="Login" value="Login">
	      </form>

    </div> <!-- /container -->
</body></html>
<?php }; ?>