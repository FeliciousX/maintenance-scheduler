<?php
//2SuKrqxETJdQhQG2

/**
* 
*/
class DatabaseController
{
  
  function __construct()
  {
    include('../includes/database.config.inc.php');
  }


  function getScheduleTaskList(){
    $query = 'SELECT * FROM  schedule_task';
    return $this->query($query);
  }
  function getUserAccountList(){
    $query = 'SELECT * FROM  user_account'; 
    return $this->query($query);
  }
  function fetchNotification(){
    $query = 'SELECT * FROM  notification'; 
    return $this->query($query);
  }/*
    Add Schedule Task
  */
  function addScheduleTask($taskName, $taskDesc, $taskDue, $inv_mp, $task_assigned ){
    

    $query = 'INSERT INTO schedule_task(task_name, task_description, task_assigned, task_due, involved_mp) VALUES (' .
     "'$taskName'" .', '."'$taskDesc'" .', '."'$task_assigned'" .', '."'$taskDue'" .', '."'$inv_mp'" . ')';
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);

  }
 
 //Add User

  function addUserAccount($username,$password,$rank,$email,$job_title){
    $password = md5($password);
    $query = 'INSERT INTO user_account ( username ,  user_password ,  rank ,  email ,  job_title ) '.
    'VALUES ('."'$username',"."'$password',"."$rank,"."'$email',"."'$job_title'".')';

    $this->putTag('p', $query);
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);
  }

  // Add Notification

  function addNotification($subject, $description, $link, $userid, $taskid, $notifid){
    $query = 'INSERT INTO  notification ( subject ,  description , link ) VALUES '.
    "('$subject','$description','$link')";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);

    //Notify Users Part

    $query = 'INSERT INTO user_task(user_id, task_id, notification_id) VALUES '.
    "('$userid','$taskid','$notifid')";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);

  }
    //Remove Schedule

  function removeSchedule($id){

    $query = "DELETE FROM schedule_task WHERE task_id = $id";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);


  }

  //Remove user account
  function removeUser($id){
    $query = "DELETE FROM user_account WHERE user_id = $id";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);
  }

  //Remove Notification
  function removeNotification($id){
    $query = "DELETE FROM notification WHERE notification_id = $id";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);
  }

  function removeUserTask($id){
    $query = "DELETE FROM user_task WHERE user_task_id = $id";

    $this->putTag('p', $query, 'text-info');
    echo $this->putTag('blockquote', $query);
    echo $this->query($query, 0);
  }

  //To Test wheather the Database works

  function testDatabse(){
    $query = "show tables";
    $data =  ($this->query($query));
    $output = '';
    $out1;

    foreach ($data as $key => $value) {
      $out1 = $this->putTag('h1', 'Table Name : ' . htmlentities(($value['Tables_in_ms']))) . '</br>';
      foreach ($value as $key => $val) {
        $out1 .= $this->putTag('p', htmlentities(($val)), 'text-info') . '</br>';
        $some = (($this->query('SELECT * FROM ' . $val)));
        $ded = '';
        $de = '';
        foreach ($some as  $v) {
          foreach ($v as $t => $f) {
            $de .= $t. ' :  ' .$f . '</br>';
          }
          $ded .= $this->putTag('div', $de, 'well well-small');
          $de = '';
        }

        $out1 .= $this->putTag('div',$ded, 'text-error'). '</br>';
        
      }
      $output .= $this->putTag('div', $out1, 'well well-large');
    }
    echo ($output);
  }



// Test Database Output function

  function isAssociativeArray($array){
    if (array_keys($array) !== range(0, count($array) - 1)) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function putTag($tag, $str, $class=null){
    $out = '';
    if($class === null){
      return '<'. $tag . '>' . $str . '</'. $tag . '>';
    }
    else{
      $out = "<". $tag . ' class = "'. $class .'">' . $str . '</'. $tag . '>';
      return $out;
    }
  }

//Query Function to submit queries to the database

   function query($q, $fetch=1){

    include('../includes/database.config.inc.php');

    try{

      $stmt = $db->prepare($q);
      $result = $stmt->execute();

    }catch(PDOException $e){

      $response['success'] = 0;
      $response['message'] = 'Database Error. Please Try Again later';
      $response['error'] = $e;

      die(json_encode($response)); 
    }


  if($fetch === 1){  
    try{
        $result = $stmt->fetchAll();
      }catch(Exception $e){
        echo $this->putTag('well', $this->putTag('p', json_encode($e), 'text-error'));
        $result = $stmt->fetch(); 
      }
  }

    return $result;
  }

}
