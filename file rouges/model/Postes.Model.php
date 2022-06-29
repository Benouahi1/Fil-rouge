<?php
    require_once 'database/db_con.php';
   

class post{
    static public function addpost($data){
        $db=Database::connect()->prepare("INSERT INTO posts(id , Photo , Nome , Titre , images )
                                        VALUES(:id , :Photo ,:Nome , :Titre , :images )");
        $db->bindParam(':id',$data['id']);
        $db->bindParam(':Photo',$data['Photo']);
        $db->bindParam(':Nome',$data['Nome']);
        $db->bindParam(':Titre',$data['Titre']);
        $db->bindParam(':images',$data['images']);
        
        $db->execute();
}
    static public function getAllPosts(){
        $db=Database::connect()->prepare("SELECT * FROM posts");
        $db->execute();
        $posts=$db->fetchAll();
        $db=NULL;
        
       
        
        return $posts;
    }
    static public function getOnePost($id){
        $db=Database::connect()->prepare("SELECT * FROM posts WHERE id_post = :id_post");
        $db->bindParam(':id_post',$id);
        $db->execute();
        $posts=$db->fetchAll();
        $db=NULL;
        
        
        
        return $posts;
    }
    static public function update_post($data_update){
        $db=Database::connect()->prepare("UPDATE posts SET Titre = :Titre , images = :images WHERE id_post = :id_post");
        $db->bindParam(':id_post',$data_update['id_post']);
        $db->bindParam(':Titre',$data_update['Titre']);
        $db->bindParam(':images',$data_update['images']);
        $db->execute();
    }

    static public function delete_post($data){
        $db=Database::connect()->prepare("DELETE FROM posts WHERE id_post = :id_post ");
        $db->bindParam(':id_post',$data);
        $db->execute();
    }
}
