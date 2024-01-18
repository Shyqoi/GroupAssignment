<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .message-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        .logout-message {
            color: red;
        }
    </style>
</head>
<body>
    <h2>TEAM KUIH SONG'S COLLECTION</h2>

    <div class="message-container">
        <?php
            session_start();

            if (isset($_SESSION["UserID"])) {
                session_unset();
                session_destroy();
                echo "<br><p class='logout-message'>You have successfully logged out.</p>";
                echo "<br>Click <a href='login.html'>here</a> to login again.";
            } else {
                echo "No session exists or the session has expired. Please log in again.";
                echo "<br>Click <a href='login.html'>here</a> to login again.";
            }
        ?>
    </div>
</body>
</html>

