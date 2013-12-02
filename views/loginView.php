<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  if(isset($_SESSION['user'])){
    if($_SESSION['user']['rank'] == 1){
      header('Location: ../views/adminView.php');
    }else if($_SESSION['user']['rank'] == 2){
      header('Location: ../views/personnelView.php');
    }
  }
  include '../includes/common.inc.php';
  ?>
  
</head>
<body>

<div class="container">
<div class="header">
<!-- TODO: consider to have navbar or not. If yes, use directive -->
<!-- Isaac suggests NO NAVBAR for Login page -->
  <!-- <ul class="nav nav-pills pull-right">
    <li class="active"><a ng-href="#/login">Login</a></li>
    <li><a ng-href="#/personnel">Personnel</a></li>
    <li><a ng-href="#/admin">Admin</a></li>
  </ul> -->
  <h2 class="no-spacing">Maintenance Scheduling System <br/><small class="text-muted no-top-spacing">XYZ Sarawak Sdn. Bhd.</small></h2>
</div>

    <div class="container">
      <form class="form-signin form-horizontal" role="form" action="../controllers/UserAccountsController.php" method="post">
        <fieldset>
          <h2>Welcome! Please login to continue.</h2>
          <br />
          <?php if(!empty($_GET)){
            $failed = '<p class="alert alert-danger">Login Failed! Please check your login details and try again.</p>';
              echo $failed;
            } ?>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="username">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="password">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            <input type="hidden" name="type" value="login">
          </div>
        </div>
        <div class="form-group">
        <div class="row">
          <div class="col-sm-offset-2">
            <div class="col-sm-9">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
            <div class="col-sm-3">
              <button class="btn btn-link"><a href="recover_pass.php">Forgot Password?</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary btn-lg">Login</button>
          
        </div>
      </div>
    </fieldset>
      </form>

    </div>
</div>
<script>
$('#inputPassword').keypress(function (e) {
  if (e.keyCode == 13) {
    document.forms["form-signin"].submit()
  }
});
</script>


</body>
</html>

