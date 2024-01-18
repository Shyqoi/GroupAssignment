<?php
session_start();

if (isset($_SESSION["UserID"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TEAM KUIH SONG'S COLLECTION</title>
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
            width: 50%;
            margin: 20px auto;
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

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            color: #555;
        }

        .success-message {
            color: blue;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Song Registration Details</h2>
    <?php
    $songtitle = $_POST["name"];
    $songartist = $_POST["artist"];
    $songaudio = $_POST["audio"];
    $songgenre = $_POST["song_genre"];
    $songlanguage = $_POST["bahasa"];
    $releasedate = $_POST["date"];
    ?>

    <br>
    <table border="1" style="width: 50%; margin: 20px auto;">
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Song Title:</th>
        <td><b style="color: blue;"><?php echo $songtitle; ?></b></td>
    </tr>
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Song Artist:</th>
        <td><?php echo $songartist; ?></td>
    </tr>
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Song Audio:</th>
        <td><a href="<?php echo $songaudio; ?>" target="_blank" style="color: #0066cc; text-decoration: none;"><?php echo $songaudio; ?></a></td>
    </tr>
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Song Genre:</th>
        <td><?php echo $songgenre; ?></td>
    </tr>
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Song Language:</th>
        <td><?php echo $songlanguage; ?></td>
    </tr>
    <tr>
        <th style="background-color: #0066cc; color: #fff;">Release Date:</th>
        <td><?php echo $releasedate; ?></td>
    </tr>
</table>


    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "song";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryview = "INSERT INTO song_playlist (Song_Title, Song_Artist, Song_Audio, Song_Genre, Song_Language, Release_Date, Owner_Id)
        VALUES('".$songtitle."','".$songartist."','".$songaudio."','".$songgenre."','".$songlanguage."','".$releasedate."','".$_SESSION["UserID"]."')";

        if ($conn->query($queryview) === TRUE) {
            echo "<p class='success-message'>Success insert SONG data</p>";
        } else {
            echo "<p class='error-message'>Error: Invalid query " . $conn->error . "</p>";
        }
    }
    $conn->close();
    ?>

    <br>
    Click <a href="song_form.html">here</a> to enter new Song details.
    <br>
    Click <a href="viewSong.php">here</a> to view all Song details.
    <br>
    Click <a href="song_editview.php">here</a> to EDIT Song list.
</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>
