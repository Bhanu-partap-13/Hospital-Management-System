<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css ">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
     <title>Check appoint status</title>
     <style>
         {
            height: 100%;
            margin: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            margin-top: 150px;
         }
         .container{
            text-align: center;

         }
         .success-animation{
            display: inline-block;
            position: relative;
            animation: fadeinup 0.5s ease forwards;

         }
         @keyframes fadeInUp{
            0%{
                opacity: 0;
                transform: translateY(20px);
            }
                100%{
                    opacity: 1;
                    transform: translateY(10px);
            }
         }

         .checkmark{
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            fill: none;
            animation: drawCircle 0.5s ease forwards;
            margin-left: 120px;
            margin-top: 100px;
         }
         .checkmark-circle{
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4bb71b;
            fill: none;
            animation: strokeCircle 0.6s ease forwards;
         }

         .checkmark-check{
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: drawCheck 0.6s ease forwards;
         }

         .success-message{
            margin-top: 10px;
            font-family: Arial,sans-serif;
            font-size: 18px;
            color: #333;
            animation: fadeIn 0.5s ease forwards 0.6s;

         }

         @keyframes drawCircle{
            0%{
                stroke-dashoffset: 166;
            }
            100%{
                stroke-dashoffset: 0;
            }
         }

         @keyframes strokeCircle{
            0%{
                stroke-dashoffset: 166;
            }
            100%{
                stroke-dashoffset: 0;
            }
         }

         @keyframes drawCheck{
            0%{
                stroke-dashoffset: 48;
            }
            100%{
                stroke-dashoffset: 0;
            }
         }

         @keyframes fadeIn{
            0%{
                opacity: 0;
            }
            100%{
                opacity: 1;
            }
         }
     </style>
</head>

<body>
    <div class="container">
        <div class="success-animation">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circlce class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark-check" fill="none" d="M14.1  27.217.1 7.2 16.7-16.8"/>
            </svg>
            <p class="success-message">Appoint Request Successfully sent.</p>
        </div>
    </div>
    <footer style="margin-top: 100px; height: 100px;">
        <?php
include("include/footer.php");
        ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>