<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details</title>
    <!--css link  -->
    <link rel="stylesheet" href="styling.css">
    <style>
        .cart_img{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
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
          <a class="nav-link active" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

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
<div class="container">
    <div class="row">
        <form action="" method="post" >
        <table class="table table-bordered text-center">


            <?php
              $get_ip_add = getIPAddress();
              $total_price = 0;
              $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
              $result = mysqli_query($con,$cart_query);
              $result_count = mysqli_num_rows($result);
              if($result_count>0){
                echo "            <thead>
                <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";
              while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id= $product_id";
                $result_products = mysqli_query($con,$select_products);
                while($row_product_price = mysqli_fetch_array($result_products)){
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_values = array_sum($product_price);
                  $total_price+=$product_values;
            ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                     $get_ip_add = getIPAddress();
                     if(isset($_POST['update_cart'])){
                        $quantities = $_POST['qty'];
                        $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                        $result_quantity = mysqli_query($con,$update_cart);
                        $total_price = $total_price*$quantities;
                     }
                    ?>
                    <td><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <!-- <button class="bg-warning p-2 border-0 m-2">Update</button> -->
                        <input type="submit" value="Update cart" class="bg-warning p-2 border-0 m-2" name="update_cart">
                        <!-- <button class="bg-warning p-2 border-0 m-2">Remove</button> -->
                        <input type="submit" value="Remove" class="bg-warning p-2 border-0 m-2" name="remove_cart">
                    </td>
                </tr>
                <?php
                }
            }
        }
        else{
            echo "<h3 class='text-center text-danger'>Cart is empty</h3>";
        }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="dflex bg-light">
            <?php
                          $get_ip_add = getIPAddress();
                          $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                          $result = mysqli_query($con,$cart_query);
                          $result_count = mysqli_num_rows($result);
                          if($result_count>0){
                            echo "<h4 class='px-3 m-2'>Subtotal: <strong class='text-warning'> $total_price/-</strong></h4>
                            <input type='submit' value='Continue Shopping' class='bg-warning p-2 border-0 m-2' name='continue_shopping'>
                            <button class='bg-info p-2 border-0 m-2 text-light'><a href='./user/checkout.php' class='text-light text-decoration-none'>CheckOut</a></button>";
                          }else{
                            echo " <input type='submit' value='Continue Shopping' class='bg-warning p-2 border-0 m-2' name='continue_shopping'>";
                          }
                          if(isset($_POST['continue_shopping'])){
                            echo "<script>window.open('home.php','_self')</script>";
                          }
            ?>

        </div>
    </div>
</div>
</form>

<!-- function to remove item -->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query = "delete from `cart_details` where product_id=$remove_id";
            $run_delete = mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }

        }
    }
}
echo $remove_item = remove_cart_item();
?>

  <!-- includes footer -->
  <?php  include('./includes/footer.php')  ?>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>