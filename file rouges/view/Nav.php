<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png"/>
    <link rel="stylesheet" href="../css/nav/Nav.css">
    <title>ChatMaroc</title>
</head>

<body>
    <nav>
        <div>
            <a href="./Home.php"><img class="lg" src="../images/logo-removebg-preview.png" alt="ChatMaroc"></a>

        </div>
        <img id="Menu" class="Menu" src="../images/Frame 1.png" alt="">
        <div class="m" id="m">
            <ul id="Nav" class="nav_links">


                <?php
                if(isset($_SESSION['Email'])) :?>
                <li><a href="./Home.php">Home</a> </li>

                <li><a href="./amis.php">Messages</a></li>

                <li><a href="./Profil.php">Profil</a></li>

                <li class="ins1"><a href="../controller/lougout.php?lougout=">Deconecte</a></li>
                <?php   else :?>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li class="ins"><a href="./login.php">s'inscription</a></li>
                <?php endif ?>


            </ul>


            <img id="Menu1" class="Menu1" src="../images/Frame 2.png" alt="">
    </nav>
    <script src="../js/Nav.js"></script>

</body>

</html>