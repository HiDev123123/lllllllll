<?php

include 'conn.php';
$sql = "insert into invoice_numbers (num) values ('$_POST[num]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: index.php");
} else {    
    echo "Error: " . $sql . "<br>" . $conn->error;
}