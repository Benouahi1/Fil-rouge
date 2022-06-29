<?php 
include_once '../controller/users.controller.php';
include_once '../controller/Postes.Controller.php';
include_once '../controller/Commentair.controller.php';
include_once '../controller/Profil.controller.php';

if(!isset($_SESSION)){
    session_start();   
}

$data = new login();
$Users = $data->getusers();


$cmnt = new commentair_cnt();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Home.css/Home.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php';

    ?>
    <div class="Home">

        <?php 
    foreach ($user as $item) :
    
    if(isset($_SESSION['Email'])) :?>
        <div class="Profil">
            <div class="Pro">
                <img class="Prfl" src="../photo/<?php echo $item['image'];?>" alt="">
            </div>
            <p class="Nom"><?php echo $item['Nom'].' '.$item['Prenom']; ?></p>
        </div>


        <br>
        <div class="Add">
            <button class="" id="Add">Ajouter Poste</button>
            <form class="From" id="Form" method="POST" action="../controller/Postes.Controller.php">

                <textarea class="poste" name="Titre" id="" cols="30" rows="10" required></textarea>
                <input type="hidden" name="Nome" value="<?php echo $item['Nom'] ?>">
                <input type="hidden" name="Photo" value="<?php echo $item['image'] ?>">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                <label for="Photo"><img class="img1" name="images" src="../images/image.png" alt="">

                    <input name="images" id="Photo" class="AZ" type="file" required>
                </label>
                <button type="submit" name="add_post" class="Btn">Public</button>
            </form>
        </div>
        <?php endif; 

      
         
          endforeach; 
         
       
        foreach ($new_posts as $new_post) :
              ?>

        <div class="P">
            <div>
                <?php 
             if(isset($_SESSION)) :
            if($new_post['id']==$_SESSION['id']) :?>
                <img class="lp" src="../images/Frame 3.png" alt="">
                <?php endif ?>
                <div class="Pr">

                    <?php
               
                if($new_post['id']==$_SESSION['id']) :?>
                    <div id="pn" class="UP">

                        <a href="add.Poste.php?id_post=<?php echo $new_post['id_post'] ?>">
                            <button class="UD" type="">Modifier</button>
                        </a>

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
                        <a href="./Profil1.php?id=<?php echo $new_post['id'] ?>">
                            <div class="Pr-1">
                                <img class="Prfl" src="../photo/<?php echo $new_post["Photo"] ?>" alt="">
                            </div>
                        </a>
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
                            <?php if($commentair['id']==$_SESSION['id'] || $new_post['id']==$_SESSION['id']){ ?>
                            <img class="LO" src="../images/Frame 3.png" alt="">
                            <?php }else{ ?>
                            <img class="LB" src="../images/Frame 4.png" alt="">
                            <?php } ?>
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
        endforeach; ?>

            <div class="Footer">
                <?php include_once "./footer.php"; ?>

            </div>


            <script src="../js/Ajouter.js"></script>
            <script src="../js/Modifier.js"></script>
            <script src="../js/Update.js"></script>
            <script src="../js/Sup.js"></script>
</body>

</html>