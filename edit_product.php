<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<?php include "templates/header.php";?>

<div class="container">
    <h1 class="text-center">Edit Product</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rdb bookstore";

    // Create connection
    $dbc = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($dbc->connect_error) {
        die("Connection failed: " . $dbc->connect_error);
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $product_id = $_GET['id'];

        $query = "SELECT ProductID, Product_Name, Product_Description, Product_Price FROM product_t WHERE ProductID = $product_id";
        $result = $dbc->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form method="post" action="update_product.php">
                <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
                <div class="form-group">
                    <label for="product_name">Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['Product_Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="product_description">Description:</label>
                    <textarea class="form-control" id="product_description" name="product_description"><?php echo $row['Product_Description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="product_price">Price:</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $row['Product_Price']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
            <?php
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid product ID.";
    }

    $dbc->close();
    ?>

    <a href="index.php" class="btn btn-primary">Back to Home</a>
</div>

</body>
</html>