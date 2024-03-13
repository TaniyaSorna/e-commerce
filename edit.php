<?php
$con = mysqli_connect('localhost', 'root', '', 'ghorerbazar');
if ($_REQUEST['edit_id']) {
    $id = $_REQUEST['edit_id'];

    $sql = "SELECT * FROM information where id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
}
// if (isset($_POST['update'])) {
//     $id = $_POST['id'];
//     $ProductName = $_POST['ProductName'];
//     $price = $_POST['price'];
//     $quantity = $_POST['quantity'];
//     $img = $_POST['img'];

//     $sql = "UPDATE information set ProductName = '$ProductName', price= $price, quantity=$quantity, img=$img where id = $id";
//     mysqli_query($con, $sql);
//     header('location: read.php');
// }

if (isset($_POST['update'])) {
    $ProductName = $_POST['ProductName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];



    if (isset($_FILES['img'])) {
        $image_name = $_FILES['img']['name'];
        $temp_location = $_FILES['img']['tmp_name'];
        $img_url = 'image/' . $image_name;
        move_uploaded_file($temp_location, $img_url);
    }
    $sql = "UPDATE information set ProductName = '$ProductName', price= $price, quantity=$quantity, img='$img_url' where id = $id";
    mysqli_query($con, $sql);
    header('location: read.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        * {
            font-family: roboto;
        }
    </style>
</head>
<div class="container">
    <div class="col-10 mx-auto mt-5 px-4 rounded-4 ">
        <form action="" method="post" class=" form-control rounded-3 shadow mx-auto px-3 py-3" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" name="id" value="<?php echo $data['id'] ?>">
                <label for="" class=" mt-2   rounded">Product Name</label>
                <input type="text" name="ProductName" value="<?php echo $data['ProductName']; ?>" class=" py-1 form-sm form-control">
            </div>
            <div class="mb-3">
                <label for="" class="rounded">Price</label>
                <input type="text" name="price" value="<?php echo $data['price']; ?>" class=" py-1 form-sm form-control">
            </div>
            <div class="mb-3">
                <label for="" class="  rounded">Quantity</label>
                <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" class=" py-1 form-sm form-control">
            </div>
            <div class="mb-3">
                <label for="" class=" rounded">Product Image</label>
                <input type="file" name="img" value="<?php echo $data['img']; ?>" class=" py-1 form-sm form-control">
            </div>
            <input type="submit" value="Update" name="update" class=" bg-danger my-3 py-2 px-4 border-0 rounded  shadow text-white">
        </form>
    </div>
</div>


<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>