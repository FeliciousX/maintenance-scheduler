
<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->



  <ul class="nav nav-tabs">
    <li class="active"><a href="#create" data-toggle="tab">Create New Schedule Task</a></li>
    <li><a href="#view" data-toggle="tab">View Schedule Tasks</a></li>
  </ul>


  <div class="tab-content">

    <!-- Create New Schedule Task -->

    <div class="tab-pane active" id="create">
    <span class="help-block">Please fill in all the required information.</span>
    <div class="container">
      <form action="../controllers/scheduleController.php" name="createTask" class="form-horizontal" role="form" method="post">
        <fieldset>
        <div class="form-group" id="formName">
          <label class="col-sm-2 control-label" for="name">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Enter Task Name" name="name" onchange="validateName()">
          </div>
        </div>
        <div class="form-group" id="formDate">
          <label class="col-sm-2 control-label" for="date">Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" placeholder="Enter Task Due Date" name="date" onchange="validateDate()">
          </div>
        </div>
        <div class="form-group" id="formPersonnel">
          <label class="col-sm-2 control-label" for="personnel">Assigned Personnel</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Enter Personnels Involved" name="personnel" onchange="validatePersonnel()">
          </div>
        </div>
        <div class="form-group" id="formDesc">
          <label class="col-sm-2 control-label" for="desc">Details</label>
          <div class="col-sm-10">
            <textarea rows="4" class="form-control" placeholder="Enter Task Details" name="desc" onchange="validateDesc()"></textarea>
          </div>
        </div>
          <input type="hidden" name="type" value="add">
          
          <div class="col-sm-5"> &nbsp; </div>
          <div class="col-sm-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block" disabled="disabled">Submit</button>
          </div>
          <div class="col-sm-3"> &nbsp; </div>
        </fieldset>
      </form>
    </div>
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
              echo '<p><strong>'.$key.'</strong>   :  <input type="text" class="form-control" value ="'. $value .'" name = "'.$key.'" readonly></p>';
            }
            echo '<input type="hidden" name = "type" value = "edit">';
            echo "<div class=\"form-actions\">
            <a class = \"btn btn-danger\" id=\"remove\" href=\"../controllers/scheduleController.php?removeSchedule=".$task['task_id']."\"> Remove </a>
            <a class = \"btn btn-primary\" id=\"edit\" onclick=\"editForm(" . $task['task_id'] . ")\"> Edit </a>
            </div></form></div></br>";
          }

        ?>
      </div>
    </div>

  </div>


</div>

<script>
var name = false, date = false, personnel = false, desc = false;

function validateName() {
  name = validate("createTask", "name", "formName");
  checkTaskSubmit();
}

function validateDate() {
  date = validate("createTask", "date", "formDate");
  if(date) {
    if(document.forms["createTask"]["date"].value.indexOf("dd")>=0 ||  document.forms["formDate"]["date"].value.indexOf("mm")>=0 || document.forms["formDate"]["date"].value.indexOf("yyyy")>=0) {
      var d = document.getElementById("formDate");
      d.className = "form-group has-Error";
      date = false;
    }
  }
  checkTaskSubmit();
}

function validatePersonnel() {
  personnel = validate("createTask", "personnel", "formPersonnel");
  checkTaskSubmit();
}

function validateDesc() {
  desc = validate("createTask", "desc", "formDesc");
  checkTaskSubmit();
}

function checkTaskSubmit() {
  if(name&&date&&personnel&&desc == true) {
    document.forms["createTask"]["submit"].disabled = false;
  }
  else {
    document.forms["createTask"]["submit"].disabled = true;
  }
}

</script>
