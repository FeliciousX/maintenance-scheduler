<script type="text/javascript" src="../includes/js/angular/angular.min.js"></script>
<script type="text/javascript" src="../includes/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="../includes/js/angular/ui-calendar/calendar.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/gcal.js"></script>
<script type="text/javascript" src="../includes/js/calendarP.js"></script>
<link rel="stylesheet" href="../includes/css/fullcalendar.css" />
<div ng-app="maintenenceSchedulerApp">
	<div ng-controller="CalendarCtrl">
		</br></br>

		<div ui-calendar="uiConfig.calendar" class="calendar" ng-model="eventSources"></div>
	</div>
</div>


