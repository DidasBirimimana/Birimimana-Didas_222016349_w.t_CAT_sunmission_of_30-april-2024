<?php
// Define connection parameters
include('db_connection.php');

if(isset($_REQUEST['project_id'])) {
    $cid = $_REQUEST['project_id'];
    
    $stmt = $connection->prepare("SELECT * FROM project_research_info WHERE project_id=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['project_id'];
        $Y = $row['project_name'];
        $Z = $row['project_purpose'];
        $W = $row['student_id'];
        $N = $row['project_invigilator_name'];
    } else {
        echo "project not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update project_research_info</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update project_research_info form -->
    <h2><u>Update Form of project_research_info</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="project_name">Project_name:</label>
        <input type="text" name="pjn" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="project_purpose">Project_purpose:</label>
        <input type="text" name="pjp" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="student_id">Student_id:</label>
        <input type="text" name="stid" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="credits_number">credits_number:</label>
        <input type="number" name="crn" value="<?php echo isset($N) ? $N : ''; ?>">
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
    
    // Update the  PROJECT-RESEARCH-INFO in the database
    $stmt = $connection->prepare("UPDATE course_info SET student_id=?, course_title=?, department=?, credits_number=?, semester_offered=?, grade=? WHERE course_id=?");
    $stmt->bind_param("ssssssi", $student_id, $course_title, $department, $credits_number, $semester_offered, $grade, $course_id);
    $stmt->execute();
    
    // Redirect to  PROJECT-RESEARCH-INFO.php
    header('Location: PROJECT-RESEARCH-INFO.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
