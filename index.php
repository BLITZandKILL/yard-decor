<!DOCTYPE html>
<html lang="en" class="full" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="generator" content=
  "HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Rockhinn Yard Decorations Online Storefront" />
  <meta name="author" content="Jonathan McClure" />
  <link rel="icon" href="favicon.ico" />

  <title>Yard Decor Store</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Custom styles for this template -->
  <link href="css/jumbotron-narrow.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container" style=
  "background-color: rgba(225, 255, 232, 0.65);padding-bottom: 0px;">
    <div class="row"><img src="images/banner.png" width="100%" /></div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12" align="center">
        <div class="clearfix" style=" padding-top: 10px; padding-bottom: 10px;">
          <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#">Home</a></li>

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
                    echo "<li role=\"presentation\"><a href=\"shop.php?c=$f0\">$f0</a></li>";
                  }
                ?>
              </ul>
            </li>

            <li role="presentation"><a href="about.php">About Us</a></li>

            <li role="presentation"><a href="privacy.php">Privacy Policy</a></li>

            <li role="presentation"><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">0</span></a></li>
          </ul>
        </div>

        <p class="section-header"><b>Featured Categories</b></p>

        <div class="row">
          <div class="col-lg-12">
            <?php
            $mysqli = new mysqli("Database IP","Username","Password","Database");
            $category = ucfirst($_GET["c"]);
            $sqlCmd = sprintf("SELECT * FROM categories WHERE featured=1");
            $result = $mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));
            $prodCount = $result->num_rows;
            $i = 1;
            while ($row = $result->fetch_assoc()) { $f0=$row["name"]; $f1=rtrim($row["images"], ",");
              echo "<div class=\"col-lg-3 col-sm-6 col-xs-6 col-md-3\" align=\"center\">";
                echo "<a href=\"shop.php?c=$f0\">";
                echo "<img src=\"img/$f1\" class=\"featured img-thumbnail\">";
                echo "<h4 align=\"center\">$f0</h4>";
                echo "</a>";
              echo "</div>";
              if(($i % 2) == 0) {
                echo "<div class=\"clearfix visible-xs-block visible-sm-block\"></div>";
              }
              if(($i % 4) == 0) {
                echo "<div class=\"clearfix visible-lg-block visible-md-block\"></div>";
              }
              $i++;
            };
          ?>
          </div>
        </div>
        <br />
        <br />
            <?php
            $mysqli = new mysqli("Database IP","Username","Password","Database");
            $category = ucfirst($_GET["c"]);
            $sqlCmd = sprintf("SELECT * FROM products WHERE featured=1");
            $result = $mysqli->query($sqlCmd) or die('Error: ' . mysqli_error($mysqli));
            $prodCount = $result->num_rows;
            $i = 1;
            if($prodCount > 0) {
              echo "<p class=\"section-header\"><b>Featured Products</b></p>";
              echo "<div class=\"row\">";
              echo "<div class=\"col-lg-12\">";
            }
            while ($row = $result->fetch_assoc()) { $f0=$row["key"]; $f1=rtrim($row["images"], ","); $f2=$row["name"]; $f3=substr($row["description"], 0, 90); $f4=$row["price"];
              echo "<div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-6 prodThumbnail\" align=\"center\">";
                echo "<a href=\"product.php?id=$f0\">";
                echo "<img src=\"img/".$f1."\" class=\"prodImg img-thumbnail\">";
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
            if($prodCount > 0) {
              echo "</div>";
              echo "</div>";
              echo "<br /><br />";
            }
          ?>

        <p class="section-header"><b>Reasons to Shop with Us</b></p>

        <div class="col-lg-8 col-lg-offset-2">
        <br />
          <p align="center">
          Rockhinn Yard Decor offers high quality items that will bring out the beauty of your landscape, whether it be a figurine for your back yard, an ornament for your pool, or a Bonsai Tree for yor patio or your home.</p><br />
          <br />
          <p align="center">
          We offer home and garden products in Terracotta, porcelain, glass, iron, Poly-resin, ceramic, and wood. The pottery is hand pressed and hand thrown. The glassware is hand blown and hand painted.</p><br />
          <br />
          <p align="center">
          We also carry the finest Bonsai Trees, for less than $30. Our main goal is to satisfy the customer first and foremost and never put the company's interest before theirs. We ship throughout the continental United States and ship the same day on orders placed before 12 p.m. Central Time.</p>
        </div>
      </div>
    </div>
    <br />
    <br />
  <div class="row">
    <div class="footer" align="right">
      <p style="color: #888;">&#169; Rockhinn Enterprises 2015&nbsp;</p>
    </div>
  </div>
  </div><!-- /container -->
</body>
</html>