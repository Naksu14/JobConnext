<?php 
    $servername = "localhost";
    $username = "root"; // Change if needed
    $password = "";
    $database = "job_connext"; // Change if different
    
    $conn = new mysqli($servername, $username, $password, $database);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .skill-tag {
    display: inline-block;
    padding: 5px 20px;
    margin-right: 5px;
    margin-bottom: 5px;
    font-size: 12px;
    font-weight: bold;
    border-radius: 2px;
    color: black;
    white-space: nowrap;

}
    </style>

    <span class="skill-tag green">Plumber</span>
</body>
</html>

