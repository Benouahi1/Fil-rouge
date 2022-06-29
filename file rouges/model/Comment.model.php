<?php
    require_once 'database/db_con.php';
    class commentair{
        static public function add_cmnt($data){
            $db=Database::connect()->prepare("INSERT INTO commentaire (id ,photo , id_post , crud)
            VALUES (:id ,:photo ,:id_post , :crud)");
            $db->bindParam(':id',$data['id']);
             $db->bindParam(':photo',$data['photo']);
             $db->bindParam(':id_post',$data['id_post']);
             $db->bindParam(':crud',$data['crud']);
            echo 'hhh';
             $db->execute();
        }

        static public function getAllcmnts($data){
            $db=Database::connect()->prepare("SELECT * FROM commentaire WHERE id_post = :id_post");
            // WHERE id_post = :id_post
            $db->bindParam(':id_post',$data);

            $db->execute();
            $commentss=$db->fetchAll();
            $db=NULL;
            // print_r($commentss);
            // print_r($commentss);
            
            return $commentss;
           
        }

        static function deleteComment($data){
            $db=Database::connect()->prepare("DELETE FROM commentaire WHERE id_Com = :id_Com ");
            $db->bindParam(':id_Com',$data);
            $db->execute();
        }
    }