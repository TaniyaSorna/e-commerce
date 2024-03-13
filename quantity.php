<?php
$conn = mysqli_connect('localhost', 'root', '', 'ghorerbazar');
$sql = "SELECT * FROM information";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
// print_r($data['id']);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $addqty = $_POST['addqty'];

    $qty_sql = "SELECT quantity FROM information WHERE id = $id";
    $result = mysqli_query($conn, $qty_sql);

    $old_qty = mysqli_fetch_assoc($result);
    $old_qty = $old_qty['quantity'];
    // echo $old_qty;
    // echo $id;
    // echo $addqty;

    // $add_qty_sql = "SELECT($old_qty + $addqty)";
    $add_qty_sql = "SELECT (3 + 5)";

    $update_q_sql = "UPDATE information SET quantity = $add_qty_sql WHERE id = $id";
    mysqli_query($conn, $update_q_sql);
    echo $add_qty_sql;
    // header('location: read.php');




    // print_r($update_q);






}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quantity</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row col-6 mx-auto">

                <form action="" method="post" class="bg-white shadow mx-auto mt-5 form-control" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo $data['id'] ?>">


                    <div class="mt-3">
                        <label for="">Add Qty</label>
                        <input type="number" class="form-control" name="addqty"><br><br>
                    </div>
                    <div class="mb-4">
                        <input type="submit" name="submit" value="Submit" class="bg-danger text-white rounded py-2 px-4">
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>