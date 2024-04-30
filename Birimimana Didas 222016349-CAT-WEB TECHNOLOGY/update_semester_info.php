<?php
// Define connection parameters
include('db_connection.php');

if(isset($_REQUEST['semester_info_id'])) {
    $smid = $_REQUEST['semester_info_id'];
    
    $stmt = $connection->prepare("SELECT * FROM semester_info WHERE semester_info_id=?");
    $stmt->bind_param("i", $smid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['semester_info_id'];
        $Y = $row['start_date'];
        $Z = $row['ending_date'];
        $W = $row['student_id'];
        $N = $row['semester_code'];
        $D = $row['total_number_of_modules'];
        $R = $row['failed_modules'];
    } else {
        echo "semester_info not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update semester</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update semester form -->
    <h2><u>Update Form of semester</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="semester_info_id">semester_info_id:</label>
        <input type="text" name="semester_info_id" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="start_date">start_date:</label>
        <input type="date" name="stn" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>
       
        <label for="ending_date">ending_date:</label>
        <input type="date" name="edd" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="student_id">student_id:</label>
        <input type="text" name="std" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="semester_code">semester_code:</label>
        <input type="text" name="smc" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="total_number_of_modules">total_number_of_modules:</label>
        <input type="number" name="tnm" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <label for="failed_modules">failed_modules:</label>
        <input type="number" name="Fnm" value="<?php echo isset($R) ? $R : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $start_date = $_POST['stn'];
    $ending_date = $_POST['edd'];
    $student_id = $_POST['std'];
    $semester_code = $_POST['smc'];
    $total_number_of_modules = $_POST['tnm'];
    $failed_modules = $_POST['Fnm'];
    $semester_info_id = $_POST['semester_info_id'];
    
    // Update the SEMESTER-INFO in the database
    $stmt = $connection->prepare("UPDATE semester_info SET start_date=?, ending_date=?, student_id=?, semester_code=?, total_number_of_modules=?, failed_modules=? WHERE semester_info_id=?");
    $stmt->bind_param("ssssssi", $start_date, $ending_date, $student_id, $semester_code, $total_number_of_modules, $failed_modules, $semester_info_id);
    $stmt->execute();
    
    // Redirect to SEMESTER-INFO.php
    header('Location: SEMESTER-INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close connection
$connection->close();
?>
