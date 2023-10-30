<?php 
include('../config.php');

if (isset($_POST["adduser"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
	$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
	$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
	$org = mysqli_real_escape_string($conn, $_POST["org"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pword = mysqli_real_escape_string($conn, md5($_POST["pword"]));
    $cpword = mysqli_real_escape_string($conn, md5($_POST["cpword"]));
	
  
    $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT uname FROM participants WHERE uname='$uname'"));
  
    if ($pword !== $cpword) {
        echo "<script>alert('Password did not match. Please try again');</script>";
        header("Location: records.php");
    } elseif ($check_user > 0) {
      echo "<script>alert('Username already exists in the database.');</script>";
      header("Location: records.php");
    } else {
      $sql = "INSERT INTO participants (firstname,lastname,uname,password,cpassword,email,dob,gender,organisation,phone) VALUES ('$fname', '$lname', '$uname', '$pword', '$cpword', '$email', '$dob', '$gender', '$org', '$phone' )";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          header("Location: records.php");
      } else {
        echo "<script>alert('Participant registration failed.');</script>";
        header("Location: records.php");
    }
    }
  }
?>