<?php


     
session_start();
    if(isset($_SESSION['id'])){
        include_once "../model/database/config.php";
        $outgoing_id = $_SESSION['id'];
       
        $incoming_id = $_GET['id'];
        $output = "";
        $sql = "SELECT * FROM messages 
                WHERE (outgoing= {$outgoing_id} AND incoming = {$incoming_id})
                OR (outgoing = {$incoming_id} AND incoming = {$outgoing_id}) ";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing'] != $outgoing_id){
                    $output .= '<div class="chat outgoing">
                   
                    <div class="message4">
                    <p class="message3"> '. $row['messages'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">

                    <div class="message2">
                    <p class="message1">
                    '. $row['messages'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
  
    }else{
        echo 'aaa';
    }
  
  

?>