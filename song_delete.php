<!DOCTYPE html>
<html>
    <head><title>SONG COLLECTION</title></head>
<?php
$songid =$_POST["Song_id"];
?>
<body>
    <h2>Delete member data</h2>

<?php
$host = "localhost"; 
$user = "root";
$pass = "";
$db = "song";

$conn =new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $deleteQuery="DELETE FROM song_playlist WHERE Song_id ='".$songid."' ";
    if($conn->query($deleteQuery)===TRUE){
        echo "<p style='color:blue;'> Record has been deleted from database !</p>";
        echo "Click <a href=VIEWSONG.php >here</a> to view SONG list";
    }
    else {
        echo"<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
    }
}
$conn->close();
?>
</body>
</html>