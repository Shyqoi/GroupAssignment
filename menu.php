<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php
        session_start();

        if (isset($_SESSION["UserID"])) {
    ?>
    <div class="menu-container">
        <h2 class="welcome-message">Welcome, Hi <?php echo $_SESSION["UserID"]; ?></h2>
        <p>Choose your menu:</p>

        <?php
            if ($_SESSION["UserType"] == "Admin") {
        ?>
        <a href="ViewSong_Admin.php">View Song List</a><br><br>
        <a href="song_AdmineditView.php">User Status</a><br><br>
        <?php
            } else {
        ?>
        <a href="song_form.php">Register New Song</a><br><br>
        <a href="song_editView.php">Edit Song Details</a><br><br>
        <a href="song_deleteView.php">Delete Song Record</a><br><br>
        <a href="VIEWSONG.php">View Song List</a><br><br>
        <?php
            }
        ?>
        <a href="logout.php">Logout</a><br>
    </div>
    <?php
        } else {
            echo "No session exists or the session has expired. Please log in again. <br>";
            echo "<a href='login.html'>Login</a>";
        }
    ?>
</body>
</html>
