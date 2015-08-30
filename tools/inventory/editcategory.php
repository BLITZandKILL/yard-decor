<?php session_start();if(!isset($_SESSION['pass'])){ header('location:../../admin-portal/index.php');}else if($_SESSION['pass'] != "password"){ header('location:../../admin-portal/index.php');};
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$target_dir = "../../img/";
	$target_file = $target_dir . basename($_FILES["images"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["images"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		if($_POST['featured'] == 1) {
			echo "<html><body><div width=\"50%\" align=\"center\"><h2>WARNING: You may have featured a category with no image associated to it! There will be a corrupted image on the home page until you upload an image for this category or remove it from featured categories.</h2><a href=\"categories.php?add=success\"><button>Continue</button></a></div></body></html>";
		}
	        echo "<html><body><div width=\"50%\" align=\"center\"><h2>Sorry, there was an error uploading your file. The other changes you made have been saved!<br></h2><a href=\"categories.php\"><button>Continue</button></a></div></body></html>";
			$mysqli = new mysqli("Database IP","Username","Password","Database");
					
			$productkey = $_POST["productkey"];
			
			$sqlCmd = sprintf("UPDATE categoryTable SET name='".$mysqli->real_escape_string($_POST['product'])."', featured='".$mysqli->real_escape_string($_POST['featured'])."' WHERE `key`=".$productkey."");
			
			$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));

			$mysqli->close();
			header("location:tools/inventory/categories.php?edit=success");
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
	    	$imgName = basename($_FILES["images"]["name"]);
	$mysqli = new mysqli("Database IP","Username","Password","Database");
			
	$productkey = $_POST["productkey"];
	
	$sqlCmd = sprintf("UPDATE categoryTable SET name='".$mysqli->real_escape_string($_POST['product'])."', images='".$imgName.",', featured='".$mysqli->real_escape_string($_POST['featured'])."' WHERE `key`=".$productkey."");
	
	$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));

	$mysqli->close();
	header("location:tools/inventory/categories.php?edit=success");

	} else {
			if($_POST['featured'] == 1) {
				echo "<html><body><div width=\"50%\" align=\"center\"><h2>WARNING: You may have featured a category with no image associated to it! There will be a corrupted image on the home page until you upload an image for this category or remove it from featured categories.</h2><a href=\"categories.php?add=success\"><button>Continue</button></a></div></body></html>";
			}
			$mysqli = new mysqli("Database IP","Username","Password","Database");
					
			$productkey = $_POST["productkey"];
			
			$sqlCmd = sprintf("UPDATE categoryTable SET name='".$mysqli->real_escape_string($_POST['product'])."', featured='".$mysqli->real_escape_string($_POST['featured'])."' WHERE `key`=".$productkey."");
			
			$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));

			$mysqli->close();
			header("location:tools/inventory/categories.php?edit=success");
	    }
	}
}
else {?>
<html class="no-js" lang="en" >
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
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
<div id="content" align="center" class="col-lg-7">
<?php
	$product = $_GET["id"];
	$mysqli = new mysqli("Database IP","Username","Password","Database");
	$query = $mysqli->query("SELECT * FROM categoryTable WHERE `key`='".$product."'") or die('You have entered an address that is not in the database, try again!');
	$num = $query->num_rows;
	while ($row = $query->fetch_assoc()) {
	$f0= $row["key"];
	$f2=$row["name"];
	$f5=$row["images"];
	$f9=$row["featured"];?>
<form method="post"  enctype="multipart/form-data">
		<label for="product">Category Name: </label><input type="text" name="product" align="center" id="product" value="<?php echo $f2;?>" required/>
		<label for="images">Images</label><input type="file" name="images" id="images" />
		<label for="featured">Featured?</label><select name="featured" id="featured"><option <?php if($f9 == 0) {echo "selected=\"selected\" ";};?>value=0>No</option><option <?php if($f9 == 1) {echo "selected=\"selected\" ";};?>value=1>Yes</option></select>
		<input type="hidden" name="productkey" id="productkey" value=<?php echo $f0;?> required/>
		<input type="submit" class="button success" value="Submit" />
	</form>
	<a href="tools/inventory/categories.php"><button style="button error">Go Back</button></a>
<?php 
};
?>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html>
<?php 
};
?>