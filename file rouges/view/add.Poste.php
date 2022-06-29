<?php   session_start();

require_once '../controller/Postes.Controller.php';



$data = new ADD_Post();
$Posts = $data->getpost();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Updat/upd.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php';


    

        foreach ($Posts as $post) :

            if($_SESSION['id']!=$post['id']){
                header('location:../view/login.php');
            }

            
    ?>

    <h3>Modifier un Poste</h3>
    <div class="Update">

        <form method="POST" action="../controller/Postes.Controller.php">
            <input type="hidden" name="id" value="<?php echo $post["id_post"]; ?>" />
            <input class="Text" type="text" name="Titre" value="<?php echo $post["Titre"] ?>">
            <label for="Photo"><img class="img1" src="../images/image.png" alt="">

                <input name="images" value="<?php echo $post["images"] ?>" id="Photo" class="AZ" type="file">
            </label>
            <button class="button" type="submit" name="update">Modifier</button>
            <img class="img2" src="../photo/<?php echo $post["images"] ?>" alt="">
        </form>
    </div>
    <?php endforeach; ?>
    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>
</body>

</html>