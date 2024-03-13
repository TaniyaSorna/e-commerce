<?php
if (isset($_POST['submit'])) {
    $ProductName = $_POST['ProductName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];



    if (isset($_FILES['img'])) {
        $image_name = $_FILES['img']['name'];
        $temp_location = $_FILES['img']['temp_name'];
        $img_url = 'image/' . $image_name;
        move_uploaded_file($temp_location, $img_url);
        echo $img_url;
    }


    $conn = mysqli_connect('localhost', 'root', '', 'ghorerbazar');
    $sql = "INSERT INTO information ( ProductName, price, quantity, img) VALUES ('$ProductName', $price, $quantity, '$img')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $insert = 'Data Insert';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-family: roboto;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto p-5 border-1 border-black ">
                <form action="" method="post" class="bg-white p-4   shadow" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="" class=" mb-2">Product Name</label>
                        <input type="text" name="ProductName" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class=" mb-2  ">Product Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class=" mb-2">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class=" mb-2"> Product Img </label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <input type="submit" value="SUBMIT" name="submit" class="btn btn-danger  fw-normal px-4  ">
                    <a href="./read.php" class="btn btn-sm bg-primary   mt-4 py-2 px-3 text-white  d-inline inline-block ms-1 rounded">SHOW DATA</a>
                </form>




            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>