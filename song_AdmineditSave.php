<?php
session_start();
// Check if session exists
if (isset($_SESSION["UserID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SONG</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            margin: 50px;
        }

        h3 {
            color: #0066cc;
        }

        p {
            color: #555;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .menu-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        .welcome-message {
            color: #0066cc;
        }
    </style>
</head>

<body>
    <div class="menu-container">
        <h3>USER UPDATE SAVE</h3>

        <?php
        $userID = $_POST["UserID"];
        $status = $_POST['Status'];
        

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "song";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $queryUpdate = "UPDATE users SET UserID = '".$userID."' , Status = '".$status."'
                        WHERE UserID = '".$userID."' ";

            if ($conn->query($queryUpdate) === TRUE) {
                echo "Success Update New Data";
                echo "<br><br>";
                echo "Click <a href='ViewSong_Admin.php'>here </a> to view the song list";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
<?php
} else {
    echo "No session exists or the session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
