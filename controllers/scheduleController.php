<?php 

  /**
  * 
  */
  class scheduleController
  {
    
    function addScheduleTask($taskname, $taskDesc, $taskDue, $invMps){
      include '../controllers/DatabaseController.php';
      $db_controller = new DatabaseController();

      echo $taskname."</br>".$taskDesc."</br>".$taskDue."</br>".$invMps."</br>";
      //$db_controller->addScheduleTask( $taskname, $taskDesc, $taskDue, $invMps);
    }
  }



/*=====================================

              Main Function

=======================================*/

if(!empty($_POST)){
    $type = $_POST['type'];

    switch ($type) {
      case 'add':
        $name = $_POST['name'];
        $date = $_POST['date'];
        $personnel = $_POST['personnel'];
        $desc = $_POST['desc'];

        $scheduleCtrl = new scheduleController();

        $scheduleCtrl->addScheduleTask($name, $desc, $date, $personnel );
        header("Location: ../views/adminView.php?addScheduleTask=1");
        break;

      case 'edit':
        break;

      case 'remove':
        break;
      
    }
}


