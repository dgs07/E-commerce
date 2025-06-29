<?php
include('../includes/connect.php');
if(isset($_POST['insert_brd'])){
    $brand_title = $_POST['brd_title'];

    // select data from database
    $select_query = "Select * from `brands` where brand_title = '$brand_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Brand already exists!')</script>";
    }else{
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
}
?>
<h2 class="text-center m-3 bg-light">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control"  name="brd_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-warning border-0 p-2 my-2"  name="insert_brd" value="Insert Brands">
    </div>
</form>