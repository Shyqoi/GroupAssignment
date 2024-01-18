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
            width: 400px;
            margin: auto;
        }

        label {
            color: #0066cc;
        }

        input[type="text"],
        input[type="date"] {
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

    <p style="color: blue; font-weight: bold;">Update Song details</p>

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
                <form action="song_editSave.php" name="UpdateForm" method="POST">
                    Song ID: <b><?php echo $row['Song_id']; ?></b>
                    <br><br>
                    Song Title: <input type="text" name="Song_Title" value="<?php echo $row['Song_Title']; ?>" required>
                    <br><br>
                    Song Artist: <input type="text" name="SongArtist" value="<?php echo $row['Song_Artist']; ?>" required>
                    <br><br>
                    Song Audio:  <input type="url" name="SongAudio" value="<?php echo $row['Song_Audio']; ?>" required pattern="https?://\S+" size = "50">
                    <br><br>
                    Song Genre:<?php $songgenre =$row["Song_Genre"];?>
                    <select name="Song_Genre" required>
                    <option value=""> - Please choose - </option>
                    <option value="pop" <?php if ($songgenre =="pop") echo "selected"; ?>> Pop </option>
                    <option value="rap" <?php if ($songgenre =="rap") echo "selected"; ?>> Rap </option>
                    <option value="rock" <?php if ($songgenre =="rock") echo "selected"; ?>> Rock </option>
                    <option value="jazz" <?php if ($songgenre =="jazz") echo "selected"; ?>> Jazz </option>
                    </select><br><br>

                    Song Language: <?php $songlanguage = $row ["Song_Language"]; ?>
                    <input type="radio" name="bahasa" value="english" <?php if ($songlanguage == "english") echo "checked";?>>english
                    <input type="radio" name="bahasa" value="malay" <?php if ($songlanguage == "malay") echo "checked";?>>malay
					<input type="radio" name="bahasa" value="indo" <?php if ($songlanguage == "indo") echo "checked";?>>indo
                    <input type="radio" name="bahasa" value="korea" <?php if ($songlanguage == "korea") echo "checked";?>>korea
					<input type="radio" name="bahasa" value="hindu" <?php if ($songlanguage == "hindu") echo "checked";?>>hindu
                    <br><br>
                    Release Date: <input type="date" name="ReleaseDate" value="<?php echo $row['Release_Date']; ?>" required>
                    <br><br>
                    
                    
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
