<?php
// Configuration
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $pin = $conn->real_escape_string($_POST['pin']);
    $email = $conn->real_escape_string($_POST['email']);
    $college = $conn->real_escape_string($_POST['college']);
    $course = $conn->real_escape_string($_POST['course']);
    $father_name = $conn->real_escape_string($_POST['father_name']);
    $father_mobile = $conn->real_escape_string($_POST['father_mobile']);
    $mother_name = $conn->real_escape_string($_POST['mother_name']);
    $mother_mobile = $conn->real_escape_string($_POST['mother_mobile']);
    $local_guardian = $conn->real_escape_string($_POST['local_guardian']);
    $local_guardian_relation = $conn->real_escape_string($_POST['local_guardian_relation']);
    $local_guardian_address = $conn->real_escape_string($_POST['local_guardian_address']);
    $local_guardian_mobile = $conn->real_escape_string($_POST['local_guardian_mobile']);

    // Insert data into database
    $sql = "INSERT INTO registration (name, dob, mobile, address, city, state, pin, email, college, course, father_name, father_mobile, mother_name, mother_mobile, local_guardian, local_guardian_relation, local_guardian_address, local_guardian_mobile) VALUES ('$name', '$dob', '$mobile', '$address', '$city', '$state', '$pin', '$email', '$college', '$course', '$father_name', '$father_mobile', '$mother_name', '$mother_mobile', '$local_guardian', '$local_guardian_relation', '$local_guardian_address', '$local_guardian_mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>