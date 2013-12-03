<?php



function authenticateUser(){


  include '../controllers/DatabaseController.php';

  $db_controller = new DatabaseController();

  if(!empty($_POST['username']) && !empty($_POST['password']) ){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM  user_account WHERE  username =  '$username'AND  user_password =  '$password'";
    $data = ($db_controller->query($query, 1));
    echo $username . '</br>' . $password . '</br>' . $type;

    echo json_encode($data);

    session_start();

    if ($data[0]["rank"] == 1) {
      $_SESSION['user'] = $data[0];

      $query = "SELECT * FROM  schedule_task WHERE 1";
      $data = ($db_controller->query($query, 1));
      $id = $data[sizeof($data) - 1]['task_id'];
      $_SESSION['schedule_task'] = $data;
      $_SESSION['schedule']['last_id'] = $id; 

      header("Location: ../views/adminView.php");

    }else if($data[0]["rank"] == 2){

      $_SESSION['user'] = $data[0];
      header("Location: ../views/personnelView.php");
    }
    else{
      header("Location: ../views/loginView.php?failed=true");
    }
  }else{

    header("Location: ../views/loginView.php?failed=true");
  }
}




function addUser(){
  include '../controllers/DatabaseController.php';

  $db_controller = new DatabaseController();
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $rank = $_POST['rank'];
  $email = $_POST['email'];
  $job_title = $_POST['job_title'];

  $db_controller->addUserAccount($username,$password,$rank,$email,$job_title);
  header("Location: ../views/adminView.php?addUser=1");
}

function editUser(){
  include '../controllers/DatabaseController.php';
  $db_controller = new DatabaseController();
  
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['user_password'];
  $rank = $_POST['rank'];
  $email = $_POST['email'];
  $job_title = $_POST['job_title'];

  $query ="UPDATE user_account SET user_id='$user_id',username='$username',user_password='$password',rank='$rank',email='$email',job_title='$job_title' WHERE user_id = '$user_id'";
  $db_controller->query($query, 0);
  header("Location: ../views/adminView.php?editUser=1");
}
/*=====================================

              Main Function

=======================================*/

if(!empty($_POST)){
    $type = $_POST['type'];

    switch ($type) {
      case 'login':
        authenticateUser();
        break;

      case 'logout':
        logOut();
        break;

      case 'add':
        //AddUser
        addUser();
        break;

      case 'edit':
        //AddUser
        editUser();
        break;
      
    }
}

if(!empty($_GET)){
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_GET['removeUser'])){
    $user_id = $_GET['removeUser'];
    include '../controllers/DatabaseController.php';
    $db_controller = new DatabaseController();
    
    $db_controller->removeUser($user_id);

    header("Location: ../views/adminView.php?removeUser=1");
  }
}


function logOut(){
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_SESSION['user'])){
    session_destroy();
  }
  header('Location: ../');
}
