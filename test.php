<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


require 'connect.php';

$step1 = "SELECT Confirmed_User FROM forum_members WHERE user_id = '" . $_SESSION['user_id'] . "';";

//echo $_SESSION['user_id'] .  "<br>";


/*$result1 = mysqli_query($conn, $step1);
echo "Step1";


$resultarr = mysqli_fetch_assoc($result1);
echo "Step2";
echo $resultarr;

$binary = $resultarr["Confirmed_User"];
echo "Step3";


echo ("$binary");
echo "Step4";*/

// Perform query
if ($result = mysqli_query($conn, $step1)) {
  echo "Returned rows are: " . mysqli_num_rows($result);
 // echo "<br>Result is: " . $result;
 
    $row = mysqli_fetch_assoc($result);
   echo "<br>This: " . $row["Confirmed_User"];
 
  // Free result set
  mysqli_free_result($result);
}




mysqli_close($conn);


?>