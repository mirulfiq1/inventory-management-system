<!DOCTYPE html
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta name="viewport" content="=device-width initial-scale=.0">
    <title>Create Product</title>    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">

<?php
if (isset($_POST['submit'])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rdb bookstore";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO product_t (Product_Name, Product_Description, Product_Price)
VALUES
('".$_POST["Name"]."','".$_POST["Description"]."','".$_POST["Price"]."')";
if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
$conn->close(); }
?>


<h2>Create Product</h2>
        <form method="post">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" id="Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" id="Description" class="form-control">
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" name="Price" id="Price" class="form-control">
            </div>
            <br>
            <br>
            <button type="submit" name="submit" value="Save" class="btn btn-primary">Save</button>
            <button type="submit" formaction="read.php" value="Back to view product" class="btn btn-secondary">Back to view product</button>
        </form>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>

