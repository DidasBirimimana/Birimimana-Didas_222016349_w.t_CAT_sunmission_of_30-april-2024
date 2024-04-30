<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Connection details
    include('db_connection.php');
    
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'applicant_info' => "SELECT applicant_info_id FROM applicant_info WHERE applicant_info_id LIKE '%$searchTerm%'",
        'course_info' => "SELECT course_id FROM course_info WHERE course_id LIKE '%$searchTerm%'",
        'financial_issues_info' => "SELECT financial_info_id FROM financial_issues_info WHERE financial_info_id LIKE '%$searchTerm%'",
        'project_research_info' => "SELECT project_name FROM project_research_info WHERE project_name LIKE '%$searchTerm%'",
        'semester_info' => "SELECT semester_info_id FROM semester_info WHERE semester_info_id LIKE '%$searchTerm%'",
        'student' => "SELECT first_name FROM student WHERE first_name LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
