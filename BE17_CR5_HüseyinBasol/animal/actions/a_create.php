<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    $uploadError = '';
    $picture = file_upload($_FILES['picture'], 'animal');

    if ($animal == 'none') {
        $sql = "INSERT INTO animal (name, location, description, size, picture, age, vaccinated, breed) VALUES ('$name', '$location','$description','$size',$age, '$vaccinated', '$breed', '$picture->fileName', null)";
    } else {
    
        $sql = "INSERT INTO animal (name, location, description, size, picture, age, vaccinated, breed) VALUES ('$name', '$location','$description','$size',$age, '$vaccinated', '$breed', '$picture->fileName' $animal)";
    }

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $picture </td>
            <td> $location </td>
            <td> $description </td>
            <td> $size </td>
            <td> $age </td>
            <td> $vaccinated </td>
            <td> $breed </td>
            </tr></table><hr>";
        $uploadError = ($picture->error != 0) ? $photo->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>