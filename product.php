<?php
    if(isset($_GET["id"])) {
      if($_GET["id"] >= 0 && strlen($_GET["id"] )!= 0 && $_GET["id"] != ""){
        $key = $_GET["id"];
        $mysqli = new mysqli("Database IP","Username","Password","Database");
        $query = $mysqli->query("SELECT * FROM productTable WHERE `key`='$key'") or die('There was a problem, refresh the page!');
        $num = $query->num_rows;
        $row = $query->fetch_assoc();
        $name = $row["name"];
        $description = $row["description"];
        $id = $row["id"];
        $category = $row["category"];
        $images = rtrim($row["images"], ",");
        $price = $row["price"];
        $weight = $row["weight"];
        $shipping = $row["shipping"];
      } else {
        header("location:404.php");
      }
    } else {
      header("location:404.php");
    }
  ?>
<html lang="en" class="full" xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta name="generator" content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" <!--="" the="" above="" 3="" meta="" tags="" *must*="" come="" first="" in="" head;="" any="" other="" head="" must="" *after*="" these="" --="">
  <meta name="description" content="Rockhinn Yard Decorations Online Storefront">
  <meta name="author" content="Jonathan McClure">
  <link rel="icon" href="favicon.ico">

  <title><?php echo $name;?> | Rockhinn Yard Decor</title><!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
  <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/jumbotron-narrow.css" rel="stylesheet" type="text/css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css"></style></head>

<body>


  <div id="blueimp-gallery" class="blueimp-gallery">
      <!-- The container for the modal slides -->
      <div class="slides"></div>
      <!-- Controls for the borderless lightbox -->
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
      <!-- The modal dialog, which will be used to wrap the lightbox content -->
      <div class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body next"></div>
              </div>
          </div>
      </div>
  </div>



  <div class="container" style="background-color: rgba(225, 255, 232, 0.65);padding-bottom: 0px;">
    <div class="row"><img src="images/banner.png" width="100%"></div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12" align="center">
        <div class="clearfix" style=" padding-top: 10px; padding-bottom: 10px;">
          <ul class="nav nav-pills">
            <li role="presentation"><a href="index.php">Home</a></li>

            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Products <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <?php
                  $mysqli = new mysqli("Database IP","Username","Password","Database");
                  $query2 = $mysqli->query("SELECT * FROM categoryTable") or die('There was a problem, refresh the page!');
                  $num2 = $query->num_rows;
                  while ($row2 = $query2->fetch_assoc()) { $f0=$row2["name"];
                    if($f0 == urldecode($_GET["c"])) {
                      echo "<li role=\"presentation\" class=\"active\"><a href=\"shop.php?c=$f0\">$f0</a></li>";
                    } else {
                      echo "<li role=\"presentation\"><a href=\"shop.php?c=$f0\">$f0</a></li>";
                    }
                  }
                ?>
              </ul>
            </li>

            <li role="presentation"><a href="about.php">About Us</a></li>

            <li role="presentation"><a href="privacy.php">Privacy Policy</a></li>

            <li role="presentation"><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">0</span></a></li>
          </ul>
        </div>

        <p class="section-header"><ol class="breadcrumb"><li><a href="index.php">Products</a></li><li><?php echo "<a href='shop.php?c=$category'>$category</a>";?></li><li class="active"><?php echo "$name";?></li></ol></p>

        <div class="row">
          <div class="col-lg-12">
  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <a href="img/<?php echo $images;?>" title="<?php echo $name;?>" data-gallery><img src="img/<?php echo $images;?>" alt="<?php echo $name;?>" class="itemView img-thumbnail"></a>
  </div>

<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"><h3><b><?php echo $name;?></b></h3>
  
  <h4>$<?php echo $price;?></h4>
  <form method="post">
    <label>Quantity: <input type="number" value="1" name="quantity" id="quantity" required="" style="width: 40px;"></label><br>
    <input type="hidden" name="product" id="product" value="<?php echo $key;?>">
  	<a href="#addItem"><img src="images/addtocart.png"></a>
  </form><br>
  <br>
  <p><?php echo $description;?></p>
  
  </div></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
            <p class="section-header"><b>Related Products</b></p>
            <div class="row">
              <div class="col-lg-12">
                <?php
                  $mysqli = new mysqli("Database IP","Username","Password","Database");
                  $sqlCmd = sprintf("SELECT * FROM products WHERE category='$category' AND `key`!='$key' LIMIT 6");
                  $result = $mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));
                  $prodCount = $result->num_rows;
                  $i = 1;
                  while ($row = $result->fetch_assoc()) { $f0=$row["key"]; $f1=rtrim($row["images"], ","); $f2=$row["name"]; $f3=substr($row["description"], 0, 90); $f4=$row["price"];
                    echo "<div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-6 prodThumbnail\" align=\"center\">";
                      echo "<a href=\"product.php?id=$f0\">";
                      echo "<img src=\"img/".$f1."\" class=\"prodImg img-thumbnail\" alt='".$f2."''>";
                      echo "<div class=\"caption post-content\"><p>$".$f4."</p></div>";
                      echo "<p align=\"center\" class=\"prodTitle\">".$f2."</p>";
                      echo "<p class=\"prodDesc\">".$f3."</p>";
                      echo "</a>";
                    echo "</div>";
                    if(($i % 2) == 0) {
                      echo "<div class=\"clearfix visible-xs-block visible-sm-block\"></div>";
                    }
                    if(($i % 3) == 0) {
                      echo "<div class=\"clearfix visible-lg-block visible-md-block\"></div>";
                    }
                    $i++;
                  };
                ?>
              </div>
            </div>       
      </div>
    </div>
    <div class="row">
      <div class="footer" align="right">
        <p style="color: #888;">&#169; Rockhinn Enterprises 2015&nbsp;</p>
      </div>
    </div>
  </div><!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/bootstrap-image-gallery.min.js"></script>
</body></html>