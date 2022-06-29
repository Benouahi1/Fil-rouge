<?php  require_once '../controller/users.controller.php'; 
  if(!isset($_SESSION)){
    session_start();
}
if($_SESSION["Nom"] ?? false){
    header('location:Home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription/inscription.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php'?>
    <h3> ChatMaroc </h3>
    <img class="img-L" src="../images/logo-removebg-preview.png" alt="">

    <div class="CO">
        <div>
            <img class="img" src="../images/16245297325035_P2C4_Envoyez-des-messages-dans-le-chat-de-discussion.png"
                alt="">
        </div>
        <div class="DK">
            <form class="in" method="POST" action="">
                <div class="NO">
                    <?php if(isset($_POST['submit'])){
                echo '<p class="MP">'.$z.'<p>'; 
            }
            ?>
                    <!-- <img class="img1" src="../ges/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg" alt=""> -->
                    <div>
                        <p>Photo Profil</p>
                        <label for="Photo"><img class="img1"
                                src="../images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg"
                                alt="">

                            <input name="image" id="Photo" class="AZ" type="file" required>
                        </label>



                    </div>
                    <div class="PR">

                        <div>
                            <p>Prenom</p>
                            <input name="Prenom" class="email" type="text" required>
                        </div>
                        <div class="T">
                            <p>Nom</p>
                            <input name="Nom" class="email" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="PR">
                    <div>
                        <p>Date naisance</p>
                        <input name="Date" class="email" type="Date" max="2010-01-01" required>
                    </div>
                    <div class="T">
                        <p>Num de telephone</p>
                        <input name="Num" class="email" type="tel" size="20" minlength="8" maxlength="12" required>
                    </div>
                </div>
                <div>
                    <p>Nationalite</p>
                    <select name="Nationalite" class="email" required>
                        <option class="p" value="Maroc">Maroc</option>
                        <option class="p" value="Algere">Algere</option>
                        <option class="p" value="France">France</option>
                        <option class="p" value="American">American</option>
                        <option class="p" value="Germani">Germani</option>
                    </select>
                </div>
                <input type="hidden" name="status" value="offline">
                <div>
                    <p>Email</p>
                    <input name="Email" class="email" type="email" required>
                </div>
                <div>
                    <p>password</p>
                    <input name="Password" class="email" type="password" required>
                </div>
                <div>
                    <p>confirm password</p>
                    <input name="ConPassword" class="email" type="password" required>
                </div>
                <button class="but-conix" name="submit" type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>

    <script src="../js/signin.js">

    </script>
</body>

</html>