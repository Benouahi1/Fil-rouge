<?php require_once '../controller/users.controller.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION["id"] ?? false){
    header('location:Home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login/login.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php'?>



    <h3> ChatMaroc </h3>
    <img class="img-L" src="../images/logo-removebg-preview.png" alt="">
    <div class="container">
        <img class="img" src="../images/1_9qvLPzPTWbXTuDl08l5MEw.png" alt="">
        <div class="Erour">
            <?php
            if(isset($_POST['login'])){
                echo '<p class="ER">'.$F.'</p>';	 
            }
                ?>
        </div>
        <form method="POST">

            <div>
                <p class="P">Email</p>
                <input class="email" type="text" name="Email">
            </div>
            <div>
                <p class="P">Password</p>
                <input class="email" type="password" name="Password">
            </div>
            <div>
                <button class="but-conix" name="login" type="submit">conexion</button>
                <a href="./inscription.php">
                    <p class="inscription">Don't have account ?</p>
                </a>
            </div>

        </form>
    </div>
    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>


</body>

</html>