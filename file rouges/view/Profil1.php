<?php 
include_once '../controller/users.controller.php';
include_once '../controller/Postes.Controller.php';
include_once '../controller/Commentair.controller.php';
include_once '../controller/Profiluser.controller.php';





$cmnt = new commentair_cnt();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Home.css/Home.css">
    <link rel="stylesheet" href="../css/Profil/Profil.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php';

    ?>
    <div class="Home">

        <?php 
    foreach ($user as $item) :
        ?>
        <div class="Profil3">
            <div class="img-Pr">
                <div class="Pr2">
                    <img class="img-R" src="../photo/<?php echo $item['image'] ?>" alt="">
                </div>
                <div class="DT1">
                    <div class="B">
                        <P class="P2">Nom</P>
                        <div class="A">
                            <P><?php echo $item['Nom'].' '.$item['Prenom']; ?></P>
                        </div>
                    </div>
                    <div class="B">
                        <p class="P2">Date de naissance</p>
                        <div class="A">
                            <P><?php echo $item['Date']; ?></P>
                        </div>
                    </div>
                    <div class="B">
                        <P class="P1">Télephone</P>
                        <div class="A">
                            <P><?php echo $item['Num']; ?></P>
                        </div>
                    </div>
                    <div class="B">
                        <p class="P1">Gmail</p>
                        <div class="A">
                            <P><?php echo $item['Email']; ?></P>
                        </div>
                    </div>
                    <div class="B">
                        <P class="P1">Nationalite</P>
                        <div class="A">
                            <P><?php echo $item['Nationalite']; ?></P>
                        </div>
                    </div>
                    <div class="B">

                    </div>
                </div>
            </div>
        </div>



        <br>
        <?php
         
          endforeach; 
         
       
        foreach ($new_posts as $new_post) :
            if ($new_post['id'] == $_GET['id']) : 
              ?>

        <div class="P">
            <div>
                <?php 
             if(!isset($_SESSION)) :
            if($new_post['id']==$_SESSION['id']) :?>
                <img class="lp" src="../images/Frame 3.png" alt="">
                <?php endif ?>
                <div class="Pr">

                    <?php
               
                if($new_post['id']==$_SESSION['id']) :?>
                    <div id="pn" class="UP">

                        <form class="Update" action="">

                            <input class="UD" id="UP" type="Button" name="" value="Modifier">
                        </form>


                        <form class="Delete" method="Post" action="../controller/Postes.Controller.php"
                            onsubmit="return confirm('Are you sure ? You will not be able to go back !');">

                            <?php $id = $new_post['id_post'];?>
                            <input class="DT" type="Submit" name="delete" value="Suprimer">
                            <input type="hidden" name="Abdo" value="<?php echo $new_post["id_post"] ?>">
                        </form>


                    </div>
                    <?php endif ;
                    elseif(isset($_SESSION)):
                    ?>
                    <div class="Pr">


                        <?php endif ; ?>
                        <div class="Pr-1">
                            <img class="Prfl" src="../photo/<?php echo $new_post["Photo"] ?>" alt="">
                        </div>
                        <p class="Nom1"><?php echo $new_post["Nome"] ?></p>
                    </div>
                    <div>
                        <div>
                            <P class="Ab"><?php echo $new_post["Titre"] ?></P>
                        </div>

                        <div>
                            <img class="img2" src="../photo/<?php echo $new_post["images"] ?>" alt="">

                        </div>
                    </div>
                </div>
                <hr>
                <?php if(isset($_SESSION['Email'])) :?>
                <div class="Comment">
                    <form class="COM4" method="POST" action="../controller/Commentair.controller.php">
                        <input type="hidden" name="id_post" value="<?php echo $new_post["id_post"] ?>">
                        <input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>">
                        <input type="hidden" name="photo" value="<?php echo $_SESSION["picture"] ?>">
                        <input class="COM3" name="crud" type="text">
                        <button type="submit" name="commenter" class="Com2">Comment</button>
                    </form>
                    <?php endif ?>

                    <?php $commentairs = $cmnt->getCmnt($new_post['id_post']); ?>

                    <?php foreach ($commentairs as $commentair) : ?>
                    <div class="Pr1">
                        <div class="Pr-2">
                            <img class="Prfl" src="../photo/<?php echo $commentair["photo"]?>" alt="">
                        </div>
                        <div class="CM">
                            <p class="Nom3"> <?php echo $commentair["crud"] ?></p>

                        </div>
                        <div class="O">
                            <?php if($commentair['id']==$_SESSION['id'] || $new_post['id']==$_SESSION['id']): ?>
                            <img class="LO" src="../images/Frame 3.png" alt="">
                            <?php endif ?>
                            <div class="Su">
                                <form class="Delete" method="Post" action="../controller/Commentair.controller.php"
                                    onsubmit="return confirm('Are you sure ? You will not be able to go back !');">


                                    <input class="DT" type="Submit" name="delete-C" value="Suprimer">
                                    <input type="hidden" name="id-C" value="<?php echo $commentair["id_Com"] ?>">

                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <?php 
             endif;
        endforeach; 
   ?>


            <div class="Footer">
                <?php include_once "./footer.php"; ?>
            </div>



            <script src="../js/Ajouter.js"></script>
            <script src="../js/Modifier.js"></script>
            <script src="../js/Sup.js"></script>
</body>

</html>