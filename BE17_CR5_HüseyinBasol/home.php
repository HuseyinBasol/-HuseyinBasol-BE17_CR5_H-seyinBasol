<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);



  
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row ['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
   
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

    </style>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
        <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
      
        
        <p class="text-white">Hi <?php echo $row['first_name']; ?></p>
        <p class="text-white"> <?php echo $row['email']; ?></p>
            <br>
            
        
    </div>
    <nav class="navbar navbar-expand-lg " style="height: 100px;">
        <div class="container-fluid">
           

            <div class="navbar-nav">
                <a class=" btn btn-primary ms-1" href="./animal/index.php?= $_SESSION['user'] ?>">All Animals</a>
                <a class=" btn btn-primary ms-1" href="./animal/senior.php">Senior Animals</a>
                <a class=" btn btn-primary ms-1" href="update.php?id=<?= $_SESSION['user'] ?>">Profile Settings</a>
                <a class="btn btn-primary ms-1" href="logout.php?logout">Log Out</a>
            </div>
        </div>
    </nav>

  
   

</body>
</html>