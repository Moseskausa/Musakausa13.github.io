<?php
include('../config.php');
session_start();
if(isset($_POST['updatebtn']))
{   
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    


    $sql = "UPDATE student SET fname='$fname', dob ='$dob', gender='$gender', email ='$email' WHERE id='$id' ";
     
           

 
    $selectedCategoryId = $_POST['musahidden'];
    // Perform further actions based on the selected category
    // session_start(); 
      $_SESSION['globalmusa'] =  $selectedCategoryId;
      $var_traintype = $_SESSION['globalmusa'];

   
      $fname = ltrim($fname);

      $firstname  =  strtok($fname, ' ');
      $lname  = "";
      print($firstname);


     if (($pos = strpos($fname, ' ')) !== FALSE) { 
        $lname = substr($fname, $pos+1); 
        print($lname);
    }

      //$lname 
      $org =  mysqli_real_escape_string($conn, $_POST["org"]);
      $phone =  mysqli_real_escape_string($conn, $_POST["phone"]);
      $prov =   mysqli_real_escape_string($conn, $_POST["prov"]);
      $dist =   mysqli_real_escape_string($conn, $_POST["dist"]);
      $ven =   mysqli_real_escape_string($conn, $_POST["ven"]);
      $dur =   mysqli_real_escape_string($conn, $_POST["dur"]);
      $as  =   mysqli_real_escape_string($conn, $_POST["as"]);

      $fsql = "SELECT  exid FROM exm_list  WHERE exname LIKE '".$var_traintype."'"; 

       $variable = "";
        $result = mysqli_query($conn,$fsql);

        if ($result->num_rows > 0) {
          print("We got here!");
        while ($row = $result->fetch_assoc()) {
        $variable = $row["exid"];
        

        echo("Name: " . $variable  . "<br>");
           }
        }

      //echo $var_traintype ;

      //echo($fsql);
            
 $msql = "INSERT INTO registeredtrainingmap(mapid,firstname,lastname,gender, organisation,phone,email,trainingid,province,district,venue,duration,attendee,participantid) VALUES         (NULL,'$firstname','$lname','$gender','$org','$phone','$email','$variable','$prov','$dist','$ven','$dur','$as','$id')";

   $query_run_msql = mysqli_query($conn, $msql);
   
   if ($query_run_msql) {

             // Add Connection to Update registeredtraining map table here.
               
              echo "<script>alert('Participant added to training!.');</script>";
    
               //header("Location: records.php");
        } else {
            echo "<script>alert('training update failed.');</script>";
             //header("Location: records.php");
        }


    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {

             // Add Connection to Update registeredtraining map table here.

               
              echo "<script>alert('Profile details updated!.');</script>";
    
               header("Location: records.php");
        } else {
            echo "<script>alert('Updation failed.');</script>";
             header("Location: records.php");
        }


    

// MUSA function to receive param for registeredtrainingmap object
 

   
}






?>


<?php

 
  
 

?>



