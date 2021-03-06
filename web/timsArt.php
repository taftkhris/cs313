<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tim's Art Gallery</title>

    <!-- Bootstrap core CSS -->
    <link href="mainCss.css" rel="stylesheet">
    <!-- vendor/bootstrap/css/bootstrap.min.css -->

    <!-- Custom styles for this template -->
    <link href="artSite.css" rel="stylesheet">
    <!-- css/3-col-portfolio.css -->

  </head>

  <body>

  <?php
    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);
    
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');
    
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $imageLocation = NULL;
    $imageTitle = NULL;
    $imageDescription = NULL;
    $imageDimensions = NULL;
    $imagePrice = 0;
//    $product_row = $db->query('SELECT title, description, dimensions, price, image FROM product');
    // $stmt = $db->query('SELECT product_id, title, description as descr, dimensions, price, image FROM product');
    // $product_row = $stmt->fetch(PDO::FETCH_BOTH);
    
    // if ($product_row != NULL)
    // {
    //   $productId= $product_row['product_id'];
    //   $imageLocation = $product_row['image'];
    //   $imageTitle = $product_row['title'];
    //   $imageDescription = $product_row["descr"];
    //   $imageDimensions = $product_row["dimensions"];
    //   $imagePrice = $product_row["price"];
    // }

    $query = "SELECT product_id, title, description as descr, dimensions, price, image FROM product";

    $statement = $db->prepare($query);

    //bind any variables needed here...

    $statement->execute();
    $product = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Tim's Art</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Gallery
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Tim's Art
        <!-- <small>Secondary Text</small> -->
      </h1>

      <div class="row">
      <?php 
       foreach ($product as $product_row)
       {
        $productId = $product_row['product_id'];
        $imageLocation = $product_row['image'];
        $imageTitle = $product_row['title'];
        $imageDescription = $product_row["descr"];
        $imageDimensions = $product_row["dimensions"];
        $imagePrice = $product_row["price"];

          echo "<div class='col-lg-4 col-sm-6 portfolio-item'>";
          echo  "<div class='card h-100'>";
          echo     "<a href='#'><img class='card-img-top' src='artWork/$imageLocation' alt=''></a>";
          echo    "<div class='card-body'>"; 
          echo      "<h4 class='card-title'>";
          echo        "<a href='details.php?productId=$productId'> $imageTitle </a>";
          echo      "</h4>";
          echo      "<p class='card-text'>$imageDescription</p>";
          echo    "</div>";
          echo  "</div>";
          echo "</div>";
       }
      ?>
      </div>
      <!-- <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<//?php echo "artWork/" . $imageLocation;?>" alt=""></a>
            <div class="card-body"> 
              <h4 class="card-title">
                <a href="details.php?productId=<//?php echo $productId; ?>"><//?php echo $imageTitle; ?></a>
              </h4>
              <p class="card-text"><//?php echo $imageDescription?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<//?php echo "artWork/" . $imageLocation;?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="<//?php echo "artWork/" . $imageLocation;?>"></a>
              </h4>
              <p class="card-text"><//?php echo $imageDescription; ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>