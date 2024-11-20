<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = false; // Track if form submission was successful

// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $conn->real_escape_string(htmlspecialchars($_POST['name'])) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string(htmlspecialchars($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? $conn->real_escape_string(htmlspecialchars($_POST['phone'])) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string(htmlspecialchars($_POST['message'])) : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        $success = true;
        // Redirect to avoid form re-submission
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link to external JavaScript file -->
    <script src="scripts.js" defer></script>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-image: url(bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    color: #333; /* Dark text color for readability */
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh; /* Centers content vertically */
}

.contact-container {
    max-width: 600px;
    width: 90%; /* Makes it responsive */
    margin: 50px auto;
    background-color: #ffffff; /* White background for form */
    padding: 30px;
    border-radius: 15px; /* Rounded corners for a modern look */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    border-top: 6px solid #007BFF; /* Blue accent color */
    backdrop-filter: blur(10px); /* Glassmorphism effect */
}

h2 {
    text-align: center;
    color: #007BFF; /* Primary blue theme color */
    margin-bottom: 20px;
    font-size: 28px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #0056b3; /* Darker blue color for labels */
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border-color: #007BFF; /* Focus border color */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Focus shadow effect */
    outline: none;
}

.submit-btn {
    width: 100%;
    background-color: #007BFF; /* Primary button color */
    color: white;
    padding: 14px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover effects */
}

.submit-btn:hover {
    background-color: #0056b3; /* Darker shade for hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

.success-message {
    display: none; /* Initially hidden */
    background-color: #d4edda; /* Light green background */
    border-left: 4px solid #28a745; /* Green accent border */
    color: #155724;
    padding: 15px;
    margin-top: 20px;
    border-radius: 5px;
    animation: fadeIn 0.5s ease-in-out; /* Fade-in effect */
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Background styling */
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('your-background-image.jpg'); /* Add a background image suitable for a medical theme */
    background-size: cover;
    background-position: center;
    opacity: 0.1; /* Light overlay for subtle effect */
    z-index: -1; /* Ensures it is behind other content */
}
</style>
<body>

<div class="contact-container">
    <h2>Contact Us - MEDEASE</h2>
    <form action="contactus.php" method="post" class="contact-form" id="contactForm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="message">Message (max 500 characters):</label>
        <textarea id="message" name="message" rows="5" maxlength="500" required></textarea>
    </div>
    <button type="submit" class="submit-btn">Send Message</button>
</form>


    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        Thank you! Your message has been sent successfully.
    </div>






</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const successMessage = document.getElementById("successMessage");

    form.addEventListener("submit", function (event) {
        event.preventDefault();  // Prevent the default form submission

        // Simulate form submission
        setTimeout(() => {
            form.reset();  // Reset the form fields
            showSuccessMessage();  // Show success message
            alert("Form submitted successfully!");  // Show alert popup message
        }, 500);  // Delay for better UX (simulate server response time)
    });
});

// Function to display the success message
function showSuccessMessage() {
    const successMessage = document.getElementById("successMessage");
    successMessage.style.display = "block";  // Show the message
    successMessage.classList.add("slideDown");  // Add animation class
}
form.addEventListener("submit", function (event) {
    event.preventDefault();  // Comment out this line
    // Simulate form submission
    setTimeout(() => {
        form.reset();  // Reset the form fields
        showSuccessMessage();  // Show success message
        alert("Form submitted successfully!");  // Show alert popup message
    }, 500);  // Delay for better UX (simulate server response time)
});
</script>

</body>
</html>