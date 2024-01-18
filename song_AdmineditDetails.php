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
    $userID = $_POST["UserID"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "song";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryGet = "SELECT * FROM users WHERE UserID = '$userID'";

        $resultGet = $conn->query($queryGet);

        if ($resultGet->num_rows > 0) {
            while ($row = $resultGet->fetch_assoc()) {
    ?>
                <form action="song_AdmineditSave.php" name="UpdateForm" method="POST">
                     User ID: <b><?php echo $row['UserID']; ?></b>
                    <br><br>
                    User Status:
                    <select name="Status" required>
                    <option value="Active" <?php if ($row['Status'] == "Active") echo "selected"; ?>>Active</option>
                    <option value="Blocked" <?php if ($row['Status'] == "Blocked") echo "selected"; ?>>Blocked</option>
                    </select>
                     <br><br>

                    
                    
                    
                    
                    
        <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
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
