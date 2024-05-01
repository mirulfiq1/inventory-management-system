<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "templates/header.php";?>

<div class="container">
    <h1 class="text-center">Products</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Price</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rdb bookstore";

            // Create connection
            $dbc = new mysqli($servername, $username, $password, $dbname);
            // Check connection

            $query = "SELECT ProductID, Product_Name, Product_Description, Product_Price FROM product_t";
            $response = @mysqli_query($dbc, $query);

            if ($response) {
                while($row = mysqli_fetch_array($response)){?>
                    <tr>
                        <td class="text-center"><?php echo ($row["ProductID"]);?></td>
                        <td class="text-center"><?php echo ($row["Product_Name"]);?></td>
                        <td class="text-center"><?php echo ($row["Product_Description"]);?></td>
                        <td class="text-center"><?php echo ($row["Product_Price"]);?></td>
                        <td class="text-center">
                            <a href="edit_product.php?id=<?php echo ($row["ProductID"]);?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php }
            }

            $dbc->close();?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary">Back to home</a>
</div>

</body>
</html>


