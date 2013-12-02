
 <?php
    session_start();
    if(isset($_SESSION['user'])){
      if($_SESSION['user']['rank'] == 1){

        ?>
        <html>
        <head>


        <?php include '../includes/common.inc.php';
          $db_controller = new DatabaseController();
          echo $css_narrow_page;?>



        


        </head>





        <body>          
        <div class="container-narrow">
            <div class="well">
              <p><?php echo $_SESSION['user']['job_title'];?></p>
              <form action="../controllers/UserAccountsController.php" method="post">
                <input type="hidden" name="type" value="logout">
                <input type="submit" class="btn btn-primary" value="logout" style="display: block;float: right;">
              </form>

              <?php
              echo "<p>Welcome <strong> ".$_SESSION['user']['username']."!</strong></p>";
              ?>
            </div>
              
              <?php
              if(isset($_GET['addScheduleTask'])){
                if($_GET['addScheduleTask'] == '1'){

                  echo '<div class="alert alert-success">
                          Schedule Task Successfully Added!
                        </div>';
                }else if($_GET['addScheduleTask'] == '0'){
                 echo '<div class="alert alert-error">
                          Add Schedule Task Operation Failed
                      </div>';
                    }
                  }
                if(isset($_GET['addUser'])){
                  if($_GET['addUser'] == '1'){
                    echo '<div class="alert alert-success">
                            New User Successfully Added!
                          </div>';
                }
              }
              ?>
            

            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#schedule" data-toggle="tab">Schedule Task</a></li>
              <li><a href="#useraccounts" data-toggle="tab">User Accounts</a></li>
            </ul>


            <div class="tab-content">

              <div class="tab-pane active" id="home">
                <?php include 'adminView/homeScreenView.php';?>
              </div>


              <div class="tab-pane" id="schedule">
                <?php include 'adminView/scheduleTaskView.php';?>
              </div>


              <div class="tab-pane" id="useraccounts">
                <?php include 'adminView/userAccountsView.php';?>
              </div>


            </div>
          </div>
            <script>
              $(function () {
                $('#myTab a:last').tab('show');
              })
            </script>

            <script src="../includes/bootstrap/js/bootstrap.min.js"></script>

          </body>
        </html>
<?php
      }else{
        header('Location: ../');
      }
    }else{
      header('Location: ../');
  }
      ?>
