<?php
include("connection.php"); // Ensure this file sets up $connect

// Get doctor username and date from POST request
$doctor_username = $_POST['doctor_username'];
$date = $_POST['date'];

// Fetch available time slots for the selected doctor and date
$query = "SELECT slot_start, slot_end FROM doctor_timeslots WHERE doctor_full_name = ? AND date = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("ss", $doctor_username, $date);
$stmt->execute();
$result = $stmt->get_result();

$timeSlots = array();
while ($row = $result->fetch_assoc()) {
    // Combine slot_start and slot_end to create a readable time slot
    $timeSlots[] = $row['slot_start'] . '-' . $row['slot_end'];
}

echo json_encode($timeSlots);
$stmt->close();
?>
