<?php
session_start();

// Check if session exists
if (isset($_SESSION["UserID"])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>SONG COLLECTION</title>
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
    <h2>View ALL song list</h2>
    <p>Please choose which record to update:</p>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "song";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryView = "SELECT * FROM song_playlist WHERE Owner_id = '" . $_SESSION["UserID"] . "'";
        $resultQ = $conn->query($queryView);

        ?>
        <form action="song_delete.php" method="POST" onsubmit="return confirm('Are you sure to delete this record?')">
            <table border="1">
                <tr>
                    <th>Choose</th>
                    <th>Song ID</th>
                    <th>Song Title</th>
                    <th>Song Artist</th>
                    <th>Song Audio</th>
                    <th>Song Genre</th>
                    <th>Song Language</th>
                    <th>Release Date</th>
                    <th>Song Status</th>
                    
                </tr>
                <?php
                if ($resultQ->num_rows > 0) {
                    while ($row = $resultQ->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><input type="radio" name="Song_id" value="<?php echo $row["Song_id"]; ?>" required></td>
                            <td><?php echo $row["Song_id"]; ?></td>
                            <td><?php echo $row["Song_Title"]; ?></td>
                            <td><?php echo $row["Song_Artist"]; ?></td>
                            <td><?php echo $row["Song_Audio"]; ?></td>
                            <td><?php echo $row["Song_Genre"]; ?></td>
                            <td><?php echo $row["Song_Language"]; ?> </td>
                            <td><?php echo $row["Release_Date"]; ?></td>
                            <td><?php echo $row["Song_Status"]; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8'> No Data Selected</td></tr>";
                }
                ?>
            </table>
            <?php
            $conn->close();
            ?>
            <br>
            <input type="submit" value="Delete Selected Record">
        </form>
        </body>
        </html>
        <?php
    }
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
