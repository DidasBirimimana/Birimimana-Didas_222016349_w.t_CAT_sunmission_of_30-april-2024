<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>course info Page</title>
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
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="./ABOUT US.html">ABOUT US</a>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.html">CONTACT US</a>
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
    <h1>Course Info form</h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="appli">Course-id:</label>
<input type="cid" id="cid" name="cid" required><br><br>

<label for="stdid">Student-id:</label>
<input type="stdid" id="stdid" name="stdid" required><br><br>

<label for="">Course Title:</label>
<input type="text" id="courset" name="courset" required><br><br>

<label for="department"> Department:</label>
<input type="text" id="department" name="department" required><br><br>

<label for="Credit-number">Credit-number:</label>
<input type="text" id="crdn" name="crdn" required><br><br>

<label for="Semester-number">Semester-number:</label>
<input type="text" id="smtn" name="smtn" required><br><br>

<label for="Grade">Grade:</label>
<input type="text" id="grd" name="grd" required><br><br>

            </select><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>
 <?php
    // Connection details
    include('db_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO course_info (course_id, student_id, course_title, department, credits_number, semester_offered, grade) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $course_id, $student_id, $course_title, $department, $credits_number, $semester_offered, $grade);

        // Set parameters from POST data with validation (optional)
        $course_id = ($_POST['cid']); // Ensure integer for ID
        $student_id = ($_POST['stdid']); 
        $course_title = ($_POST['courset']); 
        $department = ($_POST['department']); 
        $credits_number = ($_POST['crdn']); 
        $semester_offered = ($_POST['smtn']);
        $grade = ($_POST['grd']); 

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
$include('db_connection.php');

// SQL query to fetch data from Course Info table
$sql = "SELECT * FROM course_info ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Information Details</title>
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
    <h2 style="text-align: center;">Course Information Table</h2>
    <table border="1">
        <tr>
            <th>Course ID</th>
            <th>Student ID</th>
            <th>Course Title</th>
            <th>Department</th>
            <th>Credits Number</th>
            <th>Semester Offered</th>
            <th>Grade</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        include('db_connection.php');

        // Prepare SQL query to retrieve all courses
        $sql = "SELECT * FROM course_info";
        $result = $connection->query($sql);

        // Check if there are any courses
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $Cid = $row['course_id']; 
                echo "<tr>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['course_title'] . "</td>
                    <td>" . $row['department'] . "</td>
                    <td>" . $row['credits_number'] . "</td>
                    <td>" . $row['semester_offered'] . "</td>
                    <td>" . $row['grade'] . "</td>
                    <td><a style='padding: 4px;' href='delete_COURSE_INFO.php?course_id=$Cid'>Delete</a></td> 
                    <td><a style='padding: 4px;' href='update_COURSE_INFO.php?course_id=$Cid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data found</td></tr>";
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