<?php
session_start();


include_once '../controller/messages.Controller.php';


foreach ($user1 as $user) :

    $image = $user['image'];
    $users = $user['Nom'].' '.$user['Prenom'];

endforeach;







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/message/message.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include_once "./Nav.php";  ?>



    <div class="message">
        <div class="User">
            <a href="./amis.php"><img class="Retour" src="../images/undo.png" alt=""></a>
            <div class="imag-Pr">
                <img src="../photo/<?php echo $image; ?>" alt="Photo Profile">
            </div>
            <P class="Name"><?php echo $users; ?></P>
        </div>

        <div class="allmessages">
            <?php
            foreach ($message as $message1) :
                if ($message1['outgoing'] == $_SESSION['id']) :
            ?>
            <div class="message2">
                <p class="message1"><?php echo $message1['messages'] ?></p>
            </div>

            <?php else : ?>


            <div class="message4">
                <p class="message3"><?php echo $message1['messages'] ?></p>

            </div>


            <?php
                endif;
            endforeach;
            ?>


        </div>



        <form class="typing-area" method="POST">
            <input type="hidden" name="incoming" class="incoming" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="outgoing" value="<?php echo $_SESSION['id']; ?>">
            <!-- <textarea class="input-field" name="message" id="message" placeholder="Type a message here..." rows=""
                cols="50" rows="10"></textarea> -->
            <input type="text" class="input-field" name="message" id="message" placeholder="Type a message here...">
            <button class="Envoyer" name="Env" type="Env">Envoyer</button>
        </form>
    </div>
    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>


    <script src="../js/chat.js"></script>


</body>

</html>