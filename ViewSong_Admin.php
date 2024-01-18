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
            padding: 8px;
            text-align: center;
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
    <h2>Song List</h2>
    <form action="" method="GET">
    <label for="search_query">Search:</label>
    <input type="text" id="search_query" name="search" placeholder="Enter keywords">
    <input type="submit" value="Search">
</form>
    <?php 
    $host = "localhost"; 
    $user = "root";
    $pass = "";
    $db = "song";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("FAILED" . $conn->connect_error);
    } else {

        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';        
        $queryView = "SELECT * FROM song_playlist WHERE 
                        Song_Title LIKE '%$searchTerm%' OR 
                        Song_Artist LIKE '%$searchTerm%' ";
        $resultQ = $conn->query($queryView);

        if ($resultQ->num_rows > 0) {
            ?>

            <table border="2">
                <tr>
                    <th>Song ID</th>
                    <th>Song Title</th>
                    <th>Song Artist</th>
                    <th>Song Audio</th>
                    <th>Song Genre</th>
                    <th>Song Language</th>
                    <th>Release Date</th>
                    <th>Owner ID</th>
                    <th>Song Status</th>
                </tr>

                <?php
                while ($row = $resultQ->fetch_assoc()) {
                    ?>
                    <tr>
                            <td><?php echo $row["Song_id"]; ?></td>
                            <td><?php echo $row["Song_Title"]; ?></td>
                            <td><?php echo $row["Song_Artist"]; ?></td>
                            <td><a href="<?php echo $row["Song_Audio"]; ?>" target="_blank"><?php echo $row["Song_Audio"]; ?></a></td>

                            <td><?php echo $row["Song_Genre"]; ?></td>
                            <td><?php echo $row["Song_Language"]; ?> </td>
                            <td><?php echo $row["Release_Date"]; ?></td>
                            <td><?php echo $row["Owner_Id"]; ?></td>
                            <td><?php echo $row["Song_Status"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

            <?php
        } else {
            echo "<p>No data selected</p>";
        }
        $conn->close();
    }
    ?>

    
    <br>
    Click <a href="song_UsereditView.php">here</a> to EDIT song status
    <br>
    <br>
    Click <a href="song_AdmineditView.php">here</a> to EDIT user status
    <br>
    <br>
    Click <a href="menu.php">here</a> to go to MENU page

</body>
</html>