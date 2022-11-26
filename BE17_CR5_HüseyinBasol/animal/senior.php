<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';

if (isset($_SESSION['adm'])) {
    header('Location: ../dashboard.php');
    exit;
}
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$animal_query = "SELECT * FROM animal WHERE age > 8";
$animal_result = mysqli_query($connect, $animal_query);
$tbody = '';

if (mysqli_num_rows($animal_result)  > 0) {
    while ($row = mysqli_fetch_array($animal_result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
       <div>
        <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
        <td><a href='./details.php?id=". $row['id']. "' class='btn btn-primary'>Details</a>
    
        </div>";
      
    };
}
else{
    $tbody = "No animals available";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="height: 100px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            </a>

            <div class="navbar-nav">
                <a class=" btn btn-primary ms-1" href="../home.php">Back</a>
                <a class="btn btn-primary ms-1" href="../logout.php?logout">Log Out</a>
            </div>

        </div>
    </nav>

    <div class="manageProduct w-25 mt-5">
        <h1 class="text-center">Seniors</h1>
        <div class="container text-center mt-5 mb-5">
            <div >
            <?= $tbody; ?>
            </div>
        </div>
    </div>

</body>

</html>