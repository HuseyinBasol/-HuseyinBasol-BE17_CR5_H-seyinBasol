<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animal WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $location = $data['location'];
        $picture = $data['picture'];
       
        $resultSup = mysqli_query($connect, "SELECT * FROM suppliers");
        $supList = "";
        if (mysqli_num_rows($resultSup) > 0) {
            while ($row = $resultSup->fetch_array(MYSQLI_ASSOC)); 
        }
    }
}
    mysqli_close($connect);


?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Animal</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
            <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Animal Name" <?php echo $name ?> /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Age of the Animal" step="any" <?php echo $age ?> /></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location of the Animal" <?php echo $location ?> /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Short description"  <?php echo $description ?> /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Size of the Animal" <?php echo $size ?> /></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td><input class='form-control' type="text" name="vaccinated" placeholder="Is the Animal Vaccinated" <?php echo $vaccinated ?> /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Which breed is the Animal" <?php echo $breed ?>/></td>
                </tr>
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>