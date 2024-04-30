<?php
// Define connection parameters
include('db_connection.php');

if(isset($_REQUEST['financial_info_id'])) {
    $fid = $_REQUEST['financial_info_id'];
    
    $stmt = $connection->prepare("SELECT * FROM financial_issues_info WHERE financial_info_id=?");
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['financial_info_id'];
        $Y = $row['school_fees'];
        $Z = $row['library_status'];
        $W = $row['student_id'];
    } else {
        echo "Financial info not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Financial info</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Financial info form -->
    <h2><u>Update Form of Financial info</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="school_fees">School Fees:</label>
        <input type="text" name="stff" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="library_status">Library Status:</label>
        <input type="text" name="lbst" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="student_id">Student ID:</label>
        <input type="text" name="stud" value="<?php echo isset($W) ? $W : ''; ?>">
        
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $school_fees = $_POST['stff'];
    $library_status = $_POST['lbst'];
    $student_id = $_POST['stud'];

    // Update the financial_issues_info in the database
    $stmt = $connection->prepare("UPDATE financial_issues_info SET school_fees=?, library_status=?, student_id=? WHERE financial_info_id=? ");
    $stmt->bind_param("ssii", $school_fees, $library_status, $student_id, $fid);
    $stmt->execute();
    
    // Redirect to financial_info.php
    header('Location: FINANCIAL-ISSUES-INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
