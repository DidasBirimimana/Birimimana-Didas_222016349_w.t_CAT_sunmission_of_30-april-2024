<?php
// Connection details
include('db_connection.php');

// Check if financial_info_id is set and is a valid integer
if (isset($_REQUEST['financial_info_id']) && is_numeric($_REQUEST['financial_info_id'])) {
    $pid = $_REQUEST['financial_info_id'];

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM financial_issues_info WHERE financial_info_id=?");
    $stmt->bind_param("i", $pid);
     ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>";
        echo "<a href='FINANCIAL-ISSUES-INFO.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "Invalid or missing financial_info_id.";
}

$connection->close();
?>
