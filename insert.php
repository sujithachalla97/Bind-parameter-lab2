<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sujitha";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO students2 (studentname, rollno, phone, email) VALUES (?, ?, ?, ?)");

// Check if preparation succeeded
if ($stmt === false) {
    die("Error in preparing SQL statement: " . mysqli_error($conn));
}

// Bind the parameters
$students2= [
    ['John Doe', '12345', '1234567890', 'john@example.com'],
    ['Jane Doe', '54321', '0987654321', 'jane@example.com'],
    ['Bob Smith', '98765', '1112223333', 'bob@example.com']
];

foreach ($students2 as $student) {
    // Bind parameters
    $result = $stmt->bind_param("ssss", $student[0], $student[1], $student[2], $student[3]);

    // Check if binding succeeded
    if ($result === false) {
        die("Error in binding parameters: " . $stmt->error);
    }

    // Execute the statement
    $result = $stmt->execute();

    // Check if execution succeeded
    if ($result === false) {
        die("Error in executing SQL statement: " . $stmt->error);
    }
}

// Close the prepared statement
$stmt->close();

// Close the connection
mysqli_close($conn);

// Output success message
echo "Inserted successfully";
?>


