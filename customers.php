<?php
// database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_system";

// Create connection
$dbc = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: ". $dbc->connect_error);
}

$query = "SELECT CustomerID, Cus_Firstname, Cus_Lastname, Cus_Phonenum, Cus_Birthdate, Cus_Address1, Cus_Address2, Cus_Postcode, Cus_City, Cus_State, Cus_Gender, Cus_Email, Cus_Loyaltypoint FROM customer_t";

$response = @mysqli_query($dbc, $query);

if ($response) {
   ?>
    <html>
    <head>
        <title>Customer List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            /* Add some basic styling to the table */
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f0f0f0;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            /* Add some space between the table and the "Back to home" link */
           .container {
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Customers List</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Birth Date</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>Postcode</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Loyalty Point</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($response)) {
                   ?>
                    <tr>
                        <td><?php echo ($row["CustomerID"]);?></td>
                        <td><?php echo ($row["Cus_Firstname"]);?></td>
                        <td><?php echo ($row["Cus_Lastname"]);?></td>
                        <td><?php echo ($row["Cus_Phonenum"]);?></td>
                        <td><?php echo ($row["Cus_Birthdate"]);?></td>
                        <td><?php echo ($row["Cus_Address1"]);?></td>
                        <td><?php echo ($row["Cus_Address2"]);?></td>
                        <td><?php echo ($row["Cus_Postcode"]);?></td>
                        <td><?php echo ($row["Cus_City"]);?></td>
                        <td><?php echo ($row["Cus_State"]);?></td>
                        <td><?php echo ($row["Cus_Gender"]);?></td>
                        <td><?php echo ($row["Cus_Email"]);?></td>
                        <td><?php echo ($row["Cus_Loyaltypoint"]);?></td>
                        <td><a href="update-single.php?CustomerID=<?php echo $row["CustomerID"];?>">Edit</a></td>
                        <td><a href="delete.php?CustomerID=<?php echo ($row["CustomerID"]);?>">Delete</a></td>
                    </tr>
                    <?php
                }
               ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Error: ". $query. "<br>". $dbc->error;
}

$dbc->close();
?>