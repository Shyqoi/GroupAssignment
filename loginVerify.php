<?php

$userID = $_POST['UserID'];
$userPWD = $_POST['UserPwd'];
//declare DB connection variables
$host = "localhost";
$user = "root";
$pass = ""; // please write password if any
$db = "song";// please write your DB name that you have

//create connections with DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { //to check if DB connection IS NOT OK
 die("Connection failed: " . $conn->connect_error); // display MySQL

}
else
{
 //connect successfully
 //check userID is exist
 $queryCheck = "SELECT * FROM users WHERE UserID = '".$userID."' AND Status = 'Active'";

 $resultCheck = $conn->query($queryCheck);
 if ($resultCheck->num_rows == 0) {
 echo "<p style='color:red;'>User ID does not exists or User has been BLOCKED </p>";
 echo "<br>Click <a href='login.html'> here </a> to log-in again";
 }
 else
 {
 $row = $resultCheck->fetch_assoc();

 // check if password database = password user enter
 if( $row["UserPwd"] == $userPWD )
 {
    //calling the session_start() is compulsory
 session_start();
 //asign userid & usertype value to session variable
 $_SESSION["UserID"] = $userID ;
 $_SESSION["UserType"] = $row["UserType"];

 //redirect to file menu.php upon successful login
header("Location:menu.php");
 } else { //if password not matched
 
 echo "<p style='color:red;'> Wrong password!!! </p>";
 echo "Click <a href='login.html'> here </a> to login again ";
 }
 }
}
$conn->close();
?>