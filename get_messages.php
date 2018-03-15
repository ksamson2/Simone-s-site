<?php
require_once __DIR__ . '/core/Message.php';
include "conn.php";
$chat = new Message();
$messages = $chat->getMessages();
$chat_conversation = array();

if (!empty($messages)) {
  $chat_conversation[] = '<table>';
  foreach ($messages as $message)
   {
    $msg = htmlentities($message['message'], ENT_NOQUOTES);
    $user_name = ucfirst($message['user_id']);
    $senton = date( $message['sent_on']);
    $sendto = $message['send_to'];
        $sql="SELECT email FROM users WHERE user_id= '$user_name' ";
              $user=mysqli_query($conn,$sql);
               $row = mysqli_fetch_assoc($user);
               $mail=$row['email'];
    $chat_conversation[] = "
     <tr class='msg-row-container'>
              <td>
                <div class='msg-row'>
                  <div class='avatar'></div>
                    <div class='message'>

                              <span class='user-label'>From: {$mail } <br />  <span class='msg-time'>{$senton}</span><span class='user-label'>To: {$sendto}</span></span><br/>{$msg}
                        </div>
                    </div>
                  </td>
              </tr>";
  }
  $chat_conversation[] = '</table>';
} else {
  echo '<span>No chat messages available!</span>';
}

echo implode('', $chat_conversation);
?>