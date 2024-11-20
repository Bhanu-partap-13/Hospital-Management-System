<?php
// viewbed.php

// Database connection
$servername = "localhost";
$username = "root";            // Default MySQL username for XAMPP
$password = "";                // Default MySQL password for XAMPP (usually empty)
$dbname = "hospital";          // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch hospital names and their associated locations
$hospitalsQuery = $conn->query("SELECT DISTINCT hospital_name FROM beds");
$hospitalLocationsQuery = $conn->query("SELECT DISTINCT hospital_name, hospital_location FROM beds");

$hospitalOptions = [];
$locationOptions = [];

while ($row = $hospitalsQuery->fetch_assoc()) {
    $hospitalOptions[] = $row['hospital_name'];
}

while ($row = $hospitalLocationsQuery->fetch_assoc()) {
    $locationOptions[$row['hospital_name']][] = $row['hospital_location'];
}

// Handle form submission
$whereClauses = [];
$params = [];
$types = '';

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $hospital = $_POST['hospital'];

    if (!empty($hospital)) {
        $whereClauses[] = "hospital_name = ?";
        $params[] = $hospital;
        $types .= 's';
    }

    if (!empty($location)) {
        $whereClauses[] = "hospital_location = ?";
        $params[] = $location;
        $types .= 's';
    }

    $sql = "SELECT * FROM beds" . (count($whereClauses) > 0 ? " WHERE " . implode(' AND ', $whereClauses) : "");
    $stmt = $conn->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $beds = [];
    while ($row = $result->fetch_assoc()) {
        $beds[] = $row;
    }
} else {
    // Fetch all beds if no filters are applied
    $sql = "SELECT * FROM beds";
    $result = $conn->query($sql);

    $beds = [];
    while ($row = $result->fetch_assoc()) {
        $beds[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Beds</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            margin: 20px;
            text-align: center;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        select, button {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        select:hover, button:hover {
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
            background-color: #f8f9fa;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: translateY(-20px);
            animation: fadeInUp 0.6s forwards;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        .hide-column {
            display: none;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        // Function to update location options based on selected hospital
        function updateLocationOptions() {
            var hospitalSelect = document.getElementById('hospital');
            var locationSelect = document.getElementById('location');
            var selectedHospital = hospitalSelect.value;

            var locations = <?php echo json_encode($locationOptions); ?>;

            // Clear previous options
            locationSelect.innerHTML = '';

            // Add default option
            locationSelect.add(new Option('Select Location', ''));

            // Add new options based on selected hospital
            if (selectedHospital in locations) {
                locations[selectedHospital].forEach(function(location) {
                    locationSelect.add(new Option(location, location));
                });
            }
        }

        // Populate location options on page load if there is a selected hospital
        window.onload = function() {
            updateLocationOptions();
        };
    </script>
</head>
<body>
    <header>
        <h1>View Available Beds</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="hospital">Hospital Name:</label>
            <select id="hospital" name="hospital" onchange="updateLocationOptions()">
                <option value="">Select Hospital</option>
                <?php foreach ($hospitalOptions as $hospital): ?>
                    <option value="<?php echo htmlspecialchars($hospital); ?>"><?php echo htmlspecialchars($hospital); ?></option>
                <?php endforeach; ?>
            </select>
            
            <label for="location">Location:</label>
            <select id="location" name="location">
                <option value="">Select Location</option>
            </select>

            <button type="submit" name="submit">View Beds</button>
        </form>
        <div id="bed-availability">
            <!-- Table for displaying available beds -->
            <table>
                <thead>
                    <tr>
                        <th class="hide-column">ID</th>
                        <th>Bed Type</th>
                        <th>Total Beds</th>
                        <th>Available Beds</th>
                        <th>Hospital Name</th>
                        <th>Hospital Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($beds) && !empty($beds)) {
                        foreach ($beds as $bed) {
                            echo "<tr>
                                <td class='hide-column'>" . htmlspecialchars($bed['id']) . "</td>
                                <td>" . htmlspecialchars($bed['bed_type']) . "</td>
                                <td>" . htmlspecialchars($bed['total_beds']) . "</td>
                                <td>" . htmlspecialchars($bed['available_beds']) . "</td>
                                <td>" . htmlspecialchars($bed['hospital_name']) . "</td>
                                <td>" . htmlspecialchars($bed['hospital_location']) . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No beds available for the selected location and hospital.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
