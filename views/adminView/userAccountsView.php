<?php

?>
<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->



  <ul class="nav nav-tabs">
    <li class="active"><a href="#create_user" data-toggle="tab">Create New User Account</a></li>
    <li><a href="#view_user" data-toggle="tab">View User Accounts</a></li>
  </ul>





  <div class="tab-content">










    <!-- Create New User Account -->



    <div class="tab-pane active" id="create_user">
      <form action="../controllers/UserAccountsController.php" method="post">
        <fieldset>
          <legend>Create New User Account</legend>

          <label>Username</label>
          <input type="text" placeholder="Enter Username" name="username">

          <label>Password</label>
          <input type="text" placeholder="Enter a password" name="password">


          <label>Rank</label>
          <input type="text" placeholder="Enter a rank" name="rank">

          <label>E-mail</label>
          <input type="text" placeholder="Enter email" name="email">

          <label>Job Title</label>
          <input type="text" placeholder="Enter Job Title" name="job_title">

          <input type="hidden" name="type" value="add">

          <span class="help-block">Please fill in all the required information</span>
          <button type="submit" class="btn">Submit</button>
        </fieldset>
      </form>
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