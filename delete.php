
<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];

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


$sql = "DELETE FROM customer_t WHERE CustomerID = $id";

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('Record updated successfully');</script>";
header('Location: customers.php');
exit; // Stop executing the script
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();

  
  }

?>



   




