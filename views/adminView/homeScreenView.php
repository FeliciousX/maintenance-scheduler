<script type="text/javascript" src="../includes/js/angular/angular.min.js"></script>
<script type="text/javascript" src="../includes/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="../includes/js/angular/ui-calendar/calendar.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/gcal.js"></script>
<script type="text/javascript" src="../includes/js/calendar.js"></script>
<link rel="stylesheet" href="../includes/css/fullcalendar.css" />
<div ng-app="maintenenceSchedulerApp">
	<div ng-controller="CalendarCtrl">
		<p>Schedule</p></br>
		<button class="btn btn-primary"> Generate Schedule</button></br></br>
		<div class = "well">
		 
		</div>
		 <?php 
#		  	include '../controllers/scheduleController.php';
#		  	$scheduleCtrl = new scheduleController();
#		  	$scheduleCtrl->adminCalendar();
		  ?>
		</br></br>
		
		<div ui-calendar="uiConfig.calendar" class="calendar" ng-model="eventSources"></div>
		
		
		
			 <div ng-controller="TestController">    
				 <li ng-repeat="task in tasks">{{task.title}}</li>
			</div>
		<h1>ITS HERE</h1>
		<script>
		function TestController($scope, $http) {
      $http({
            url: '../controllers/scheduleController.php',
            method: "POST",
            data: {'type':'calendarAdmin'},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data, status, headers, config) {
        			console.log('DATA SUCCESS');
        			console.log(data);
        			console.log(status);
        			console.log(headers);
        			console.log(config);
                $scope.tasks = data; // assign  $scope.persons here as promise is resolved here 
            }).error(function (data, status, headers, config) {
                $scope.status = status;
                console.log('DATA FAILED');
            });

}
		</script>
	</div>
</div>


