<?php
// Define connection parameters
include('db_connection.php');

if(isset($_REQUEST['applicant_info_id'])) {
    $applid = $_REQUEST['applicant_info_id'];
    
    $stmt = $connection->prepare("SELECT * FROM applicant_info WHERE applicant_info_id=?");
    $stmt->bind_param("i", $applid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['applicant_info_id'];
        $Y = $row['father_name'];
        $Z = $row['mother_name'];
        $W = $row['email'];
        $N = $row['phone'];
        $D = $row['address'];
        $R = $row['age'];
    } else {
        echo "Applicant not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update applicant info</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update applicant info form -->
    <h2><u>Update Form of applicant info</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="father_name">Father Name:</label>
        <input type="text" name="fnm" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="mother_name">Mother Name:</label>
        <input type="text" name="mtn" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="email">Email:</label>
        <input type="email" name="eml" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phne" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="address">Address:</label>
        <input type="text" name="adrss" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <label for="age">Age:</label>
        <input type="number" name="ag" value="<?php echo isset($R) ? $R : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $father_name = $_POST['fnm'];
    $mother_name = $_POST['mtn'];
    $email = $_POST['eml'];
    $phone = $_POST['phne'];
    $address = $_POST['adrss'];
    $age = $_POST['ag'];
    $applicant_info_id = $_REQUEST['applicant_info_id'];
    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE applicant_info SET father_name=?, mother_name=?, email=?, phone=?, address=?, age=? WHERE applicant_info_id=?");
    $stmt->bind_param("ssssssi", $father_name, $mother_name, $email, $phone, $address, $age, $applicant_info_id);
    $stmt->execute();
    
    // Redirect to applicant_info.php
    header('Location: APPLICANT-INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
