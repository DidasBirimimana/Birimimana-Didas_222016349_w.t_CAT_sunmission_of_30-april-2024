<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>student info Page</title>
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
    <li style="display: inline; margin-right: 10px;"><a href="./STUDENT INFO.php">STUDENT INFO
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
		<h1>STUDENT INFO Form</h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="stid">student_id:</label>
<input type="number" id="stid" name="stid"><br><br>

<label for="ftn">First Name:</label>
<input type="text" id="ftn" name="ftn" required><br><br>

<label for="lname">Last Name:</label>
<input type="text" id="lname" name="lname" required><br><br>

<label for="dtb">Date_of_Birth:</label>
<input type="Date" id="dtb" name="dtb" required><br><br>

<label for="dtb">Email:</label>
<input type="email" id="email" name="email" required><br><br>


<label for="phne">Phone Number:</label>
<input type="text" id="phne" name="phne" required><br><br>

<label for="gend">Gender:</label>
            <select name="gend" id="gend">
                <option>Male</option>
                <option>Female</option>
            </select><br><br>

<input type="submit" name="add" value="Insert"><br><br>
</form>

<?php
    // Connection details
    include('db_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO student (student_id, first_name, last_name, date_of_birth, email, phone_number, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $student_id, $first_name, $last_name, $date_of_birth, $email, $phone_number, $gender);

        // Set parameters from POST data with validation (optional)
        $student_id =($_POST['stid']); // Ensure integer for ID
        $first_name =($_POST['ftn']); 
        $last_name = ($_POST['lname']); 
        $date_of_birth = ($_POST['dtb']); 
        $email = ($_POST['email']); 
        $phone_number = ($_POST['phne']);
        $gender= ($_POST['gend']); 

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

// SQL query to fetch data from student table
$sql = "SELECT * FROM student ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of student Table </title>
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
    <center><h2>Table of Student </h2></center>
    <table border="5">
        <tr>
            <th>Student_id</th>
            <th>First_name</th>
            <th>Last_name</th>
            <th>Date_of_birth</th>
            <th>Email</th>
            <th>Phone_number</th>
            <th>Gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        include('db_connection.php');

        // Prepare SQL query to retrieve all student info
        $sql = "SELECT * FROM student";
        $result = $connection->query($sql);

        // Check if there are any student info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id']; 
                echo "<tr>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['date_of_birth'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone_number'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td><a style='padding:4px' href='delete_student.php?student_id=$sid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_student.php?student_id=$sid'>Update</a></td> 
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