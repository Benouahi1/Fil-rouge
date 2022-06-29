<?php
    require_once '../model/user.model.php';
    
        session_start();
    
    class lougout {
        public function  lougout($id) {

            $statusOffline = "Offline";
            $data=array(
                    'id' => $id,
                    'status' => $statusOffline,
            );
            $result=user::lougout($data);
    }
}
if (isset($_GET['lougout'])) {
   
    
    $id = $_SESSION['id'];
    $lougout = new lougout();
        $info = $lougout->lougout($id);
    header('location:../view/login.php');
}
    
    
    
    ?>
    



    