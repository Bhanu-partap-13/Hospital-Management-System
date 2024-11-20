<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Title -->
    <title>MedEase</title>

    <style>
    /* Navbar Styling */
    /* General Navbar Styles */
    /* Add your custom styles here */
        .navbar-nav .dropdown-menu {
            background-color: #fff; /* Ensure dropdown background color */
        }
.navbar {
    background-color: #fff; /* Adjust the background to suit your theme */
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: #007bff; /* MedEase theme blue color */
    text-transform: uppercase;
}

.navbar-nav {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.navbar-nav li {
    margin: 0 15px;
}

/* Navbar link styles */
.navbar a {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    text-transform: uppercase;
    transition: color 0.3s ease;
    border: none; /* Ensure no border */
    outline: none; /* Ensure no outline */
}

.navbar a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    left: 50%;
    bottom: 0;
    background-color: #4e9bc4;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.navbar a:hover::after {
    width: 100%;
}

.navbar a:hover {
    color: #007bff;
}



/* Scroll Progress Bar */
#scroll-progress {
    position: fixed;
    top: 0;
    left: 0;
    height: 5px;
    background-color: #007bff;
    width: 0;
    z-index: 100; /* Ensure the progress bar stays on top */
}

/* Button Animations in Navbar */
.navbar .btn-primary {
    background-color: #007bff;
    color: white;
    border: 2px solid #007bff;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
}

.navbar .btn-primary:hover {
    background-color: white;
    color: #007bff;
    border: 2px solid #007bff;
}
/* Responsive Navbar */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
   
    .navbar-nav {
        flex-direction: column;
        width: 100%;
    }
   
    .navbar-nav li {
        margin: 10px 0;
    }
}

/* Focus styles for accessibility */
.navbar a:focus {
    outline: 2px solid #007bff;
    outline-offset: 2px;
}


/* Scroll Animation Styles for Button Hover and Text */
.hero-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 100px 20px;
    background-color: #f4f4f4; /* Light background */
    min-height: 100vh;
}

.hero-text h1 {
    font-size: 2.5rem;
    line-height: 1.2;
    color: #333;
    text-transform: uppercase;
    animation: fadeIn 1.5s ease-in-out;
}

.hero-text h1 span {
    color: #007bff; /* Color change for 'MEDEASE' */
}

.hero-text p {
    margin-top: 20px;
    font-size: 1.2rem;
    color: #555;
    animation: fadeIn 2s ease-in-out;
}

.hero-buttons a {
    margin-right: 20px;
    font-size: 1rem;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.hero-buttons a.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: 2px solid #007bff;
}

.hero-buttons a.btn-primary:hover {
    background-color: #fff;
    color: #007bff;
}

.hero-buttons a.btn-outline-primary {
    background-color: transparent;
    color: #007bff;
    border: 2px solid #007bff;
}

.hero-buttons a.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}

.hero-logo img {
    width: 150px;
    height: auto;
    animation: fadeIn 3s ease-in-out;
}

