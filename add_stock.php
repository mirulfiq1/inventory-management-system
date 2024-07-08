<?php
if (isset($_POST['submit'])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO employees (id, firstname, lastname, email, age, location, date)
VALUES
('".$_POST["id"]."','".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST ["age"]."','".$_POST["location"]."','".$_POST["date"]."')";
if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
$conn->close(); }
?>


<h2>Add a user</h2> 
<form method="post">
<label for="id">ID</label>
<input type="text" name="id" id="id">
<label for="firstname">First Name</label>
<input type="text" name="firstname" id="firstname">
<label for="lastname">Last Name</label>
<input type="text" name="lastname" id="lastname">
<label for="email">Email Address</label>
<input type="text" name="email" id="email">
<label for="age">Age</label>
<input type="text" name="age" id="age">
<label for="location">Location</label>
<input type="text" name="location" id="location">
<br>
<br>
<label for="date">Date</label>
<input type="text" name="date" id="date">
<br>
<br>
<input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
