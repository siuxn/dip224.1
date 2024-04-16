<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="loginandsignup.css">
    <title>Login or sign up? </title>
</head>
<body>
<div class="wrapper">
    <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
    </div>

    <div class="form-container">
        <!-- Your login and signup forms here -->
    </div>
</div>

<?php
// Your PHP code here

// Display the email if the user is logged in or signed up
if (isset($_SESSION["username"])) {
    $email = ""; // Initialize email variable

    // Check if the email is available in the session or fetched from the database
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
    } else {
        // Fetch the email from the database based on the username
        $username = $_SESSION["username"];
        $fetch_email_query = "SELECT email FROM login WHERE username = '$username'";
        $fetch_email_result = mysqli_query($data, $fetch_email_query);

        if (mysqli_num_rows($fetch_email_result) > 0) {
            $row = mysqli_fetch_assoc($fetch_email_result);
            $email = $row["email"];
            $_SESSION["email"] = $email; // Store the email in the session for future use
        }
    }

    // Display the email
    echo "<p>Email: $email</p>";
}
?>

<script src="loginandsignup.js"></script>
</body>
</html>