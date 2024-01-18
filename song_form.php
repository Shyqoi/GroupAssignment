<?php
session_start();

if (isset($_SESSION["UserID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Collection</title>
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

        p {
            color: red; /* Changed to red for consistency with the second code */
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
            color: #0066cc; /* Changed to blue for consistency with the second code */
        }

        input[type="text"],
        input[type="url"],
        select,
       
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #0066cc;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>
    <h2>Song Form</h2>
    <p><i style="color:red;">* All fields are required</i></p>
    <p>Enter Song Details:</p>
    <form name="registerform" method="post" action="song_register.php">
        Song Title: <input type="text" name="name" size="15" maxlength="15" required><br><br>
        Song Artist: <input type="text" name="artist" size="20" maxlength="20" required><br><br>
        <label for="audio">Song Audio:</label>
        <input type="url" id="audio" name="audio" placeholder="Enter the audio URL" required><br><br>
        Song Genre:
        <select name="song_genre" required>
            <option value="">-Please Choose-</option>
            <option value="pop">pop</option>
            <option value="rap">rap</option>
            <option value="rock">rock</option>
            <option value="jazz">jazz</option>
        </select><br><br>
        Song Language:
        <input type="radio" name="bahasa" value="english" checked> English
        <input type="radio" name="bahasa" value="malay"> Malay
        <input type="radio" name="bahasa" value="indo"> Indonesian
        <input type="radio" name="bahasa" value="korea"> Korean
        <input type="radio" name="bahasa" value="hindi"> Hindi
        <br><br>
        Release Date: <input type="date" name="date" required><br><br>
        <input type="submit" value="Display Song Details">
        <input type="reset" value="Cancel">
    </form>
</body>
</html>
<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'> Login </a>";
}
?>
