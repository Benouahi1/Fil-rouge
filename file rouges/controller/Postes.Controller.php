<?php


require_once '../model/postes.model.php';
class ADD_Post
{

    public function add_post()
    {
        $data = array(
            'id' => $_POST['id'],
            'Nome' => $_POST['Nome'],
            'Photo' => $_POST['Photo'],
            'Titre' => $_POST['Titre'],
            'images' => $_POST['images'],
        );
        $result = Post::addpost($data);
    }
    public function getposts()
    {
        return post::getAllPosts();
        header('location:../view/Home.php');
    }
    public function getpost()
    {
        $id = $_GET['id_post'];
        return post::getOnePost($id);
       
    }

    public function update_post()
    {
        $data_update = array(
            'id_post' => $_POST['id_post'],
            'Titre' => $_POST['Titre'],
            'images' => $_POST['images'],
        );
        $result = post::update_post($data_update);
     
        header('location:../view/Home.php');
    }
}



if (isset($_POST['delete'])) {
    $data = $_POST['Abdo'];
    post::delete_post($data);
    header('location:../view/Home.php');
}


if (isset($_POST['update'])) {
    
    $data_update = array(
        'id_post' => $_POST['id'],
        'Titre' => $_POST['Titre'],
        'images' => $_POST['images'],
    );
    $result = post::update_post($data_update);
    header("location:../view/Home.php");
}
    
    
    if (isset($_POST['ah'])) {
        $iddd = $_POST['upup'];
        $update = new Post();
        $info = $update->getOnePost($iddd);
        
    }

 
 
    if (isset($_POST['add_post'])) {
         $post = new ADD_post();
        $post->add_post();
        $data = new ADD_Post();
        $new_posts = $data->getposts(); 
        header("location:../view/Home.php");
    
    }
    $data = new ADD_Post();
    $new_posts = $data->getposts();

    
    


