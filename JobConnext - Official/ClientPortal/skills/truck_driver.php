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
        .skill-tag3 {
            display: inline-block;
    padding: 4px 15px;
    margin-right: 5px;
    margin-bottom: 5px;
    font-size: 14px;
    font-weight: 500;
    border-radius: 2px;
    color: black;
    white-space: nowrap;
    background-color: #C3C628;
}
    </style>

    <span class="skill-tag3">Truck Driver</span>
</body>
</html>

