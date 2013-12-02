
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

          include '../controllers/scheduleController.php';
          $schduleController = new scheduleController();

          $schedule = $schduleController->getSchduleList();

          foreach ($schedule as $task) {

            echo '<div class="well">';
            echo '<form id="' . $task['task_id'] . '" action="../controllers/scheduleController.php" method="post">';
            foreach ($task as $key => $value) {
              echo '<p><strong>'.$key.'</strong>   :  <input type="text" value ="'. $value .'" name = "'.$key.'" readonly></p>';
            }
            echo '<input type="hidden" name = "type" value = "edit">';
            echo "<div class=\"form-actions\">
            <a class = \"btn btn-danger\" id=\"remove\"> Remove </a>
            <a class = \"btn btn-primary\" id=\"edit\" onclick=\"editForm(" . $task['task_id'] . ")\"> Edit </a>
            </div></form></div></br>";
          }

          echo json_encode($schedule);
        ?>
      </div>
    </div>



  </div>
 



</div>