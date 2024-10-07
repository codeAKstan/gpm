<?php 

$sName = "localhost";
$uName = "gpmautom_gpm";
$pass = "f40mordL@100";
$db_name = "gpmautom_user_registration";

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

// CREATE TABLE transactions (
//   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   user_id INT(11) UNSIGNED NOT NULL,
//   type ENUM('deposit', 'withdrawal') NOT NULL,
//   amount DECIMAL(15, 2) NOT NULL,
//   status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
// );

// CREATE TABLE portfolio (
//   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   user_id INT(11) UNSIGNED NOT NULL,
//   balance DECIMAL(15, 2) DEFAULT 0.00,
//   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
// );


// DELIMITER //
// CREATE TRIGGER after_user_insert
// AFTER INSERT ON users
// FOR EACH ROW
// BEGIN
//     INSERT INTO portfolio (user_id) VALUES (NEW.id);
// END;
// //
// DELIMITER ;
