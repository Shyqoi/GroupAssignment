<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Song</title>
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

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
            margin-bottom: 20px; /* Added spacing between form and table */
        }

        label {
            color: #0066cc;
            display: block; /* Ensure labels are on a new line */
            margin-bottom: 8px; /* Add spacing between label and form element */
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004080;
        }
    </style>
</head>

<body>
    <h2>SONG LIST</h2>

    <p style="color: blue; font-weight: bold;">Update Song Status </p>

    <?php
    $songid = $_POST["Song_id"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "song";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryGet = "SELECT * FROM song_playlist WHERE Song_id = '$songid'";

        $resultGet = $conn->query($queryGet);

        if ($resultGet->num_rows > 0) {
            while ($row = $resultGet->fetch_assoc()) {
    ?>

                <form action="song_UsereditSave.php" name="UpdateForm" method="POST">
                    <label for="new_status">New Status for Song ID:  <td><?php echo $row["Song_id"]; ?></td></label>
                    <select name="new_status" id="new_status">
                        <option value="">Please choose</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        

                    </select>
                    <input type="hidden" name="Song_id" value="<?php echo $row['Song_id']; ?>">
                    <input type="submit" value="Update New Details">
                </form>

    <?php
            }
        }
    }
    $conn->close();
    ?>
</body>

</html>
