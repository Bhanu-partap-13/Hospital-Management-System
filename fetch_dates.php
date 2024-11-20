<?php
// Establish database connection
$connect = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Get doctor username from POST request
$doctor_username = $_POST['doctor_username'];

// Fetch available dates for the selected doctor
$query = "SELECT DISTINCT date FROM doctor_timeslots WHERE doctor_full_name = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("s", $doctor_username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch dates and return as JSON
$dates = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
}

echo json_encode($dates);

// Close the connection
$stmt->close();
$connect->close();
?>
