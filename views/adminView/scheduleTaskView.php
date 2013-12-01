<?php


?>
<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->



  <ul class="nav nav-tabs">
    <li class="active"><a href="#create" data-toggle="tab">Create New Schedule Task</a></li>
    <li><a href="#view" data-toggle="tab">View Schdule Tasks</a></li>
  </ul>





  <div class="tab-content">










    <!-- Create New Schedule Task -->



    <div class="tab-pane active" id="create">
      <form action="../controllers/scheduleController.php" method="post">
        <fieldset>
          <legend>Create Task</legend>

          <label>Name</label>
          <input type="text" placeholder="Enter Task Name" name="name">

          <label>Date</label>
          <input type="date" placeholder="Enter Task Due Date" name="date">


          <label>Assigned Personnel</label>
          <input type="text" placeholder="Enter Personnels Involved" name="personnel">

          <label>Details</label>
          <textarea rows="4" placeholder="Enter Task Details" name="desc"></textarea>
          
          <input type="hidden" name="type" value="add">
          <span class="help-block">Please fill in all the required information</span>
          <button type="submit" class="btn">Submit</button>
        </fieldset>
      </form>
    </div>


















    <!-- View Schedule Tasks -->
    <div class="tab-pane" id="view">
      <div class="scrollspy">

        <?php

          $schedule = $db_controller->getScheduleTaskList();

          foreach ($schedule as $task) {
            echo '<div class="well">';
            foreach ($task as $key => $value) {
              echo "<p><strong>$key</strong>   :  $value</p>";
            }
            echo "<div class=\"form-actions\">
            <button class = \"btn btn-danger\"> Remove </button>
            <button class = \"btn btn-primary\"> Edit </button>
            </div></div></br>";
          }


        ?>
      </div>
    </div>



  </div>




</div>