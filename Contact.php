<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Aman_Sales_Agency";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $phone   = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO Contact (name, email, phone, message) VALUES ('$name','$email','$phone','$message')";

    if ($conn->query($sql) === TRUE) {
        $success = "✅ Your message has been submitted successfully!";
    } else {
        $error = "❌ Error: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Status</title>
<link rel="stylesheet" href="Contact.css">
</head>
<body>

<div class="form-container">
<h2>Contact Form Status</h2>

<?php if (!empty($success)) { echo "<div class='msg success'>$success</div>"; } ?>
<?php if (!empty($error)) { echo "<div class='msg error'>$error</div>"; } ?>

<a href="Contact.html" class="back-home">← Back to Contact</a>
<br>
<a href="index.html" class="back-home">← Back to Home</a>
</div>

</body>
</html>
