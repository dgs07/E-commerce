<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h2 class="text-center mb-4">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../LOGOS/admin1.jpg" alt="Admin Registration" class="img_fluid">
            </div>
            <div class="col-lg-6 col-xl-5 bg-warning">
                <form action="" method="post"><br><br>
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id ="username" name ="username" placeholder="Enter username" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id ="password" name ="password" placeholder="Enter password" class="form-control" required>
                    </div>
                    
                    <div>
                        <input type="submit" class="bg-info p-2 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="admin_registration.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>