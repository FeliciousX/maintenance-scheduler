<div class="container">
<br />
<h2>Edit Account</h2>
<br />
	<form action="../controllers/UserAccountsController.php" class="form-horizontal" role="form" method="post" name="editPersonnelAccount">
		<div class="form-group" id="formUserID">
            <label class="col-sm-2 control-label" for="username">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Username" value="<?php echo $_SESSION['user']['user_id']; ?>" name="user_id" disabled="disabled">
            </div>
          </div>
		<div class="form-group" id="formUsername">
            <label class="col-sm-2 control-label" for="username">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Username" value="<?php echo $_SESSION['user']['username']; ?>" name="username" disabled="disabled">
            </div>
          </div>
          <div class="form-group" id="formPassword">
            <label class="col-sm-2 control-label" for="password">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Enter new password" name="password" onchange="editMPAcc()">
            </div>
          </div>
          <div class="form-group" id="formRePassword">
            <label class="col-sm-2 control-label" for="repassword">Re-enter Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Enter new password again" name="repassword" onchange="editMPAcc()">
            </div>
          </div>

          <input type="hidden" name="type" value="edit">
          
          <div class="col-sm-5"> &nbsp; </div>
          <div class="col-sm-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block" disabled="disabled">Submit</button>
          </div>
          <div class="col-sm-3"> &nbsp; </div>
	</form>
</div>

<script>
function editMPAcc() {
	if(document.forms["editPersonnelAccount"]["password"].value) {
		if(document.forms["editPersonnelAccount"]["repassword"].value == document.forms["editPersonnelAccount"]["password"].value) {
			document.forms["editPersonnelAccount"]["submit"].disabled = false;
			return true;
		}
	}
	document.forms["editPersonnelAccount"]["submit"].disabled = true;
}
</script>
