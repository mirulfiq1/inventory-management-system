<?php
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

$token = $_POST["token"];

$token_hash = hash("sha1", $token);
$password_hash = hash("sha1", $password);
$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$users = $result->fetch_assoc();

if ($users === null) {
    die("token not found");
}

if (strtotime($users["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

//echo $password = sha1($password);

$sql = "UPDATE users
        SET password = '$password_hash',
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("i", $users["id"]);

$stmt->execute();

echo "Password updated. You can now login.";