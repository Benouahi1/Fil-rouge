<?php    


include_once '../controller/users.controller.php'; 
include_once '../controller/Profil.controller.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Amis/Amis.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>

    <?php include './Nav.php';
?>

    <h3> ChatMaroc </h3>
    <img class="img-L" src="../images/logo-removebg-preview.png" alt="">

    <div class="gree">
        <?php foreach ($user as $item) :?>
        <div class="profil">
            <div class="images">
                <img class="img" src="../photo/<?php echo $item['image'] ?>" alt="">
            </div>
            <div class="Nome">
                <p> <?php echo $item['Nom'].' '.$item['Prenom']; ?> </p>
                <div class="Activ">
                    <p>Active</p>
                    <div class="enligne1">

                    </div>
                </div>

            </div>
        </div>
        <?php
        endforeach; ?>

        <div class="list">
            <?php foreach ($new_user as $users) :?>
            <?php if($users['id']!= $_SESSION['id']) :?>
            <div class="amis">
                <div class="C">
                    <div class="images">
                        <img class="img1" src="../photo/<?php echo $users['image'] ?>" alt="">
                    </div>
                    <div class="N">
                        <p><?php echo $users['Nom'].' '.$users['Prenom']; ?></p>
                    </div>
                    <div>
                        <a href="Messages.php?id=<?php echo $users['id'] ?>">
                            <img class="p-m" src="../images/images.png" alt="">

                        </a>

                    </div>
                    <?php if($users['status']== 'online') : ?>
                    <div class="enligne">

                    </div>
                    <?php else: ?>
                    <div class="offligne">

                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php
    
    endif;
endforeach; ?>
        </div>
    </div>

    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>

</body>

</html>