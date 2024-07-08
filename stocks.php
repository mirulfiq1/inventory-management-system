
<?php include "templates/header.php"; ?>
<?php
//require_once('mysqli_connect.php');
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$dbc = new mysqli($servername, $username, $password, $dbname);
// Check connection

$query = "SELECT id, firstname, lastname, email, age, location, date FROM employees"; $response = @mysqli_query($dbc, $query);

if ($response) { 
while($row = mysqli_fetch_array($response)){?>

<h2>Results</h2>
<table>
<thead>
<tr>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email Address</th>
<th>Age</th>
<th>Location</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php foreach ($response as $row) { ?>
<tr>
<td><?php echo ($row["id"]); ?></td> <td><?php echo ($row["firstname"]); ?></td> <td><?php echo ($row["lastname"]); ?></td> <td><?php echo ($row["email"]); ?></td> <td><?php echo ($row["age"]); ?></td> <td><?php echo ($row["location"]); ?></td> <td><?php echo ($row["date"]); ?> </td> <td><a href="update-single.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td><a href="delete.php?id=<?php echo ($row["id"]); ?>">Delete</a></td>
</tr> <?php } ?> </tbody>
</table><?php } }

    $dbc->close(); }
    ?>



<a href="index.php">Back to home</a> 



<?php include "templates/footer.php"; ?>
