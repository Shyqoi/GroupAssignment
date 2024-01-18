<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Song </title>
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

<?php

$host = "localhost" ;
$user = "root" ;
$pass = "" ;
$db = "song" ;

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else
{
	$queryview = "SELECT * FROM song_playlist WHERE Song_Status = 'Approved'";
	$resultQ = $conn->query ($queryview);

?>

<h2>  SONG LIST </h2>
<table border="2">
<tr>

	<th> Song ID </th>
	<th> Song Tittle </th>
	<th> Song Artist </th>
	<th> Song Audio </th>
	<th> Song Genre </th>
	<th> Song Language </th>
	<th> Release Date </th>
	<th> Owner ID </th>
    <th>Song Status</th>
</tr>

<?php
if ($resultQ->num_rows > 0){
	while ($row = $resultQ->fetch_assoc()){
?>

<tr>
	<td> <?php echo $row ["Song_id"];?> </td>
	<td> <?php echo $row ["Song_Title"];?> </td>
	<td> <?php echo $row ["Song_Artist"];?> </td>
	<td><a href="<?php echo $row["Song_Audio"]; ?>" target="_blank"><?php echo $row["Song_Audio"]; ?></a></td>
	<td> <?php echo $row ["Song_Genre"];?> </td>
	<td> <?php echo $row ["Song_Language"];?> </td>
	<td> <?php echo $row ["Release_Date"];?> </td>
	<td> <?php echo $row ["Owner_Id"]; ?></td>
    <td> <?php echo $row ["Song_Status"]; ?></td>
</tr>

<?php
		}
	} else {
		echo "<tr><td colspan='9'> NO data selected </td></tr>";
	}
}
?>
</table>

<?php
$conn->close();
?>

<br>

Click <a href="song_form.php"> here </a> to enter new Song details.

<br>
<br>

Click <a href="song_deleteView.php"> here </a> DELETE Song list.

<br>
<br>

Click <a href="song_editView.php"> here </a> to EDIT Song list.

<br>
<br>

Click <a href="menu.php"> here </a> to MENU page.

<br><br>
</body>
</html>
