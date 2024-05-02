<?php
require_once("../../assets/php/connection.php");
session_start();

// Fetch data from the services table

$home_page_result = mysqli_query($conn,"SELECT * from home_page");
$home_page = mysqli_fetch_assoc($home_page_result);
echo $home_page["service_qt"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="../../assets/php/Images/<?php echo $home_page["logo"]?>"/>
    <form action="">
        <input type="text" value="<?php echo $home_page["service_qt"]?>"/>
    </form>
</body>
</html>