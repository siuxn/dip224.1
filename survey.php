

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";
session_start(); // Start the session
$email = $_SESSION["email"];

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


// Create the survey_responses table if it doesn't exist
$sqlSurvey = "CREATE TABLE IF NOT EXISTS Survey_Responses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    Design INT NOT NULL,
    Navigation INT NOT NULL,
    Usability INT NOT NULL,
    Met_needs TEXT NOT NULL,
    Improvements VARCHAR(255),
    FOREIGN KEY (email) REFERENCES login(email) ON DELETE CASCADE
)";

if ($conn->query($sqlSurvey) === TRUE) {
    echo 'Table created successfully.';
   
} else {
    echo 'Error creating table: ' . $conn->error;
}

//get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating1 = $_POST['rating1'];
    $rating2 = $_POST['rating2'];
    $rating3 = $_POST['rating3'];
    $rating4 = $_POST['rating4'];
    $feedback = $_POST['your_message'];



    // Retrieve the email from the session
   
      
    $sql = "INSERT INTO Survey_Responses (email, Design, Navigation, Usability, Met_needs, Improvements) 
    VALUES ('$email', '$rating1', '$rating2', '$rating3', '$rating4', '$feedback')";

    if($conn->query($sql) === TRUE){
        echo "Thank you for giving us feedback";
        require 'survey.html';
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
}

// Close the connection
$conn->close();

?>
