<?php
session_start();



require_once '../model/user.model.php';
class login
{
    public function sign_up()
    {



        if (isset($_POST['submit'])) {
            $status = 'offline';
            $data = array(
                'Prenom' => $_POST['Prenom'],
                'Nom' => $_POST['Nom'],
                'Num' => $_POST['Num'],
                'Date' => $_POST['Date'],
                'Nationalite' => $_POST['Nationalite'],
                'Email' => $_POST['Email'],
                'Password' => password_hash($_POST['Password'], PASSWORD_BCRYPT),
                'image' => $_POST['image'],
                // 'status'=> $_POST['status'],

            );
            $result = user::add_user($data);

            header('location:login.php');
        }
    }






    public function getusers()
    {
        return user::getAllUsers();
        header('location:Home.php');
    }

    public function login()
    {
        // echo 'login';

        if (isset($_POST['login'])) {

            	
            $Email = $_POST['Email'];
            $result = user::get_user($Email);
            if ($result && $result->Email === $_POST['Email']) {

                if(password_verify($_POST['Password'], $result->Password)){
                session_start();
                $F='';
                $_SESSION['Email'] = $result->Email;
                $_SESSION['id'] = $result->id;
                $_SESSION['Nom'] = $result->Nom;
                $_SESSION['picture'] = $result->image;
                $status1 = 'online';
                $data_update = array(
                    'id' => $_SESSION['id'],
                    'status' => $status1,
                );
                $result = user::update_user($data_update);
                header('location:Home.php');
            }
            }
        }
    
      }
    }


$data = new Login();
$new_user = $data->getusers();




if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $result = user::get_user($Email);


    if ($result && $result->Email === $_POST['Email']) {
        $z = 'Gmail Existe déjà';
    } else {

        if ($_POST['Password'] == $_POST['ConPassword']) {
            $new_user = new login();
            $new_user->sign_up();
        } else {
            $z = 'Mote Passe son correct';
        }
    }
}

if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $result = user::get_user($Email);
    if ($result && $result->Email === $_POST['Email']) {
        if (password_verify($_POST['Password'], $result->Password)){
            $user = new login();
            $user->login();
                }else{
                    $F = 'Mote Passe son correct';
                }
        
    } else { 
        $F = 'Email né pas excute';
    }
}