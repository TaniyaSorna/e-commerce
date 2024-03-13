<?php
$conn = mysqli_connect('localhost', 'root', '', 'ghorerbazar');
$sql = "SELECT * FROM information";
$data = mysqli_query($conn, $sql);

if (isset($_GET['delete_id'])) {
    $id =  $_GET['delete_id'];
    $delete_sql = "DELETE FROM information WHERE id = $id";
    mysqli_query($conn, $delete_sql);
    header('location: read.php');
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    header("location: edit.php?edit_id=$id");
}
if (isset($_GET['quantity_id'])) {
    $id = $_GET['quantity_id'];
    header("location: quantity.php?quantity_id=$id");
}

if (isset($_GET['quantity_id'])) {
    $id = $_GET['quantity_id'];
    header("location: quantity.php?quantity_id=$id");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto mt-5 p-5 ">
                <span><a href="./index.php" class="btn bg-success text-white px-4 py-2 mb-3 shadow te inline-block">CREATE</a></span>
                <table border="1" cellpadding="10" class="table mt-1 shadow text-center ">
                    <thead>
                        <tr>
                            <td class="bg-primary text-white   ">Id</td>
                            <td class="bg-primary text-white   ">Product Name</td>
                            <td class="bg-primary text-white   ">Product Price</td>
                            <td class="bg-primary text-white   ">Product Quantity</td>
                            <td class="bg-primary text-white   ">Product Img</td>
                            <td class="bg-primary text-white   ">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($data)) {
                            echo '<tr>';
                            echo '<td>' . $rows['id']  . '</td>';
                            echo '<td>' . $rows['ProductName']  . '</td>';
                            echo '<td>' . $rows['price']  . '</td>';
                            echo '<td>' . $rows['quantity']  . '</td>';
                            echo '<td>
                            <img src="' . $rows['img'] . '" alt="Product Img" class="img-thumbnail" width="60px">
                            </td>';
                            echo '<td>
            
                <a href="?quantity_id=' . $rows['id'] . '" class="btn btn-secondary text-white shadow px-4">Add Quantity</a>
                <a href="?edit_id=' . $rows['id'] . '" class="btn btn-success text-white shadow px-4">Edit</a>
                <a href="?delete_id=' . $rows['id'] . '"class="btn btn-danger text-white shadow px-4">Delete</a>
            </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>