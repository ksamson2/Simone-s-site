<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  }

class Message {

  // Holds the database connection
  private $dbConnection;
  
  //----- Database connection details --/
  //-- Change these to your database values
  
  private $_dbHost = 'localhost';
  
  private $_dbUsername = 'root';
  
  private $_dbPassword = '';
  
  public $_databaseName = 'rol';
  

  /*
    Create's the connection to the database and stores it in the dbConnection
   */
  public function __construct() {
    $this->dbConnection = new mysqli($this->_dbHost, $this->_dbUsername, 
        $this->_dbPassword, $this->_databaseName);

    if ($this->dbConnection->connect_error) {
      die('Connection error.');
    }
  }

  /*
    Get the list of messages from the chat
    
   return array
   */
  public function getMessages() {
    // echo "fbmock get message"; 
    $messages = array();
$mail= $_SESSION['email' ];
 $user=$_SESSION['user_id'];
    $query = " SELECT *  FROM chat WHERE send_to='$mail'  OR user_id='$user' ";  
    // user_id='". ."' OR 
        //   `chat`.`message`,  
        //   `chat`.`sent_on`,
        //   `users`.`id`, 
        //   `users`.`username`
        // FROM `users`
        // AND  `chat`
        //   WHERE `chat`.`user_id` = `users`.`id`
        // ORDER BY `sent_on`"
    
    // Execute the query
    
    $resultObj = $this->dbConnection->query($query);
    // Fetch all the rows at once.
    while ($row = $resultObj->fetch_assoc()) {
      $messages[] = $row;
    }
    
    return $messages;
  }

  /**
   * Add a new message to the chat table
   * 
   * @param Integer $userId The user who sent the message
   * @param String $message The Actual message
   * @return bool|Integer The last inserted id of success and false on faileur
   */
  public function addMessage($userId, $message, $sendto) {
    
    // Escape the message with mysqli real escape
    $cMessage = $this->dbConnection->real_escape_string($message);
    $query = "INSERT INTO `chat`(`user_id`, `message`, `sent_on`, `send_to`)
      VALUES ('$userId', '$cMessage', CURDATE(), '$sendto')";

    $result = $this->dbConnection->query($query);
    
    if ($result !== false) {
      // Get the last inserted row id.
      $addResult = $this->dbConnection->insert_id;
    } else {
      echo $this->dbConnection->error;
    }
    
  }

}