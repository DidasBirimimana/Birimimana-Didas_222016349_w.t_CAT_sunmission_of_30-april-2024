<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>semester info Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;

      background-color: darkcyan;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
   <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="skyblue">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/collage logo.png" width="90" height="60" alt="Logo">
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./About.php">ABOUT_US</a>
  	<li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.php">CONTACT_US</a>
    <li style="display: inline; margin-right: 10px;"><a href="./APPLICANT-INFO.php">APPLICANT-INFO</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./COURSE-INFO.php">COURSE-INFO</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./FINANCIAL-ISSUES-INFO.php">FINANCIAL-ISSUES-INFO</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./PROJECT-RESEARCH-INFO.php">PROJECT-RESEARCH-INFO</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./SEMESTER-INFO.php">SEMESTER-INFO</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./STUDENT INFO.php">STUDENT INFO</a>
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
  </ul>

</header>
<section>
    <h1>semester_info form</h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="smid">Semester_info_id:</label>
<input type="number" id="smid" name="smid" ><br><br>

<label for="strd">start_date:</label>
<input type="date" id="strd" name="strd" required><br><br>

<label for="ending_date">Ending_date:</label>
<input type="date" id="endd" name="endd" required><br><br>

<label for="student_id"> Student_id:</label>
<input type="number" id="stdi" name="stdi" required><br><br>

<label for="semester_code">Semester_code:</label>
<input type="text" id="smcd" name="smcd" required><br><br>

<label for="total_number_of_modules">Total_number_of_modules:</label>
<input type="text" id="tmd" name="tmd" required><br><br>

<label for="failed_modules">Failed_modules:</label>
<input type="text" id="fm" name="fm" required><br><br>

            </select><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>
 <?php
    // Connection details
    include('db_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO semester_info (semester_info_id, start_date, ending_date, student_id, semester_code, total_number_of_modules, failed_modules) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $semester_info_id, $start_date, $ending_date, $student_id, $semester_code, $total_number_of_modules, $failed_modules);

        // Set parameters from POST data with validation (optional)
        $semester_info_id = ($_POST['smid']); // Ensure integer for ID
        $start_date = ($_POST['strd']); 
        $ending_date = ($_POST['endd']); 
        $student_id = ($_POST['stdi']); 
        $semester_code = ($_POST['smcd']); 
        $total_number_of_modules = ($_POST['tmd']);
        $failed_modules = ($_POST['fm']); 

        // Execute prepared statement with error handling
        if ($stmt->execute()) {
            echo "New record has been added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $connection->close();
    ?>

<?php
// Connection details
include('db_connection.php');

// SQL query to fetch data from semester_info table
$sql = "SELECT * FROM semester_info ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of semester_info </title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of semester_info </h2></center>
    <table border="5">
        <tr>
            <th>semester_info_id</th>
            <th>start_date</th>
            <th>ending_date</th>
            <th>student_id</th>
            <th>semester_code</th>
            <th>total_number_of_modules</th>
            <th>failed_modules</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include('db_connection.php');

        // Prepare SQL query to retrieve all semester_info
        $sql = "SELECT * FROM semester_info";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $snfid = $row['semester_info_id']; 
                echo "<tr>
                    <td>" . $row['semester_info_id'] . "</td>
                    <td>" . $row['start_date'] . "</td>
                    <td>" . $row['ending_date'] . "</td>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['semester_code'] . "</td>
                    <td>" . $row['total_number_of_modules'] . "</td>
                    <td>" . $row['failed_modules'] . "</td>
                    <td><a style='padding:4px' href='delete_semester_info.php?semester_info_id=$snfid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_semester_info.php?semester_info_id=$snfid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: @Didas Birimimana</h2></b>
  </center>
</footer>
</body>
</html>