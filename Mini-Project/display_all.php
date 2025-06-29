<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shopping website</title>
    <!--css link  -->
    <link rel="stylesheet" href="styling.css">
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning color" >
    <div class="container-fluid">
    <img src="./LOGOS/oslogo.png" alt="" class = "logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-2">
  <ul class="navbar-nav me-auto">
        <?php
                if(!isset($_SESSION['username'])){
                  echo "  <li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
                }else{
                  echo "  <li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
                }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/user-login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/logout.php'>Logout</a>
        </li>";
        }
        ?>
  </ul>
</nav>

<!-- Third Child-->
<div class="row">
  <div class="col-md-2 bg-info p-0">
    <!--sidenav-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-light"><h5>Delivery Brands</h5></a>
      </li>

      <!-- php file -->
      <?php
        getbrands();
      ?>

    </ul>
    <!-- categories displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
      </li>
            <!-- php file -->
      <?php
        getcategories();
      ?>
    </ul>
  </div>
  <div class="col-md-10">
    <!--products-->
    <div class="row">
      <!-- fetching products -->
      <?php
      // calling function
      get_all_products();
      get_unique_categories();
      get_unique_brands();
      ?>
      <!--row end-->
    </div>
<!-- column end -->
  </div>

<!-- include footer -->
<?php  include('./includes/footer.php')  ?>



    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>