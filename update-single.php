<?php
if (isset($_POST['submit'])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE customer_t SET Cus_Firstname = ''".$_POST["Cus_Firstname"]."','".$_POST["Cus_Lastname"]."','".$_POST["Cus_Phonenum"]."','".$_POST["Cus_Birthdate"]."','".$_POST["Cus_Address1"]."','".$_POST ["Cus_Address2"]."','".$_POST["Cus_Postcode"]."','".$_POST ["Cus_City"]."','".$_POST["Cus_State"]."','".$_POST ["Cus_Gender"]."','".$_POST["Cus_Email"]."','".$_POST ["Cus_Loyaltypoint"]."' WHERE CustomerID = '".$_POST["CustomerID"]."' ";

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('Record updated successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();

  
  }

?>

<?php 

if (isset($_GET['CustomerID'])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$CustomerID = $_GET['CustomerID'];
  
 $sql = "SELECT * FROM customer_t WHERE CustomerID = '$CustomerID'"; 

 $response = @mysqli_query($conn, $sql);

if ($response) { ?>

<?php foreach ($response as $row) { ?>

  <!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Custom CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
    .error {
        color: #red;
        font-size: 12px;
        margin-bottom: 10px;
    }
</style>

  <h2>Edit a Customer</h2>


  <div class="container">
    <h2>Customers</h2>
    <form method="post">
        <div class="form-group">
            <label for="CustomerID">ID</label>
            <input type="text" name="CustomerID" id="CustomerID" value=<?php echo ($row["CustomerID"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Firstname">First Name</label>
            <input type="text" name="Cus_Firstname" id="Cus_Firstname" value=<?php echo ($row["Cus_Firstname"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Lastname">Last Name</label>
            <input type="text" name="Cus_Lastname" id="Cus_Lastname" value=<?php echo ($row["Cus_Lastname"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Phonenum">Phone Number</label>
            <input type="text" name="Cus_Phonenum" id="Cus_Phonenum" value=<?php echo ($row["Cus_Phonenum"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Birthdate">Birthdate</label>
            <input type="text" name="Cus_Birthdate" id="Cus_Birthdate" value=<?php echo ($row["Cus_Birthdate"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Address1">Address 1</label>
            <input type="text" name="Cus_Address1" id="Cus_Address1" value=<?php echo ($row["Cus_Address1"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Address2">Address 2</label>
            <input type="text" name="Cus_Address2" id="Cus_Address2" value=<?php echo ($row["Cus_Address2"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Postcode">Postcode</label>
            <input type="text" name="Cus_Postcode" id="Cus_Postcode" value=<?php echo ($row["Cus_Postcode"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_City">City</label>
            <input type="text" name="Cus_City" id="Cus_City" value=<?php echo ($row["Cus_City"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_State">State</label>
            <input type="text" name="Cus_State" id="Cus_State" value=<?php echo ($row["Cus_State"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Gender">Gender</label>
            <input type="text" name="Cus_Gender" id="Cus_Gender" value=<?php echo ($row["Cus_Gender"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Email">Email</label>
            <input type="text" name="Cus_Email" id="Cus_Email" value=<?php echo ($row["Cus_Email"]); ?> class="form-control">
        </div>
        <div class="form-group">
            <label for="Cus_Loyaltypoint">Loyalty Point</label>
            <input type="text" name="Cus_Loyaltypoint" id="Cus_Loyaltypoint" value=<?php echo ($row["Cus_Loyaltypoint"]); ?> class="form-control">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>


<?php }}} ?>


<!-- Add Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    


