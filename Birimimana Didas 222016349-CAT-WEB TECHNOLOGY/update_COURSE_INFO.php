<?php
// Define connection parameters
include('db_connection.php');

if(isset($_REQUEST['course_id'])) {
    $cid = $_REQUEST['course_id'];
    
    $stmt = $connection->prepare("SELECT * FROM course_info WHERE course_id=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['course_id'];
        $Y = $row['student_id'];
        $Z = $row['course_title'];
        $W = $row['department'];
        $N = $row['credits_number'];
        $D = $row['semester_offered'];
        $R = $row['grade'];
    } else {
        echo "Course not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course info</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Course info form -->
    <h2><u>Update Form of Course info</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="student_id">Student_id:</label>
        <input type="text" name="stid" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="course_title">Course_title:</label>
        <input type="text" name="coid" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="department">Department:</label>
        <input type="text" name="dept" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="credits_number">credits_number:</label>
        <input type="number" name="crn" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="semester_offered">Semester_offered:</label>
        <input type="text" name="smoff" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grd" value="<?php echo isset($R) ? $R : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $student_id = $_POST['stid'];
    $course_title = $_POST['coid'];
    $department = $_POST['dept'];
    $credits_number = $_POST['crn'];
    $semester_offered = $_POST['smoff'];
    $grade = $_POST['grd'];
    $course_id = $_REQUEST['course_id'];
    
    // Update the course_info in the database
    $stmt = $connection->prepare("UPDATE course_info SET student_id=?, course_title=?, department=?, credits_number=?, semester_offered=?, grade=? WHERE course_id=?");
    $stmt->bind_param("ssssssi", $student_id, $course_title, $department, $credits_number, $semester_offered, $grade, $course_id);
    $stmt->execute();
    
    // Redirect to course_info.php
    header('Location: COURSE-INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
