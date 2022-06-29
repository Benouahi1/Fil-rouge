<?php   
session_start();
include_once '../controller/Profil.controller.php';



$id = new Profil();
$user =$id->getuser();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Updat/upd.css">
    <link rel="stylesheet" href="../css/ADDP/ADD.css">
    <link rel="icon" type="image/png" href="../images/logo-removebg-preview.png" />
    <title>ChatMaroc</title>
</head>

<body>
    <?php include './Nav.php';


    

foreach ($user as $item) :



     
            
    ?>

    <h3>Modifier un Profile</h3>
    <div class="UPDATE">
        <form class="UP" method="POST" action="">
            <label class="Photo" for="Photo"><img class="img1" src="../photo/<?php echo $item["image"]; ?>" alt="">

                <input name="image" id="Photo" value="<?php echo $item["image"]; ?>" class="AZ" type="file" required>
            </label>
            <div class="form-group">
                <div>
                    <p>Nom</p>
                    <input type="text" name="name" value="<?php echo $item['Nom']; ?>">
                </div>
                <div>
                    <p>Prenom</p>
                    <input type="text" name="Prenom" value="<?php echo $item['Prenom']; ?>">
                </div>
            </div>
            <div class="form-group num">
                <div>
                    <p>Num</p>
                    <input type="Number" name="Num" value="0<?php echo $item['Num']; ?>">
                </div>
                <div class="Date">
                    <p>Date De Nassance</p>
                    <input type="Date" class="D" name="Date" value="<?php echo $item['Date']; ?>">
                </div>

            </div>
            <div class="form-group">
                <div>
                    <p>Gmail</p>
                    <input type="text" name="Email" value="<?php echo $item['Email']; ?>">
                </div>
                <div>
                    <p>Nationalite</p>

                    <select class="F" name="Nationalite" class="email" required>
                        <option class="p" value="Maroc">Maroc</option>
                        <option class="p" value="Algere">Algere</option>
                        <option class="p" value="France">France</option>
                        <option class="p" value="American">American</option>
                        <option class="p" value="Germani">Germani</option>
                    </select>
                </div>
            </div>
            <div class="B">
                <button type="submit" name="R">Modifier</button>
            </div>
        </form>
    </div>

    <?php endforeach; ?>
    <div class="Footer">
        <?php include_once "./footer.php"; ?>
    </div>
</body>

</html>