<?php

function getNotificationsFor($user_id){

    $db_controller = new DatabaseController();

    $query = "SELECT * FROM  user_task WHERE  user_id =$user_id";

    return $db_controller->query($query, 1);
}
function getNotification($task_id){
  $db_controller= new DatabaseController();
  $query = "SELECT * FROM  schedule_task WHERE  task_id =$task_id";

  $data =  $db_controller->query($query, 1);
  return $data[0]['task_name'];
}

