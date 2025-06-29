<?php include('../includes/connect.php');
      include('../functions/common_functions.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!-- bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-3">
                        <label for="user_useremail" class="form-label">Email</label>
                        <input type="text" id="user_useremail" name="user_useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                    </div>
                     <!-- password field -->
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-3">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required>
                    </div>
                     <!-- address field -->
                     <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" name="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required>
                    </div>
                     <!-- contact field -->
                     <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Register" class="bg-warning py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="user_login.php"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_useremail'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();

    // select query
    $select_query = "Select * from `user` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username/Email already exists')</script>";
    }elseif($user_password!=$conf_user_password){
        echo "<script>alert('Check your password once')</script>";
    }
    else{
            // insert query
    $insert_query = "insert into `user` (username,user_email,user_password,user_ip,user_address,user_mobile)
    values ('$user_username','$user_email','$hash_password','$user_ip',' $user_address','$user_contact')";
    $sql_execute = mysqli_query($con,$insert_query);
    echo "<script>alert('Data inserted successfully')</script>";
    }

    // selecting cart items
    $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con,$select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../home.php','_self')</script>";
    }
}


?>