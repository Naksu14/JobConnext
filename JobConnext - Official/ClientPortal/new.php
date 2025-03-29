
<?php 
    $servername = "localhost";
    $username = "root"; // Change if needed
    $password = "";
    $database = "job_connext"; // Change if different
    
    $conn = new mysqli($servername, $username, $password, $database);
?>

<?php
// Read the file into an array (one skill per line)
$workerSkills = file('skills.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Display all skills
echo "Worker Skills:<br>";
print_r($workerSkills);
echo "<br>";

// Conditional statements
foreach ($workerSkills as $skill) {
    if ($skill === "plumber") {
        echo "Found a plumber!<br>";
    } elseif ($skill === "electrician") {
        echo "Found an electrician!<br>";
    } else {
        echo "Other skill: $skill<br>";
    }
}
?>