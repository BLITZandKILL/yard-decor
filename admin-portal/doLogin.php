<?php
    session_start();
	$iplogpath_to_file = 'iplog.txt';
	$iplogtime = date("Y-m-d | H:i:s");
	$cururl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$iplogfile_contents = file_get_contents($iplogpath_to_file);
	$iplogfile_contents .= "\r\n".$_SERVER['REMOTE_ADDR']." @ ".$iplogtime." | ".$cururl;
	file_put_contents($iplogpath_to_file, $iplogfile_contents);
	if(isset($_POST['pass'])){
		if($_POST['pass'] == "password")
		{
			$_SESSION['pass'] = $_POST['pass'];
			header('location:tools/inventory/index.php');
		}
	} else {
		header('location:../../admin-portal/index.php');
	};
	if(isset($_SESSION['pass'])){
		if($_SESSION['pass'] == "password")
		{
			$_SESSION['pass'] = $_SESSION['pass'];
			header('location:tools/inventory/index.php');
		}
	} else {
		header('location:../../admin-portal/index.php?e=1');
	};
?>