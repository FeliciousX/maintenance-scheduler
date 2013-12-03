<script type="text/javascript" src="../includes/js/angular/angular.min.js"></script>
<script type="text/javascript" src="../includes/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="../includes/js/angular/ui-calendar/calendar.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="../includes/js/angular/fullcalendar/gcal.js"></script>
<script type="text/javascript" src="../includes/js/calendar.js"></script>
<link rel="stylesheet" href="../includes/css/fullcalendar.css" />
<link rel="stylesheet" href="../includes/css/calendar.css" />
<div ng-app="maintenenceSchedulerApp">
	<div ng-controller="CalendarCtrl">
	<br/>
		<button class="btn btn-primary"> Generate Schedule</button></br></br>
		<div class = "well">
		  <h2>FILTERS</h2>
		  <select name="sys" id="sys" ng-model="filter.sys" ng-change="filterSys()">
		  	<option value="MM">2DC</option>
		  	<option value="2MC">2MC</option>
		  	<option value="2WM">2WM</option>
		  	<option value="2WC">2WC</option>
		  	<option value="MC">MC</option>
		  	<option value="3MC">3MC</option>
		  	<option value="6MC">6MC</option>
		  	<option value="6MC">6MC</option>
		  	<option value="6MC">6MC</option>
		  	<option value="8MC">8MC</option>
		  	<option value="DM">DM</option>
		  	<option value="6ML">6ML</option>
		  	<option value="2DM">2DM</option>
		  	<option value="2YM">2YM</option>
		  	<option value="3MM">3MM</option>
		  	<option value="3YM">3YM</option>
		  	<option value="4MM">4MM</option>
		  	<option value="4YM">4YM</option>
		  	<option value="5YM">5YM</option>
		  	<option value="6MM">6MM</option>
		  	<option value="8MM">8MM</option>
		  	<option value="9MM">9MM</option>
		  	<option value="2MM">2MM</option>
		  	<option value="15MM">15MM</option>
		  	<option value="18MC">18MC</option>
		  	<option value="MM">MM</option>
		  	<option value="WC">WC</option>
		  	<option value="WM">WM</option>
		  	<option value="YC">YC</option>
		  	<option value="2YC">2YC</option>
		  	<option value="YM">YM</option>
		  	<option value="TBA">TBA</option>
		  	<option value="15ML">15ML</option>
		  </select>
		</div>
		</br></br>
		<div class="alert-success calAlert" ng-show="alertMessage != undefined && alertMessage != ''">
        <h4>{{alertMessage}}</h4>
    </div>
		<div ui-calendar="uiConfig.calendar" class="calendar" ng-model="eventSources "></div>
		<!--I SORTED EVERYTHING HERE NOW CAN CAN-->
		<table>
			<tr ng-repeat="event in events | orderBy:'sys'">
				<td>{{event.title}}</td>
			</tr>
		</table>
	</div>
</div>
