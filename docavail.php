<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
        }

        input, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Availability</h1>
        <form action="" method="post">
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor_username" required>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; // Your MySQL username
                $password = ""; // Your MySQL password
                $dbname = "doctors";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT username, full_name FROM doctors");

                while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"{$row['username']}\">{$row['full_name']}</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="slot_start">Start Time:</label>
            <input type="time" id="slot_start" name="slot_start" required>

            <label for="slot_end">End Time:</label>
            <input type="time" id="slot_end" name="slot_end" required>

            <input type="submit" value="Update Availability">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Fetch submitted values
            $doctor_username = $_POST['doctor_username'];
            $date = $_POST['date'];
            $slot_start = $_POST['slot_start'];
            $slot_end = $_POST['slot_end'];

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if a slot for the same doctor and date already exists
            $stmt = $conn->prepare("SELECT * FROM doctor_timeslots WHERE doctor_username = ? AND date = ? AND slot_start = ? AND slot_end = ?");
            
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ssss", $doctor_username, $date, $slot_start, $slot_end);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<p style='color: orange;'>This availability slot already exists.</p>";
            } else {
                // Insert new availability
                $stmt = $conn->prepare("INSERT INTO doctor_timeslots (doctor_username, date, slot_start, slot_end) VALUES (?, ?, ?, ?)");
                
                if (!$stmt) {
                    die("Prepare failed: " . $conn->error);
                }

                $stmt->bind_param("ssss", $doctor_username, $date, $slot_start, $slot_end);

                if ($stmt->execute()) {
                    echo "<p style='color: green;'>Availability updated successfully.</p>";
                } else {
                    echo "<p style='color: red;'>Error updating availability: " . $stmt->error . "</p>";
                }
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
