<?php
include "db.php";

$product = $_POST['product'] ?? '';
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($product) || empty($name) || empty($email)) {
    echo "<p style='color:red;'> Please fill in all required fields</p>";
    exit;
}

$sql = "INSERT INTO orders (product, name, email, message)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $product, $name, $email, $message);

if (mysqli_stmt_execute($stmt)) {
    echo "<p style='color:green;'> Order sent successfully</p>";
} else {
    echo "<p style='color:red;'> Error while sending order</p>";
}

mysqli_stmt_close($stmt);
?>
