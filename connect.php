<?php
//connect to mySQL database
$conn = new mysqli("localhost", "root", "", "shop");
if ($conn->connect_errno)
{
    echo "<br><h1>Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error . "</h1><br>";
}