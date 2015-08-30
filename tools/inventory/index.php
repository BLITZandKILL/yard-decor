<?php session_start();if(!isset($_SESSION['pass'])){ header('location:../../admin-portal/index.php');}else if($_SESSION['pass'] !== "password"){ header('location:../../admin-portal/index.php');};

if(isset($_GET["remove"])) {
	$removeKey = $_GET['remove'];
	$mysqli = new mysqli("Database IP","Username","Password","Database");
	$sqlCmd = sprintf("DELETE FROM productTable WHERE `key`=$removeKey");
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
      <h1><a href="tools/inventory/">Inventory Tool</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="left">
      <li><a href="tools/inventory/index.php?s=products">Products</a></li>
      <li><a href="tools/inventory/categories.php">Categories</a></li>
    </ul>
  </section>
</nav>
</div>
<div id="content" align="center">
<?php if(isset($_GET["add"])) { echo "<div data-alert='' class='alert-box success round'>New Item Successfully Added<a href='#' class='close'>×</a></div>"; }?>
<?php if(isset($_GET["remove"])) { echo "<div data-alert='' class='alert-box danger round'>Item Successfully Removed<a href='#' class='close'>×</a></div>"; }?>
<?php if(isset($_GET["edit"])) { echo "<div data-alert='' class='alert-box success round'>Item Successfully Edited<a href='#' class='close'>×</a></div>"; }?>
<table align="center" width="90%" role="grid" class="sortable">
<thead>
	<tr class="header"><th scope="column">ID</th><th scope="column">Image</th><th scope="column">Product</th><th scope="column">Description</th><th scope="column">Category</th><th scope="column">Price</th><th scope="column">Weight</th><th scope="column">Shipping</th><th scope="column">Featured</th><th scope="column">Edit</th><th scope="column">Delete</th></tr>
</thead>
<tbody>
<?php
$mysqli = new mysqli("Database IP","Username","Password","Database");
$query = $mysqli->query("SELECT * FROM productTable") or die('There was a problem, refresh the page!');
$num = $query->num_rows;
while ($row = $query->fetch_assoc()) {
	$f0= "form.php?id=".$row["key"];
	$f1=$row["id"];
	$f2=$row["name"];
	$f3=$row["description"];
	$f4=$row["category"];
	$f5=rtrim($row["images"], ",");
	$f6=$row["price"];
	$f7=$row["weight"];
	$f8=$row["shipping"];
	$f9= "index.php?remove=".$row["key"];
	$f10=$row["featured"];?>
<tr class="prod"><td><?php echo $f1;?></td><td><?php if(strlen($f5) > 1) { echo "<img src=\"../../img/$f5\" width=\"50px\" height=\"50px\">";} else { echo "N/A";}?></td><td><?php echo $f2;?></td><td><?php echo $f3;?></td><td><?php echo $f4;?></td><td><?php echo $f6;?></td><td><?php echo $f7;?></td><td><?php echo $f8;?></td><td><?php if($f10 == 0) {echo "No";}else{echo "Yes";}; ?></td><td><a href="<?php echo $f0;?>"><i class="fa fa-lg fa-pencil" style="padding:8px;"></i></a></td><td><a href="<?php echo $f9;?>"><i class="fa fa-lg fa-remove" style="padding:8px;"></i></a></td></tr>
<?php };?>
</tbody>
<tfoot>
<tr><td colspan=11><hr></td></tr>
<tr><td colspan=6>Designed by Jonathan McClure</td><td colspan=5><a href="#" data-reveal-id="firstModal" class="button success" style="float:right;"><i class="fa fa-plus-square">&nbsp;Add&nbsp;New&nbsp;Item</i></a></td></tr>
<div id="firstModal" class="reveal-modal" data-reveal="" style="opacity: 1; visibility: hidden; display: none;" aria-hidden="true">
    <h2>New Item</h2>
    <p>Please fill in the form below and press submit to add a new item to the inventory database.</p>
    <form action="add.php" method="post"  enctype="multipart/form-data">
		<label for="product">Product Name: </label><input type="text" name="product" align="center" id="product" placeholder="Certified Self-Mailer" required/>
		<label for="productid">Product ID: </label><input type="text" name="id" id="id" placeholder="U39JdP1"/>
		<label for="description">Description</label><input type="text" rows=15 name="description" id="description" placeholder="Enter a description of the prodcut here" />
		<label for="category">Category</label>
		<select name="category" id="category">
			<?php
				$query2 = $mysqli->query("SELECT * FROM categoryTable") or die('There was a problem, refresh the page!');
				$num2 = $query2->num_rows;
				while ($row2 = $query2->fetch_assoc()) { $f0=$row2["name"];
					echo "<option value=\"$f0\">$f0</option>";
				}
			?>
		</select>
		<label for="images">Images</label><input type="file" name="images" id="images" />
		<label for="price">Price:</label><input type="text" name="price" id="price" placeholder="49.99" pattern="\d*\.?\d+?" required/>
		<label for="weight">Weight:</label><input type="text" size=11 name="weight" id="weight" placeholder="10" pattern="\d*\.?\d+?" required/>
		<label for="shipping">Shipping:</label><input type="text" size=4 name="shipping" id="shipping" placeholder="5.99" pattern="\d*\.?\d+?" required/>
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