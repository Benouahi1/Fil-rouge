<?php
    require_once 'database/db_con.php';
    class user{
        static public function add_user($data){
            $db=Database::connect()->prepare('INSERT INTO users(Prenom , Nom , Num , Date , Nationalite , Email , Password, image )
                                            VALUES(:Prenom , :Nom , :Num , :Date , :Nationalite , :Email, :Password , :image )');
                $db->bindParam( ':Prenom',$data['Prenom']);
                $db->bindParam( ':Nom',$data['Nom']);
                $db->bindParam( ':Num',$data['Num']);
                $db->bindParam( ':Date',$data['Date']);
                $db->bindParam( ':Nationalite',$data['Nationalite']);
                $db->bindParam( ':Email',$data['Email']);
                $db->bindParam( ':Password',$data['Password']);
                $db->bindParam( ':image',$data['image']);
                // $db->bindParam( ':status',$data['Status']);
               

                try{
                    $db->execute();
                    header('location:login.php');
                }catch(PDOException $e){
                    if(str_contains($e->getMessage(),"Duplicate")){
                        echo "an account with this info already exists";
                    }else{
                        die($e->getMessage());
                    }
                }
        }
        static public function get_user($Email){
            $Email=$Email;
            try{
                $db=Database::connect()->prepare('SELECT * FROM users WHERE Email = :Email'); 
                $db->execute(array(':Email'=>$Email));
                $result= $db->fetch(PDO::FETCH_OBJ);
                return $result;

            }catch(PDOException $e){
                return 'error ' . $e->getMessage();
            };

        }
      
        


        static function update_user($data_update){
            $db=Database::connect()->prepare("UPDATE users SET status = :status WHERE id = :id");
            $db->bindParam(':id',$data_update['id']);
            $db->bindParam(':status',$data_update['status']);
            $db->execute();
        }
        
        
        
        static function lougout($data) {
            $db=Database::connect()->prepare("UPDATE users SET status = :status WHERE id = :id");
            $db->bindParam(':id',$data['id']);
            $db->bindParam(':status',$data['status']);
            $db->execute();
            // session_start();
            session_unset();
            session_destroy();
            // header("location: ../login.php");
        }



        static public function getAllUsers(){
            $db=Database::connect()->prepare("SELECT * FROM users");
            $db->execute();
            $Users=$db->fetchAll();
            $db=NULL;
            
           
            
            return $Users;
        }

    }

   