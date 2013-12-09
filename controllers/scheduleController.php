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
				'task_description'	=> $taskDesc,
				'task_assigned' => $task_assigned,
				'task_due'	=> $taskDue,
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
			$task_id = $_GET['task_id'];

			if(!isset($_SESSION)){
					session_start();
				}
			if(isset($_SESSION['schedule_task'])){
				$data = $_SESSION['schedule_task'];

				for ($i=0; $i < sizeof($data); $i++) {
					if($data[$i]['task_id'] == $task_id){
						$_SESSION['schedule_task'][$i]['task_id'] =$task_id ;
						$_SESSION['schedule_task'][$i]['task_name'] = $_GET['task_name'];
						$_SESSION['schedule_task'][$i]['task_description']	= $_GET['task_description'];
						$_SESSION['schedule_task'][$i]['task_assigned'] = $_GET['task_assigned'];
						$_SESSION['schedule_task'][$i]['task_due']	= $_GET['task_due'];
						$_SESSION['schedule_task'][$i]['involved_mp'] = $_GET['involved_mp'];

						if (isset($_GET['task_done'])) {
							$_SESSION['schedule_task'][$i]['task_done'] = $_GET['task_done'];
						}
						if (isset($_GET['feedback_msg_id'])) {
							$_SESSION['schedule_task'][$i]['feedback_msg_id'] = $_GET['feedback_msg_id'];
						}

					}
				}

				header("Location: ../views/adminView.php?editScheduleTask=1");
			}else{

			header("Location: ../views/adminView.php?editScheduleTask=0");
		}

		}
		function adminCalendar(){
			$scheduleList = $this->getSchduleList();
			$echolist = array();
			$count = 0;
			foreach ($scheduleList as $task ){

				$taskName = $task['task_name'];
				$date = $task['task_due'];
				$list = array('title' => $taskName, 'date'=>$date);
				array_push($echolist, $list);
			}
				echo json_encode($echolist);
		}
	}



/*=====================================

							Main Function

=======================================*/
$scheduleCtrl = new scheduleController();

if(!empty($_GET)){
		$type = $_GET['type'];

		switch ($type) {
			case 'add':
				$name = $_GET['name'];
				$date = $_GET['date'];
				$personnel = $_GET['personnel'];
				$desc = $_GET['desc'];


				$scheduleCtrl->addScheduleTask($name, $desc, $date, $personnel );
				header("Location: ../views/adminView.php?addScheduleTask=1");
				break;

			case 'edit':
				echo json_encode($_GET);
				$scheduleCtrl->editSchedule();
				break;

		case 'remove':
			break;

		case 'calendarAdmin':
			$scheduleCtrl->adminCalendar();
			break;
		default:
			echo json_encode('lol');
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


