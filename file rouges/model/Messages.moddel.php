<?php

require_once 'database/db_con.php';
class Msg
{
    static public function Addmessages(array $message)
    {
        $db = Database::connect()->prepare('INSERT INTO messages(outgoing , incoming , messages) 
        VALUES(:outgoing ,:incoming ,:messages)');
        $db->bindParam(':outgoing', $message['outgoing']);
        $db->bindParam(':incoming', $message['incoming']);
        $db->bindParam(':messages', $message['messages']);
        $db->execute();
    }

    static public function GetUser($id)
    {   
        $id = $id;
        $db = Database::connect()->prepare("SELECT * FROM users WHERE id = $id ");
        $db->execute();
        $user = $db->fetchAll();
        $db = NULL;
        return $user;
    }

    static public function GetMessages($id1, $id2)
    {
        $id1 = $id1;
        $id2 = $id2;
        $db = Database::connect()->prepare("SELECT * FROM messages WHERE outgoing = $id1 AND incoming = $id2 OR outgoing = $id2 AND incoming = $id1");
        $db->execute();
        $message = $db->fetchAll();
        $db = NULL;

        return $message;
    }
}
