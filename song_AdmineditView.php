<?php
session_start();
//check if session exists
if(isset($_SESSION["UserID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SONG</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            margin: 50px;
        }

        h2 {
            color: #0066cc;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
        }

        table, th, td {
            border: 1px solid #0066cc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0066cc;
            color: #fff;
        }

        input[type="radio"] {
            margin: 0 auto;
        }

        input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #004080;
        }
    </style>
</head>

<body>
    <h2>USER LIST</h2>

    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "song";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $queryview = "SELECT * FROM users ";
            $resultQ = $conn->query($queryview);
    ?>

    <form action="song_AdmineditDetails.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
        <table border="2">
            <tr>
                <th>Choose</th>
                <th>User ID</th>
                <th>Status</th>
                
                
            </tr>

            <?php
                if ($resultQ->num_rows > 0) {
                    while ($row = $resultQ->fetch_assoc()) {
            ?>

            <tr>
            <td><input type="radio" name="UserID" value="<?php echo $row["UserID"]; ?>" required></td>
                <td><?php echo $row["UserID"]; ?></td>
               
                <td><?php echo $row["Status"]; ?></td>
                
            </tr>

            <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>NO data selected</td></tr>";
                }
            }
            ?>
        </table>

        <?php
            $conn->close();
        ?>

        <br><br>
        <input type="submit" value="View Record to Edit">
    </form>
</body>
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>