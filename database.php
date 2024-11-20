<?php
$connect = mysqli_connect("localhost", "root", "", "hospital");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Check if the email already exists
    $check_query = "SELECT * FROM appointment WHERE email='$email'";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>alert("You have already made an appointment with this email.");</script>';
    } else {
        // Insert new appointment
        $insert_query = "INSERT INTO appointment (name, email, phone, gender, division, district, department, doctor, date, time, date_reg, status) VALUES ('$name', '$email', '$phone', '$gender', '$division', '$district', '$department', '$doctor', '$date', '$time', NOW(), 'pending')";
        $insert = mysqli_query($connect, $insert_query);
        
        if ($insert) {
            echo '<script>alert("Appointment Successful.");</script>';
        } else {
            echo '<script>alert("Appointment failed.");</script>';
        }
    }
}

// Close the connection
mysqli_close($connect);
?>
