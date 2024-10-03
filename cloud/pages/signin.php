<?php 
session_start();

if(isset($_POST['email']) && 
   isset($_POST['password'])){

    include "db_conn.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = "email=".$email;
       // Validate email format
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $em = "Invalid email format";
         header("Location: login.php?error=$em");
         exit;
     }
    
    if(empty($email)){
    	$em = "email is required";
    	header("Location: login.php?error=$em&$data");
	    exit;
    }else if(empty($password)){
    	$em = "Password is required";
    	header("Location: login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM users WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$email]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          if ($password === $user['password']) { 
            // Create session variables for the logged-in user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_username'] = $user['username']; 
            
            header("Location: dashboard.php");
            exit;
        } else {
            // Sanitize error message for URL and security
            $em = urlencode("Incorrect email or password");
            header("Location: login.php?error=$em&$data");
            exit;
        }

      }else {
         $em = "Incorect email or password";
         header("Location: login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: login.php?error=error");
	exit;
}
