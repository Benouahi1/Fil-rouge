<?php
require_once 'database/db_con.php';

class Prof{


    static public function getProfil($id){
        $id=$id;
        $db=Database::connect()->prepare("SELECT * FROM users WHERE id = $id");
        $db->execute();
        $user=$db->fetchAll();
        $db=NULL;
        
       
        
        return $user;
    }
    static public function updateProfil($data_update){
        $db=Database::connect()->prepare("UPDATE users SET image = :image , Nom = :Nom , Date = :Date , Prenom = :Prenom , Email = :Email , Nationalite = :Nationalite WHERE id = :id");
        $db->bindParam(':id',$data_update['id']);
        $db->bindParam(':image',$data_update['image']);
        $db->bindParam(':Nom',$data_update['Nom']);
        $db->bindParam(':Date',$data_update['Date']);   
        $db->bindParam(':Prenom',$data_update['Prenom']); 
        $db->bindParam(':Email',$data_update['Email']);     
        $db->bindParam(':Nationalite',$data_update['Nationalite']); 

        $db->execute();

    }

}