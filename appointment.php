<?php
// Establish database connection
$connect = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Fetch available dates from the database
$dates_query = "SELECT DISTINCT date FROM doctor_timeslots";
$dates_result = $connect->query($dates_query);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input
    $name = $connect->real_escape_string($_POST['name']);
    $email = $connect->real_escape_string($_POST['email']);
    $phone = $connect->real_escape_string($_POST['phone']);
    $gender = $connect->real_escape_string($_POST['gender']);
    $division = $connect->real_escape_string($_POST['division']);
    $district = $connect->real_escape_string($_POST['district']);
    $department = $connect->real_escape_string($_POST['department']);
    $doctor = $connect->real_escape_string($_POST['doctor']);
    $date = $connect->real_escape_string($_POST['appointment_date']);
    $time = $connect->real_escape_string($_POST['time_slot']);

    // Check if the slot is already booked
    $check_slot_query = "SELECT * FROM doctor_timeslots WHERE doctor_full_name=? AND date=? AND slot_start=? AND availability='booked'";
    $stmt = $connect->prepare($check_slot_query);
    if ($stmt === false) {
        die('Prepare failed: ' . $connect->error);
    }
    $stmt->bind_param("sss", $doctor, $date, $time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("Appointment already booked at this time slot.");</script>';
    } else {
        // Check if the email already exists in appointment
        $check_email_query = "SELECT * FROM appointment WHERE email=?";
        $stmt = $connect->prepare($check_email_query);
        if ($stmt === false) {
            die('Prepare failed: ' . $connect->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("You have already made an appointment with this email.");</script>';
        } else {
            // Insert into appointment
            $insert_query_appointment = "INSERT INTO appointment (name, email, phone, gender, division, district, department, doctor, date, time, date_reg, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'pending')";
            $stmt = $connect->prepare($insert_query_appointment);
            if ($stmt === false) {
                die('Prepare failed: ' . $connect->error);
            }
            $stmt->bind_param("ssssssssss", $name, $email, $phone, $gender, $division, $district, $department, $doctor, $date, $time);

            if ($stmt->execute()) {
                // Update the booked time slot to 'booked'
                $update_query = "UPDATE doctor_timeslots SET availability='booked' WHERE doctor_full_name=? AND date=? AND slot_start=?";
                $stmt = $connect->prepare($update_query);
                if ($stmt === false) {
                    die('Prepare failed: ' . $connect->error);
                }
                $stmt->bind_param("sss", $doctor, $date, $time);
                if ($stmt->execute()) {
                    echo '<script>alert("Appointment Successful.");</script>';
                } else {
                    echo '<script>alert("Failed to update time slot availability: ' . $stmt->error . '");</script>';
                }
            } else {
                echo '<script>alert("Appointment insertion failed: ' . $stmt->error . '");</script>';
            }
        }
    }
    $stmt->close();
}

// Close the connection
$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('corridor.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-color: gray;
        }

        header {
            color: #fff;
            padding: 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
        }

        form {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.9);
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Appointment Form</h2>
        
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" required autocomplete="off" placeholder="Enter full name">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required autocomplete="off" placeholder="Enter Your Email">

        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" required autocomplete="off" placeholder="Enter Phone Number">

        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>

        <label for="location">Select Location</label>
        <select name="division" id="division" onchange="populateDistricts()">
            <option value="" disabled selected>Select State</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
             <option value="Chandigarh">Chandigarh</option>
              <option value="Daman and Diu">Daman and Diu</option>
               <option value="Lakshadweep">Lakshadweep</option>
                <option value="Delhi">Delhi</option>
                 <option value="Puducherry">Puducherry</option>
                  <option value="Ladakh">Ladakh</option>
                   <option value="West Bengal">West Bengal</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
        </select>

        <select name="district" id="district">
            <option value="" disabled selected>Select City</option>
        </select>

        <label for="department">Select Department</label>
        <select name="department" id="department" required onchange="populateDoctors()">
            <option value="" disabled selected>Select Department</option>
            <option value="cardiology">Cardiology</option>
            <option value="dermatology">Dermatology</option>
            <option value="neurology">Neurology</option>
            <option value="oncology">Oncology</option>
            <option value="pediatrics">Pediatrics</option>
            <option value="gynecology">Gynecology</option>
            <option value="urology">Urology</option>
            <option value="ophthalmology">Ophthalmology</option>
            <option value="otorhinolaryngology">ENT(Otorhinolaryngology)</option>
            <option value="Internal Medicine">Internal Medicine</option>
            <option value="gastroenterology">Gastroenterology</option>
            <option value="endocrinology">Endocrinology</option>
            <option value="rheumatology">Rheumatology</option>
            <option value="pulmonology">Pulmonology</option>
            <option value="nephrology">Nephrology</option>
            <option value="hematology">Hematology</option>
            <option value="anesthesiology">Anesthesiology</option>
            <option value="radiology">Radiology</option>
            <option value="pathology">Pathology</option>
            <option value="others">Others</option>
        </select>

        <label for="doctor">Select Doctor</label>
        <select id="doctor" name="doctor" required>
            <option value="" disabled selected>Select Doctor</option>
        </select>

        <label for="appointment_date">Select Appointment Date:</label>
        <select id="appointment_date" name="appointment_date" required>
            <option value="" disabled selected>Select Appointment Date</option>
        </select>

        <label for="time_slot">Select Time Slot:</label>
        <select id="time_slot" name="time_slot" required>
            <option value="" disabled selected>Select Time Slot</option>
        </select>

        <button type="submit">Book Appointment</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
