<?php
    session_start();
    if(isset($_SESSION['user'])){
      if($_SESSION['user']['rank'] == 2){
        ?>

          <html>
            
            <head>
              <?php   include '../includes/common.inc.php';
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
                  echo "<p>Welcome <strong> ".$_SESSION['user']['username']."</strong></p>";
                  ?>
                </div>



            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#account" data-toggle="tab">Manage Account</a></li>
            </ul>


            <div class="tab-content">

              <div class="tab-pane active" id="home">
                <?php include 'personnelView/homeScreenView.php';?>
              </div>




              <div class="tab-pane" id="account">
                <?php include 'personnelView/manageAccountView.php';?>
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
  }?>

