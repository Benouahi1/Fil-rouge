<?php

require_once '../model/Messages.moddel.php';
require_once '../model/database/config.php ';

$db = Database::connect();

$incoming = mysqli_real_escape_string($conn, $_POST['incoming']);
$outgoing = mysqli_real_escape_string($conn, $_POST['outgoing']);
$msg = mysqli_real_escape_string($conn, $_POST['message']);

class Mes
{

    public function message($incoming, $msg, $outgoing)
    {
        $messages = array(
            'outgoing' => $outgoing,
            'incoming' => $incoming,
            'messages' => $msg,
        );
        try {
            Msg::Addmessages($messages);
            $newMessages = Msg::Getmessages($incoming, $outgoing);
            header('Content-Type: application/json');
            echo (json_encode($newMessages));
        } catch (Throwable $e) {
            http_response_code(400);
            echo (json_encode($e->getMessage()));
        }
        die();
    }
}



$message = new Mes();
$message->message($incoming, $msg, $outgoing);
