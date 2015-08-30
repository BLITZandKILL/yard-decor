<?php session_start();if(!isset($_SESSION['pass'])){ header('location:../../admin-portal/index.php');}else if($_SESSION['pass'] !== "password"){ header('location:../../admin-portal/index.php');};
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
	if ($uploadOk == 0) {
		if($_POST['featured'] == 1) {
			echo "<html><body><div width=\"50%\" align=\"center\"><h2>WARNING: You may have featured a product with no image associated to it! There will be a corrupted image on the home page until you upload an image for this product or remove it from featured products.</h2><a href=\"index.php?add=success\"><button>Continue</button></a></div></body></html>";
		}
	    echo "Sorry, your file was not uploaded. The other changes you made have been saved!<br><a href=\"index.php\"><button>Continue</button></a>";
	    $imgName = "";
		$mysqli = new mysqli("Database IP","Username","Password","Database");
		$productid = $_POST['id'];
			$sqlCmd = sprintf("INSERT INTO productTable (id, name, description, images, category, price, weight, shipping, featured) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')", 
				$mysqli->real_escape_string($_POST["id"]),
				$mysqli->real_escape_string($_POST["product"]),
				$mysqli->real_escape_string($_POST["description"]),
				$mysqli->real_escape_string($imgName.","),
				$mysqli->real_escape_string($_POST["category"]),
				$mysqli->real_escape_string($_POST["price"]),
				$mysqli->real_escape_string($_POST["weight"]),
				$mysqli->real_escape_string($_POST["shipping"]),
				$mysqli->real_escape_string($_POST["featured"]));
			
			$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error());
		
			$mysqli->close();
			header("location:tools/inventory/index.php?add=success");
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
	    	$imgName = basename($_FILES["images"]["name"]);
		$mysqli = new mysqli("Database IP","Username","Password","Database");
		$productid = $_POST['id'];
			$sqlCmd = sprintf("INSERT INTO productTable (id, name, description, images, category, price, weight, shipping, featured) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')", 
				$mysqli->real_escape_string($_POST["id"]),
				$mysqli->real_escape_string($_POST["product"]),
				$mysqli->real_escape_string($_POST["description"]),
				$mysqli->real_escape_string($imgName.","),
				$mysqli->real_escape_string($_POST["category"]),
				$mysqli->real_escape_string($_POST["price"]),
				$mysqli->real_escape_string($_POST["weight"]),
				$mysqli->real_escape_string($_POST["shipping"]),
				$mysqli->real_escape_string($_POST["featured"]));
			
			$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error());
		
			$mysqli->close();
			header("location:tools/inventory/index.php?add=success");
		} else {
			if($_POST['featured'] == 1) {
			echo "<html><body><div width=\"50%\" align=\"center\"><h2>WARNING: You may have featured a product with no image associated to it! There will be a corrupted image on the home page until you upload an image for this product or remove it from featured products.</h2><a href=\"index.php?add=success\"><button>Continue</button></a></div></body></html>";
		}
	        echo "<html><body><div width=\"50%\" align=\"center\"><h2>Sorry, there was an error uploading your file. The other changes you made have been saved!<br></h2><a href=\"index.php\"><button>Continue</button></a></div></body></html>";
	        $mysqli = new mysqli("Database IP","Username","Password","Database");
			$productid = $_POST['id'];
			$imgName = "";
				
				$sqlCmd = sprintf("INSERT INTO productTable (id, name, description, images, category, price, weight, shipping, featured) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')", 
					$mysqli->real_escape_string($_POST["id"]),
					$mysqli->real_escape_string($_POST["product"]),
					$mysqli->real_escape_string($_POST["description"]),
					$mysqli->real_escape_string($imgName.","),
					$mysqli->real_escape_string($_POST["category"]),
					$mysqli->real_escape_string($_POST["price"]),
					$mysqli->real_escape_string($_POST["weight"]),
					$mysqli->real_escape_string($_POST["shipping"]),
					$mysqli->real_escape_string($_POST["featured"]));
				
				$mysqli->query($sqlCmd) or die('Error: ' . mysqli_error());
			
				$mysqli->close();
		}
	}
} else {
	echo "<html><body align='center'><div width=\"50%\" align=\"center\"><h3><font color='red'><h2>The item <b>\"<i>".$_POST["id"]."</i>\"</b> already exists!</h2></font></h3><a href='tools/tools/inventory/inventory/'><br><button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a></div></body></html>";
	exit;
}
	?>