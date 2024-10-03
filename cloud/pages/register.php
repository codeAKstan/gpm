<?php 

if(isset($_POST['name']) && 
   isset($_POST['username']) &&
   isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['cpassword']) && 
   isset($_POST['cnumber']) && 
   isset($_POST['country']) &&
   isset($_POST['gender']) &&
   isset($_POST['dob']) &&
   isset($_POST['address'])) {

    include "db_conn.php";

    $name = $_POST['name'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $cnumber = $_POST['cnumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Form data to pass back to form if there's an error
    $data = "name=".$name."&username=".$username."&email=".$email."&country=".$country."&cnumber=".$cnumber."&gender=".$gender."&dob=".$dob."&address=".$address;

    // Validate form fields
    if (empty($name)) {
    	$em = "Full name is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else if(empty($username)){
		$em = "Username is required";
		header("Location: signup.php?error=$em&$data");
		exit;
	} else if(empty($email)){
		$em = "Email is required";
		header("Location: signup.php?error=$em&$data");
		exit;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$em = "Invalid email format";
		header("Location: signup.php?error=$em&$data");
		exit;
	} else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
	} else if ($pass !== $cpass) {
		$em = "Passwords do not match";
		header("Location: signup.php?error=$em&$data");
		exit;
	} else if(empty($cnumber)){
    	$em = "Phone number is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else if(empty($country)){
    	$em = "Country is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else if(empty($gender)){
    	$em = "Gender is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else if(empty($dob)){
    	$em = "Date of birth is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else if(empty($address)){
    	$em = "Address is required";
    	header("Location: signup.php?error=$em&$data");
	    exit;
    } else {
		// Ensure email and username are unique
		$query = "SELECT * FROM users WHERE email = ? OR username = ?";
    	$stmt = $conn->prepare($query);
    	$stmt->execute([$email, $username]);

		if ($stmt->rowCount() > 0) {
			$em = "Email or Username already exists";
    		header("Location: signup.php?error=$em&$data");
	    	exit;
		} else {
			// Hash the password
			// $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

			// Insert data into the database
			$sql = "INSERT INTO users(name, username, password, email, country, phone_number, gender, dob, address) 
    	            VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$name, $username, $pass, $email, $country, $cnumber, $gender, $dob, $address]);

			header("Location: signup.php?success=Your account has been created successfully");
			exit;
		}
	}
} else {
	$em = "All fields are required!";
	header("Location: signup.php?error=$em");
	exit;
}
