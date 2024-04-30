<?php
// Define connection parameters
    include('db_connection.php');

if(isset($_REQUEST['student_id'])) {
    $stid = $_REQUEST['student_id'];
    
    $stmt = $connection->prepare("SELECT * FROM student WHERE student_id=?");
    $stmt->bind_param("i", $stid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['student_id'];
        $Y = $row['first_name'];
        $Z = $row['last_name'];
        $W = $row['date_of_birth'];
        $N = $row['email'];
        $D = $row['phone_number'];
        $R = $row['gender'];
    } else {
        echo "student not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update student</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update student form -->
    <h2><u>Update Form of student</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="fname">first_name:</label>
        <input type="text" name="fname" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="lname">last_name:</label>
        <input type="text" name="lname" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="dob">date_of_birth:</label>
        <input type="date" name="dob" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="eml">email:</label>
        <input type="email" name="eml" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="phnumber">phone_number:</label>
        <input type="text" name="phnumber" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <label for="gend">Gender:</label>
        <select name="gend">
                <option <?php if(isset($R) && $R == 'Male') echo 'selected'; ?>>Male</option>
                <option <?php if(isset($R) && $R == 'Female') echo 'selected'; ?>>Female</option>
        </select>
        <br><br>
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $date_of_birth = $_POST['dob'];
    $email = $_POST['eml'];
    $phone_number = $_POST['phnumber'];
    $gender = $_POST['gend'];
    
    // Update the student_info in the database
    $stmt = $connection->prepare("UPDATE student SET first_name=?, last_name=?, date_of_birth=?, email=?, phone_number=?, gender=? WHERE student_id=?");
    $stmt->bind_param("ssssssi", $first_name, $last_name, $date_of_birth, $email, $phone_number, $gender, $stid);
    $stmt->execute();
 
    // Redirect to student_info.php
    header('Location: STUDENT INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close connection
$connection->close();
?>
