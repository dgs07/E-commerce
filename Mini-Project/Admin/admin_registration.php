<?php include('../includes/connect.php');
      include('../functions/common_functions.php');
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
        </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-4">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../LOGOS/admin1.jpg" alt="Admin Registration" class="img_fluid">
            </div>
            <div class="col-lg-6 col-xl-5 bg-warning">
                <form action="" method="post"><br>
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id ="username" name ="username" placeholder="Enter username" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id ="email" name ="email" placeholder="Enter e-mail" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id ="password" name ="password" placeholder="Enter password" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id ="Confirm_password" name ="Confirm_password" placeholder="Enter username" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" class="bg-info p-2 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="admin_login.php"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
    $admin_name = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['confirm_password'];

    // select query
    $select_query = "Select * from `admin` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username/Email already exists')</script>";
    }elseif($admin_password!=$conf_admin_password){
        echo "<script>alert('Check your password once')</script>";
    }
    else{
            // insert query
    $insert_query = "insert into `admin` (admin_name,admin_email,admin_password)
                     values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute = mysqli_query($con,$insert_query);
    echo "<script>alert('Data inserted successfully')</script>";
    }
}


?>