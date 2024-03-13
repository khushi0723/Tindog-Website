<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the user input from the form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate the user input (e.g. check for required fields, validate email format, etc.)
  // ...

  // Connect to the database
  $servername = "localhost";
  $username = "yourusername";
  $password = "yourpassword";
  $dbname = "yourdatabase";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert the user information into the database
  $sql = "INSERT INTO users (name, email, password)
          VALUES ('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}