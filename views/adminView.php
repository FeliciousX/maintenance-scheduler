
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
              <p>Admin</p>
              <form action="../controllers/UserAccountsController.php" method="post">
                <input type="hidden" name="type" value="logout">
                <input type="submit" class="btn btn-primary" value="logout" style="display: block;float: right;">
              </form>

              <?php
              echo "<p>Welcome <strong> ".$_SESSION['user']['username']."</strong></p>";
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
                if(isset($_GET['editScheduleTask'])){
                  if($_GET['editScheduleTask'] == '1'){
                    echo '<div class="alert alert-success">
                            Schedule Task Saved!
                          </div>';
                  }else if($_GET['editScheduleTask'] == '0'){
                    echo '<div class="alert alert-error">
                            Schedule Task Save Failed!
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

           <script>

            function editForm(taskId){
              var content = $("#" + taskId).children();
              var inputTexts = content.children(':text');
              inputTexts.each( function(index) {
                $(this).prop('readonly', false);
              });
              content.children("#edit").text(' Save ');
              content.children("#edit").attr('onclick', 'saveForm(' + taskId + ')');
              content.children("#edit").attr('id', 'save');

            }

            function saveForm(taskId) {
              var content = $("#" + taskId).children();
              var inputTexts = content.children(':text');
              inputTexts.each( function(index) {
                $(this).prop('readonly', true);
              });

              content.children("#save").text(' Edit ');
              content.children("#save").attr('onclick', 'editForm(' + taskId + ')');
              content.children("#save").attr('id', 'edit');
              $("#" + taskId).submit();
            }

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
