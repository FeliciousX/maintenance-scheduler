<?php

?>
<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->


  <ul class="nav nav-tabs">
    <li class="active active-tab-2"><a href="#create_user" data-toggle="tab">Create New User Account</a></li>
    <li><a href="#view_user" data-toggle="tab">View User Accounts</a></li>
  </ul>

  <br />

  <div class="tab-content">

    <!-- Create New User Account -->

    <div class="tab-pane active" id="create_user">
    <span class="help-block">Please fill in all the required information.</span>
    <div class="container">
      <form action="../controllers/UserAccountsController.php" name="createAccount" class="form-horizontal" role="form" method="post">
        <fieldset>
          <div class="form-group" id="formUsername">
            <label class="col-sm-2 control-label" for="username">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter Username" name="username" onchange="validateUser()">
            </div>
          </div>
          <div class="form-group" id="formPassword">
            <label class="col-sm-2 control-label" for="password">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Enter a password" name="password" onchange="validatePass()">
            </div>
          </div>
          <div class="form-group" id="formEmail">
            <label class="col-sm-2 control-label" for="email">E-mail</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter email" name="email" onchange="validateEmail()">
            </div>
          </div>
          <div class="form-group" id="formJob">
            <label class="col-sm-2 control-label">Job Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter Job Title" name="job_title" onchange="validateJob()">
            </div>
          </div>
          <div class="form-group" id="formRank">
            <label class="col-sm-2 control-label" for="rank">Rank</label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" placeholder="Enter a rank" name="rank" onchange="validateRank()"> -->
              <select class="form-control" name="rank">
                <option value="1">Coordinator</option>
                <option value="2">Maintenance Personnel</option>
              </select>
            </div>
          </div>

          <input type="hidden" name="type" value="add">
          
          <div class="col-sm-5"> &nbsp; </div>
          <div class="col-sm-4">
            <button type="submit" id="submit" class="btn btn-primary btn-block" disabled="disabled">Submit</button>
          </div>
          <div class="col-sm-3"> &nbsp; </div>
        </fieldset>
      </form>
    </div>
    </div>


    <!-- View View User Accounts-->
    <div class="tab-pane" id="view_user">
      <div class="scrollspy">
        <?php
          $users = $db_controller->getUserAccountList();
          foreach ($users as $user) {
            echo '<div class="well">';
            foreach ($user as $key => $value) {
              echo "<p><strong>$key</strong>   :  $value</p>";
            }
            echo "</div></br>";
          }

        ?>
      </div>
    </div>

  </div>

</div>

<script>
var user = false, pass = false, email = false, job = false;
function validateEmail() {
  var x = document.forms["createAccount"]["email"].value;
  var atpos=x.indexOf("@");
  var dotpos=x.lastIndexOf(".");
  if (x) {
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
      var d = document.getElementById("formEmail");
      d.className = "form-group has-Error";
      email = false;
    }
    else {
      var d = document.getElementById("formEmail");
      d.className = "form-group has-Success";
      email = true;
    }
  }
  else {
    var d = document.getElementById("formEmail");
    d.className = "form-group has-Error";
    email = false;
  }
  checkSubmit();
}

function validateUser() {
  user = validate("username", "formUsername");
  checkSubmit();
}

function validatePass() {
  pass = validate("password", "formPassword");
  checkSubmit();
}

function validateJob() {
  job = validate("job_title", "formJob");
  checkSubmit();
}

function validate(field, form) {
  if(validateEmpty(document.forms["createAccount"][field].value)) {
    var d = document.getElementById(form);
    d.className = "form-group has-Success";
    return true;
  }
  else {
    var d = document.getElementById(form);
    d.className = "form-group has-Error";
    return false;
  }
}

function validateEmpty(x) {
  if (x) {
    return true;
    // Not empty
  }
  else {
    return false;
    // Empty
  }
}

function checkSubmit() {
  if(user&&pass&&email&&job == true) {
    document.getElementById("submit").disabled = false;
  }
  else {
    document.getElementById("submit").disabled = true;
  }
}
</script>