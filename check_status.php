<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Check Appointment Status</title>
  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Stylesheet -->  
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container fixed-position">
    <div class="search-form">
      <h5 class="mb-4 text-center">Check Appointment Status</h5>
      <form method="post" action="">  <!-- Added action attribute to handle form submission -->
        <div class="form-group">
          <label for="searchPhone">Enter Phone Number</label>
          <input type="text" class="form-control" id="searchPhone" name="searchPhone" required>
        </div>
        <button type="submit" class="btn btn-primary" name="searchSubmit">Check Status</button>
      </form>
    </div>

    <?php
    include("connection.php");

    // Only execute this block if the form has been submitted via POST method
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchSubmit'])) {
      // Basic sanitization to prevent SQL Injection
      $searchPhone = mysqli_real_escape_string($connect, $_POST['searchPhone']);

      // Check if phone number is not empty
      if (!empty($searchPhone)) {
        $searchQuery = "SELECT * FROM appointment WHERE phone = '$searchPhone'";
        $searchResult = mysqli_query($connect, $searchQuery);

        // Error handling for query execution
        if (!$searchResult) {
          echo "<div class='alert alert-danger'>Error executing query: " . mysqli_error($connect) . "</div>";
          exit;
        }

        if (mysqli_num_rows($searchResult) > 0) {
          echo "<div class='result'>";
          echo "<table class='table' style='width:900px;'>
          <tr>
          <th>Name</th>
          <th>District</th>
          <th>Department</th>
          <th>Doctor</th>
          <th>Consultation Date</th>
          <th>Status</th>
          </tr>";

          while ($row = mysqli_fetch_assoc($searchResult)) {
            $bgcolor = ''; // Initialize properly

            if ($row['status'] == 'approved') {
              $bgcolor = 'table-success';
            } elseif ($row['status'] == 'denied') {
              $bgcolor = 'table-danger';
            }

            echo "<tr class='$bgcolor'>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['district']) . "</td>";
            echo "<td>" . htmlspecialchars($row['department']) . "</td>";
            echo "<td>" . htmlspecialchars($row['doctor']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
            echo "<td class='text-black'>" . htmlspecialchars($row['status']) . "</td>";
            echo "</tr>";
          }

          echo "</table>";
          echo "</div>";
        } else {
          echo "<div class='result'>";
          echo "<h2>No Result Found</h2>";
          echo "</div>";
        }
      } else {
        echo "<div class='result'>";
        echo "<h2>Please enter a valid phone number.</h2>";
        echo "</div>";
      }

      mysqli_close($connect);
    }
    ?>
  </div>

  <footer class="footer-custom">
    <?php
    include("footer.php");
    ?>
  </footer>
</body>
</html>
