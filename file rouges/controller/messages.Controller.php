<?php
require_once '../model/Messages.moddel.php';

class Messages{

   
    public function getUser(){
        $id=$_GET['id'];
        return Msg::GetUser($id);
    }


    public function getMessages(){
        
            $id1 = $_GET['id'];
            $id2 = $_SESSION['id'];
        

        return Msg::GetMessages($id1,$id2);

    }

}





$user = new Messages();
$user1 =$user->getUser();


$messages = new Messages();
$message = $messages->getMessages();