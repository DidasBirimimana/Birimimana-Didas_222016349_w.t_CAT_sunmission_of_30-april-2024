<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>financial issues Page</title>
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
<h1>financial_issues_info Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="financial_info_id">Financial_info_id:</label>
        <input type="number" id="financialinfoid" name="financialinfoid"><br><br>

        <label for="school_fees">School_fees:</label>
        <input type="text" id="schoolfees" name="schoolfees" required><br><br>

        <label for="library_status">library_status:</label>
                 <select name="librarystatus" id="librarystatus"></select>
                 <option>cleared</option>
                 <option>not cleared</option>
                  </select> <br><br>

        <label for="student_id">student_id:</label>
        <input type="number" id="studentid" name="studentid" required><br><br>

        
        <input type="submit" name="add" value="Insert">
    </form>

    <?php
    include('db_connection.php');
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO financial_issues_info (Financial_info_id, school_fees, library_status, student_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Financial_info_id, $school_fees, $library_status, $student_id);

        // Set parameters from POST data with validation (optional)
        $Financial_info_id = ($_POST['financialinfoid']); // Ensure integer for ID
        $school_fees = ($_POST['schoolfees']); 
        $library_status = ($_POST['librarystatus']); 
        $student_id = ($_POST['studentid']); 
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

// SQL query to fetch data from financial_issues_info table
$sql = "SELECT * FROM financial_issues_info";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of financial_issues_info</title>
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
    <center><h2>Table of financial_issues_info</h2></center>
    <table border="5">
        <tr>
            <th>Financial_info_id</th>
            <th>school_fees</th>
            <th>library_status</th>
            <th>student_id</th>
        </tr>
        <?php
        // Define connection parameters
       
        include('db_connection.php');

        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM financial_issues_info";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $fid = $row['financial_info_id']; // Fetch the Financial_info_id
                echo "<tr>
                    <td>" . $row['financial_info_id'] . "</td>
                    <td>" . $row['school_fees'] . "</td>
                    <td>" . $row['library_status'] . "</td>
                    <td>" . $row['student_id'] . "</td>
                    <td><a style='padding:4px' href='delete_financial_issues_info.php?financial_info_id=$fid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_financial_issues_info.php?applicant_info_id=$fid'>Update</a></td> 
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