/* Keyframes for smooth fade-in animation */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}



        /* Hero Section Styling */
        .hero-section {
            height: 90vh;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 100px;
        }

        .hero-text {
            max-width: 50%;
            animation: fadeInLeft 2s ease-in-out;
            position: absolute;
            margin-top: -200px;
        }

        .hero-text h1 {
            font-size: 60px;
            color: #007bff;
            text-transform: uppercase;
            font-weight: bold;
        }

        .hero-text p {
            font-size: 18px;
            color: #666;
            margin-top: 20px;
            line-height: 1.6;
            position: absolute;
        }

        .hero-buttons {
            margin-top: 150px;
            position: absolute;

        }

        .hero-buttons .btn {
            padding: 15px 30px;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .hero-buttons .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .hero-buttons .btn-primary:hover {
            background-color: #0056b3;
        }

        .hero-logo {
            animation: fadeInRight 2s ease-in-out;
        }

        .hero-logo img {
            width: 1000px;
            margin-top: -100px;
            margin-left: 600px;
            height: auto;
        }

        /* Animations */
        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
/* About Section Styling */
    .about-section {
        background-color: #4e9bc4;
        color: #fff;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .about-heading {
        border-color: #fff;
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        position: relative;
        overflow: hidden;
    }

    .about-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 3px;
        background-color: #ffeb3b;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.5s ease;
    }

    .about-heading:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    .about-title {
        animation: fadeIn 1.5s ease-in-out;
        font-size: 3rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .about-description {
        animation: fadeIn 2s ease-in-out;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #d1d1d1;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .about-icon {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .about-icon:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    /* Add these styles to your existing stylesheet */

/* Keyframes for scrolling animations */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Initial hidden state for animated elements */
.hidden {
    opacity: 0;
    transform: translateY(20px);
}

/* Animation classes */
.animate-slide-up {
    animation: slideUp 1s ease-out forwards;
}

.animate-fade-in {
    animation: fadeIn 1s ease-out forwards;
}
/* Card Item Styling */
.card-item {
    background-color: white; /* White background for a clean look */
    color: black; /* Primary color for text */
    border-radius: 8px; /* Rounded corners for the card */
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.card-item:hover {
    transform: scale(1.05); /* Slight zoom effect on hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
}

.card-item i {
    font-size: 3rem; /* Larger icon size */
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.card-item:hover i {
    color: #0056b3; /* Darker shade of primary color on hover */
}

.card-item h6 {
    font-weight: bold;
    font-size: 1.2rem; /* Slightly larger text */
    margin: 0;
}

.card-item small {
    display: block;
    font-size: 0.9rem;
    color: #007bff; /* Primary color for smaller text */
}

/* Team Section Styles */
.team-carousel .team-item {
    margin-bottom: 30px;
    transition: transform 0.3s ease-in-out;
}

.team-carousel .team-item:hover {
    transform: scale(1.05);
}

.team-item img {
    border-radius: 0.5rem;
}

.team-item .text-primary {
    color: #007bff !important;
}

.team-item h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.team-item h6 {
    font-size: 1rem;
    margin-bottom: 1rem;
}

.team-item p {
    font-size: 0.875rem;
}

.team-item .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.team-item .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004494;
}

.team-carousel .team-item .social-icons a {
    color: #ffffff; /* Icon color */
    background-color: #007bff; /* Background color of icon */
}

.team-carousel .team-item .social-icons a:hover {
    color: #007bff; /* Icon color on hover */
    background-color: #ffffff; /* Background color on hover */
    border: 1px solid #007bff; /* Border color on hover */
}
/* Team Section Background */
/* Team Section Background */
.container-fluid.py-5 {
    background-color: #4e9bc4; /* Black background */
    color: #fff; /* White text color for contrast */
}

.container-fluid.py-5 .text-primary {
    color: #00aaff !important; /* Adjust this color if needed */
}

.container-fluid.py-5 .team-item {
    background-color: #1c1c1c; /* Darker background for each team item */
    border: 1px solid #444; /* Border color for team items */
}

.container-fluid.py-5 .team-item h3,
.container-fluid.py-5 .team-item h6,
.container-fluid.py-5 .team-item p {
    color: black; /* Light grey text for readability */
}

.container-fluid.py-5 .social-icons a {
    color: #ffffff; /* Icon color */
    background-color: #007bff; /* Background color of icon */
}

.container-fluid.py-5 .social-icons a:hover {
    color: #007bff; /* Icon color on hover */
    background-color: #ffffff; /* Background color on hover */
    border: 1px solid #007bff; /* Border color on hover */
}
.form-control {
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
  }

  .btn-primary {
    transition: background-color 0.3s ease, border-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  .popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #4e9bc4;
    display: flex;
    align-items: center;
    justify-content: center;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .popup.show {
    visibility: visible;
    opacity: 1;
  }

  .popup-content {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    text-align: center;
    position: relative;
    animation: fadeIn 0.5s ease;
  }

  .popup-icon {
    margin-bottom: 1rem;
  }

  .popup-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .popup-button:hover {
    background-color: #0056b3;
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
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+91 9896928713</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>vaibhavwalia9091@gmail.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="https://www.facebook.com/GURUPRASADSAHU9610" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="https://twitter.com/GURUPRASAD9610" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="https://www.linkedin.com/in/guruprasad9610" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="https://instagram.com/guruprasadsahu9610" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="https://youtube.com/@guruprasad9610" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

  <!-- Navbar Start -->
<!-- Progress Bar for Scroll Animation -->
<div id="scroll-progress"></div>
<div class="container-fluid sticky-top bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <a href="index.html" class="navbar-brand">
            <h1 class="m-0 text-uppercase text-primary">
                <img src="log.png" style="width: 200px; position: absolute; left: 10px; bottom:-60px;">
                <i class="fa-solid fa- me-2" style="background-image: url(log.png);"></i>
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
              <a href="viewbed.php" class="nav-item nav-link">Bed Count</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                <a href="login/login.php" class="nav-item nav-link" style="color: black;">Login Panel</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->



    <!-- Hero Section Start -->
    <div class="hero-section">
        <div class="hero-text">
            <h1 style="color: black; !important;">Welcome To</h1><h1 style="color: #4e9bc4 !important;">MedEase</h1><h1 style="color: black; !important;">Super Specialized Hospital Management System</h1>
            <p style="color: black;">Your health is our priority. Book an appointment today or contact us for more details on our wide range of medical services.</p>
            <div class="hero-buttons">
                <a href="appointment.php" class="btn btn-primary">Book Appointment</a>
                <a href="check_status.php" class="btn btn-outline-primary">Check Status</a>
            </div>
        </div>
        <div class="hero-logo" style="size: 10px !important;">
            <img src="loogo.png" alt="MedEase Logo">
        </div>
    </div>
    <!-- Hero Section End -->



    <!-- About Start -->
    <div id="about">
    <?php
include("about.php");
    ?>
</div>
    <!-- About End -->
   

    <!-- Services Start -->
   
    <!-- Services End -->


    <!-- Appointment Start -->
   
    <!-- Appointment End -->


    <!-- Pricing Plan Start -->
   
    <!-- Pricing Plan End -->

    <!-- Search Start -->
   
    <!-- Search End -->

    <!-- Team Start -->
   <?php
include("team.php");
   ?>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <?php
include("testimonal.php");
    ?>
    <!-- Testimonial End -->
    <div id="contact">
<?php
include("cont.php");
    ?>
</div>
    <!-- Blog Start -->
   
    <!-- Blog End -->
   

    <!-- Footer Start -->
   <?php

include("footer.php");
   ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<script>
window.onscroll = function() {scrollProgress()};

function scrollProgress() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("scroll-progress").style.width = scrolled + "%";
}
</script>


    <!-- JavaScript Libhttps://guruportfolio2.netlify.app/ries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        // Open appointment popup on button click
        $("#open-appointment").click(function(){
            // Load content from appointall.php using AJAX
            $("#appointment-content").load("appointall.php");
            // Show the appointment popup
            $("#appointment-popup").modal('show');
        });

        // Close appointment popup on close icon click
        $(".close-icon").click(function(){
            // Hide the appointment popup
            $("#appointment-popup").modal('hide');
        });
    });
</script>


</html>
<?php
include("connection.php");  

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process form data if the request method is POST
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $division = isset($_POST['division']) ? $_POST['division'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';

    // Check if the user has already applied
    $check_query = "SELECT * FROM general_appointment WHERE email = '$email'";
    $check_result = mysqli_query($connect, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // If the user has already applied, show the alert message and stop further execution
        echo '<script>alert("You have already applied.");</script>';
    } else {
        // Insert the data into the database
        $insert = mysqli_query($connect, "INSERT INTO general_appointment (name,email,phone,gender,division,district,department,doctor,date,time,date_reg,status) VALUES ('$name','$email','$phone','$gender','$division','$district','$department','$doctor','$date','$time',NOW(),'pending')");

        if ($insert) {
            // Close the database connection
            mysqli_close($connect);

            // Redirect the user to a confirmation page
            header("Location: confirmation.php");
            exit(); // Stop further execution
        } else {
            // Echo JavaScript code to display an error notification
            echo '<script>alert("Error: ' . mysqli_error($connect) . '");</script>';
        }
    }
}
?>


 <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Open appointment popup on button click
            $("#open-appointment").click(function(){
                // Show the appointment popup
                $("#appointment-popup").modal('show');
            });

            // Close appointment popup on close icon click
            $("#close-appointment").click(function(){
                // Hide the appointment popup
                $("#appointment-popup").modal('hide');
            });
        });
    </script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var serviceDropdown = document.getElementById('serviceDropdown');
    var serviceDropdownMenu = document.getElementById('serviceDropdownMenu');

    // Add click event listener to the service dropdown link
    serviceDropdown.addEventListener('click', function() {
        // Toggle the 'show' class on the dropdown menu
        serviceDropdownMenu.classList.toggle('show');
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!serviceDropdownMenu.contains(event.target) && !serviceDropdown.contains(event.target)) {
            serviceDropdownMenu.classList.remove('show');
        }
    });
});

    </script>
</body>
</html>