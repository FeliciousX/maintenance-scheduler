

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
  <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>
<body>


  <div class="hero-unit">
    <h2>Welcome to the Maintenance Scheduling System!</h2>
  </div>
  
    <div class="container">

      <form class="form-signin" action="../controllers/UserAccountsController.php" method="post">
        <div class="control-group">

          <?php if(!empty($_GET)){
            $failed = '<p class = "text-error"> Login Failed</p>';
              echo $failed;
            } ?>


          <label class="control-label" for="inputUsername" >Username</label>
          <div class="controls">
            <input type="text" id="inputUsername" placeholder="Username" name="username">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password" name="password">
            <input type="hidden" name="type" value="login">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>
      </form>

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