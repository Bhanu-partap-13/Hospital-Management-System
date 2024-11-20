<?php
session_start();
include("connection.php"); // Ensure this file sets up $connect

if (isset($_POST['department']) && isset($_POST['city'])) {
    $department = $_POST['department'];
    $city = $_POST['city'];

    $stmt = $connect->prepare("SELECT username, full_name FROM doctors WHERE department = ? AND city = ?");
    $stmt->bind_param("ss", $department, $city);
    $stmt->execute();
    $result = $stmt->get_result();

    $doctors = array();
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }

    echo json_encode($doctors);
    $stmt->close();
} else {
    echo json_encode([]);
}
?>
