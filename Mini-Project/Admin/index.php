<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styling.css">
    <style>
    .aimage{
    width: 100px;
    object-fit: contain;
    }
    .footer{
    bottom: 0;
    }
    </style>
    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <img src="../LOGOS/logo.png" alt="" class = "logo p-1">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Secondary child -->
        <div class="bg-secondary mt-2">
            <h3 class="text-center text-light p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-info p-1 d-flex">
                <div class="p-3">
                    <a href="#"><img src="../Electronics/smartwatch.png" alt=""  class="aimage"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-warning my-1">Insert Products</a></button>
                    <!-- <button><a href="" class="nav-link text-light bg-warning my-1">View Products</a></button> -->
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-warning my-1">Insert Categories</a></button>
                    <!-- <button><a href="" class="nav-link text-light bg-warning my-1">View Categories</a></button> -->
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-warning my-1">Insert Brands</a></button>
                    <!-- <button><a href="" class="nav-link text-light bg-warning my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-warning my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-warning my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-warning my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-warning my-1">Logout</a></button> -->
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            ?>
        </div>
        <!-- last child -->
        <div class="bg-warning p-2 text-center mt-2 footer">
    <p>All Rights are reserved </p>
  </div>
    </div>

<!--Bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>