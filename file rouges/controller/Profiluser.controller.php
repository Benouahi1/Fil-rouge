<?php






require_once '../model/Profil.Model.php';

class Profiluser{

    public function getuserid()
    {  
       
       
        
           
        $id=$_GET['id'];
    
        return Prof::getProfil($id);
        header('location:Profil1.php');
    

    }


}



$id = new Profiluser();
$user =$id->getuserid();