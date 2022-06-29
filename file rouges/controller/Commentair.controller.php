<?php
require_once '../model/Comment.model.php';
class commentair_cnt{
    public function Add_comment(){
        $data = array(
            'id' => $_POST['id'],
            'photo' => $_POST['photo'],
            'crud'=>$_POST['crud'],
            'id_post'=>$_POST['id_post']
        );
        $result=commentair::add_cmnt($data);
    }

    public function getCmnt($data){
      
        // $result = commentair::getAllcmnts($data);
        return commentair::getAllcmnts($data);

        header('location:Home.php');
    }
}

if(isset($_POST['delete-C'])){
    $data = $_POST['id-C'];
   
    commentair::deleteComment($data);
    header('location:../view/Home.php');
}



if (isset($_POST['commenter'])) {
    $comment = new commentair_cnt();
    $comment->Add_comment();
    header('location:../view/Home.php');
}else{
    
}
