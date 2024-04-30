<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>applicant info Page</title>
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
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
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
<h1>Applicant Information Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="applicant_info_id">Applicant ID:</label>
        <input type="number" id="applicant_info_id" name="applicant_info_id"><br><br>

        <label for="father_name">Father's Name:</label>
        <input type="text" id="father_name" name="father_name" required><br><br>

        <label for="mother_name">Mother's Name:</label>
        <input type="text" id="mother_name" name="mother_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <input type="submit" name="add" value="Insert">
    </form>

    <?php
    // Connection details
    include('db_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO APPLICANT_INFO (applicant_info_id, father_name, mother_name, email, phone, address, age) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $applicant_info_id, $father_name, $mother_name, $email, $phone, $address, $age);

        // Set parameters from POST data with validation (optional)
        $applicant_info_id = intval($_POST['applicant_info_id']); // Ensure integer for ID
        $father_name = htmlspecialchars($_POST['father_name']); // Prevent XSS
        $mother_name = htmlspecialchars($_POST['mother_name']); // Prevent XSS
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Validate email
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT); // Sanitize phone number
        $address = htmlspecialchars($_POST['address']); // Prevent XSS
        $age = intval($_POST['age']); // Ensure integer for age

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
   
// SQL query to fetch data from APPLICANT-INFO table
$sql = "SELECT * FROM APPLICANT_INFO";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of APPLICANT-INFO</title>
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
    <center><h2>Table of APPLICANT-INFO</h2></center>
    <table border="5">
        <tr>
            <th>applicant_info_id</th>
            <th>father_name</th>
            <th>mother_name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>age</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       
    include('db_connection.php');

        // Prepare SQL query to retrieve all applicant_info
        $sql = "SELECT * FROM APPLICANT_INFO";
        $result = $connection->query($sql);

        // Check if there are any applicant_info
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $appid = $row['applicant_info_id']; // Fetch the applicant_info_id
                echo "<tr>
                    <td>" . $row['applicant_info_id'] . "</td>
                    <td>" . $row['father_name'] . "</td>
                    <td>" . $row['mother_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td><a style='padding:4px' href='delete_APPLICANT-INFO.php?applicant_info_id=$appid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_APPLICANT-INFO.php?applicant_info_id=$appid'>Update</a></td> 
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