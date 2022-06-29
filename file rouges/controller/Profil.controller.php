<?php






require_once '../model/Profil.Model.php';

class Profil{

    public function getuser()
    {  
       
        if(isset($_SESSION['id']))
        {
        
           
        $id=$_SESSION['id'];
    
        return Prof::getProfil($id);
        header('location:Profil.php');
    }else{
        
    }

    }
    
    public function updateProfil()
    {
        $data_update = array(
            'id' => $_SESSION['id'],
            'image' => $_POST['image'],
            'Nom' => $_POST['name'],
            'Prenom' => $_POST['Prenom'],
            'Date' => $_POST['Date'],
            'Num' => $_POST['Num'],
            'Email' => $_POST['Email'],
            'Nationalite' => $_POST['Nationalite'],
        );
        $result = Prof::updateProfil($data_update);
     
        header('location:../view/Profil.php');
    }


}



$id = new Profil();
$user =$id->getuser();

if (isset($_POST['R'])) {
    $post = new Profil();
   $post->updateProfil();
   header("location:../view/Profil.php");
}