<?php 

  /**
  * 
  */
  class scheduleController
  {
    
    function addScheduleTask($taskname, $taskDesc, $taskDue, $invMps){
      if(!isset($_SESSION)){
          session_start();
      }
      $task_assigned= date('Y-m-d H:i:s');


      $_SESSION['schedule']['last_id'] = intval($_SESSION['schedule']['last_id']) + 1;

      $data = array(
        'task_id' => $_SESSION['schedule']['last_id'],
        'task_name' => $taskname,
        'task_description'  => $taskDesc,
        'task_assigned' => $task_assigned,
        'task_due'  => $taskDue,
        'involved_mp' => $invMps,
        'new_task' => 'true'
       );
      array_push( $_SESSION['schedule_task'], $data);
      
    }
    

    function getSchduleList(){

      if(!isset($_SESSION)){
          session_start();
        }
      if(isset($_SESSION['schedule_task'])){
        return $_SESSION['schedule_task'];
      }else{
        $db_controller = new DatabaseController();
        return $db_controller->getScheduleTaskList();
      }
    }

    function editSchedule(){
      $task_id = $_POST['task_id'];

      if(!isset($_SESSION)){
          session_start();
        }
      if(isset($_SESSION['schedule_task'])){
        $data = $_SESSION['schedule_task'];

        for ($i=0; $i < sizeof($data); $i++) { 
          if($data[$i]['task_id'] == $task_id){
            $_SESSION['schedule_task'][$i]['task_id'] =$task_id ;
            $_SESSION['schedule_task'][$i]['task_name'] = $_POST['task_name'];
            $_SESSION['schedule_task'][$i]['task_description']  = $_POST['task_description'];
            $_SESSION['schedule_task'][$i]['task_assigned'] = $_POST['task_assigned'];
            $_SESSION['schedule_task'][$i]['task_due']  = $_POST['task_due'];
            $_SESSION['schedule_task'][$i]['involved_mp'] = $_POST['involved_mp'];

            if (isset($_POST['task_done'])) {
              $_SESSION['schedule_task'][$i]['task_done'] = $_POST['task_done'];
            }
            if (isset($_POST['feedback_msg_id'])) {
              $_SESSION['schedule_task'][$i]['feedback_msg_id'] = $_POST['feedback_msg_id'];
            }

          }          
        }

        header("Location: ../views/adminView.php?editScheduleTask=1");
      }else{

        header("Location: ../views/adminView.php?editScheduleTask=0");
      }

    }
  }



/*=====================================

              Main Function

=======================================*/

if(!empty($_POST)){
    $type = $_POST['type'];
    $scheduleCtrl = new scheduleController();

    switch ($type) {
      case 'add':
        $name = $_POST['name'];
        $date = $_POST['date'];
        $personnel = $_POST['personnel'];
        $desc = $_POST['desc'];


        $scheduleCtrl->addScheduleTask($name, $desc, $date, $personnel );
        header("Location: ../views/adminView.php?addScheduleTask=1");
        break;

      case 'edit':
        echo json_encode($_POST);
        $scheduleCtrl->editSchedule();
        break;

      case 'remove':
        break;

    }
}
if(!empty($_GET)){
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_GET['removeSchedule'])){
    $task_id = $_GET['removeSchedule'];

    for ($i=0; $i < sizeof($_SESSION['schedule_task']); $i++) { 
      if($_SESSION['schedule_task'][$i]['task_id'] == $task_id){
        unset($_SESSION['schedule_task'][$i]);
        break;
      }
    }

    header("Location: ../views/adminView.php?removeScheduleTask=1");
  }
}


