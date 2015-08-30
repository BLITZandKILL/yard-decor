<?php session_start();if(!isset($_SESSION['pass'])){ header('location:../../admin-portal/index.php');}else if($_SESSION['pass'] != "password"){ header('location:../../admin-portal/index.php');};

if(isset($_GET["remove"])) {
	$removeKey = $_GET['remove'];
	$mysqli = new mysqli("Database IP","Username","Password","Database");
	$sqlCmd = sprintf("DELETE FROM categoryTable WHERE `key`=$removeKey");
	$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));
	$mysqli->close();
}

?>
<html class="no-js" lang="en" >
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script type="text/javascript" language="javascript" src="/js/jquery-1.11.3.min.js"></script>
<script src="js/sorttable.js"></script>

</head>
<body align="center">
<style>
@media only screen and (max-width: 767px) {

input{ 
    text-align:center;
	padding: 15px;
}
label {
	font-size: 18pt;
}
input[type=text], input[type=number], input[type=email], input[type=password], input[type=submit] {
  -webkit-appearance: none;
  -moz-appearance: none;
  display: block;
  margin: 0;
  width: 100%;
  height: 60px;
  line-height: 40px;
  font-size: 17pt;
  border: 1px solid #bbb;
}

}
.prod:hover {
	background-color: #dbdbdb;
}
.prod:nth-child(odd) {
	background-color: #ebebeb;
}
.prod:nth-child(odd):hover {
	background-color: #ddd;
}
tr th{
	text-align:center;
}
table { table-layout:ellipsis;}
#content {
	padding: 10px;
}
input{ 
    text-align:center;
}
</style>
<div id="wrapper">
<div id="header">
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="tools/inventory/categories.php">Category Tool</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="left">
      <li><a href="tools/inventory/index.php">Products</a></li>
      <li><a href="tools/inventory/categories.php">Categories</a></li>
    </ul>
  </section>
</nav>
</div>
<div id="content" align="center">
<?php if(isset($_GET["add"])) { echo "<div data-alert='' class='alert-box success round'>New Category Successfully Added<a href='#' class='close'>×</a></div>"; }?>
<?php if(isset($_GET["remove"])) { echo "<div data-alert='' class='alert-box danger round'>Category Successfully Removed<a href='#' class='close'>×</a></div>"; }?>
<?php if(isset($_GET["edit"])) { echo "<div data-alert='' class='alert-box success round'>Category Successfully Edited<a href='#' class='close'>×</a></div>"; }?>
<table align="center" width="90%" role="grid" class="sortable">
<thead>
	<tr class="header"><th scope="column">Name</th><th scope="column">Image</th><th scope="column">Featured</th><th scope="column">Edit</th><th scope="column">Delete</th></tr>
</thead>
<tbody>
<?php
$mysqli = new mysqli("Database IP","Username","Password","Database");
$query = $mysqli->query("SELECT * FROM categoryTable") or die('There was a problem, refresh the page!');
$num = $query->num_rows;
while ($row = $query->fetch_assoc()) {
	$f0= "editcategory.php?id=".$row["key"];
	$f2=$row["name"];
	$f3=$row["featured"];
	$f5=rtrim($row["images"], ",");
	$f9= "categories.php?remove=".$row["key"];?>
<tr class="prod"><td><?php echo $f2;?></td><td><?php if(strlen($f5) > 1) { echo "<img src=\"../../img/$f5\" width=\"50px\" height=\"50px\">";} else { echo "N/A";}?></td><td><?php if($f3 == 0) {echo "No";}else{echo "Yes";}; ?></td><td><a href="<?php echo $f0;?>"><i class="fa fa-lg fa-pencil" style="padding:8px;"></i></a></td><td><a href="<?php echo $f9;?>"><i class="fa fa-lg fa-remove" style="padding:8px;"></i></a></td></tr>
<?php };?>
</tbody>
<tfoot>
<tr><td colspan=5><hr></td></tr>
<tr><td colspan=3>Designed by Jonathan McClure</td><td colspan=2><a href="#" data-reveal-id="firstModal" class="button success" style="float:right;"><i class="fa fa-plus-square">&nbsp;Add&nbsp;New&nbsp;Category</i></a></td></tr>
<div id="firstModal" class="reveal-modal" data-reveal="" style="opacity: 1; visibility: hidden; display: none;" aria-hidden="true">
    <h2>New Item</h2>
    <p>Please fill in the form below and press submit to add a new item to the inventory database.</p>
    <form action="addcategory.php" method="post"  enctype="multipart/form-data">
		<label for="product">Product Name: </label><input type="text" name="product" align="center" id="product" placeholder="Certified Self-Mailer" required/>
		<label for="images">Images</label><input type="file" name="images" id="images" />
		<label for="featured">Featured?</label><select name="featured" id="featured"><option value=0>No</option><option value=1>Yes</option></select>
		<input type="submit" class="button success" value="Submit" />
	</form>
    <a class="close-reveal-modal" href="tools/inventory/">×</a>
</div>
</tfoot>
</table>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html>