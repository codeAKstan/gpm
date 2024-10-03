<?php 

$sName = "localhost";
$uName = "codeak";
$pass = "5334";
$db_name = "gpm_user_registration";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}


// CREATE DATABASE gpm_user_registration;

// USE gpm_user_registration;

// CREATE TABLE users (
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100) NOT NULL,
//     email VARCHAR(150) NOT NULL UNIQUE,
//     username VARCHAR(100) NOT NULL UNIQUE,
//     phone_number VARCHAR(20) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     country VARCHAR(100) NOT NULL,
//     gender ENUM('Male', 'Female', 'Other') NOT NULL,
//     dob DATE NOT NULL,
//     address VARCHAR(255),
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

