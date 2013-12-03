'use strict';

angular.module('maintenenceSchedulerApp', ['ui.calendar'])

function CalendarCtrl($scope) {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /* event source that pulls from google.com  for Malaysian Holidays */
    $scope.eventSource = {
            url: "https://www.google.com/calendar/feeds/en.malaysia%23holiday%40group.v.calendar.google.com/public/basic",
            className: 'gcal-event',           // an option!
            currentTimezone: 'Asia/Kuala_Lumpur' // an option!
    };

    /* event source that contains custom events on the scope */
    $scope.events = [
      {
        id: '2DC',
        title: 'All Day Event',
        start: new Date(y, m, 1),
        sys: '2DC',
        className: ['orange'],
        man: 2
      },
      {
        id: '2DC',
        title: 'Long Event',
        start: new Date(y, m, d - 5),
        end: new Date(y, m, d - 2),
        sys: '2DC',
        className: ['cyan'],
        man: 2
      },
      {
        id: '2MC',
        title: 'Repeating Event',
        start: new Date(y, m, d - 2, 16, 0),
        sys: '2MC',
        allDay: false,
        man: 1
      },
      {
        id: '2WM',
        title: 'Repeating Event',
        start: new Date(y, m, d + 4, 16, 0),
        sys: '2WM',
        allDay: false,
        man: 3,
      },
      {
        id: '2WM',
        title: 'Birthday Party',
        start: new Date(y, m, d + 1, 19, 0),
        end: new Date(y, m, d + 1, 22, 30),
        allDay: false,
        sys: '2WM',
        man: 2,
      },
      {
        id: '2WM',
        title: 'Click for Google',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        url: 'http://google.com/',
        sys: '2WM',
        man: 1
      }
    ];


    /* event source that calls a function on every view switch */
    $scope.eventsF = function (start, end, callback) {
      var s = new Date(start).getTime() / 1000;
      var e = new Date(end).getTime() / 1000;
      var m = new Date(start).getMonth();
      var events = [
      {
        title: 'Feed Me ' + m,
        start: s + (50000),
        end: s + (100000),
        allDay: false,
        className: ['silver']
      }
      ];
      callback(events);
    };
    /* alert on eventClick */
    $scope.alertEventOnClick = function( date, allDay, jsEvent, view ){
        $scope.$apply(function(){
          $scope.alertMessage = ('Day Clicked ' + date);
        });
    };
    /* alert on Drop */
     $scope.alertOnDrop = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view){
        $scope.$apply(function(){
          $scope.alertMessage = ('Event Droped to make dayDelta ' + dayDelta);
        });
    };
    /* alert on Resize */
    $scope.alertOnResize = function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ){
        $scope.$apply(function(){
          $scope.alertMessage = ('Event Resized to make dayDelta ' + minuteDelta);
        });
    };
    /* add and removes an event source of choice */
    $scope.addRemoveEventSource = function(sources,source) {
      var canAdd = 0;
      angular.forEach(sources,function(value, key){
        if(sources[key] === source){
          sources.splice(key,1);
          canAdd = 1;
        }
      });
      if(canAdd === 0){
        sources.push(source);
      }
    };
    /* add custom event*/
    $scope.addEvent = function() {
      $scope.events.push({
        title: 'Open Sesame',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        className: ['openSesame']
      });
    };
    /* remove event */
    $scope.remove = function(index) {
      $scope.events.splice(index,1);
    };
    /* Change View */
    $scope.changeView = function(view, calendar) {
      calendar.fullCalendar('changeView',view);
    };
    /* config object */
    $scope.uiConfig = {
      calendar:{
        height: 450,
        editable: false,
        header:{
          left: 'month basicWeek basicDay agendaWeek agendaDay',
          center: 'title',
          right: 'today prev,next'
        },
        dayClick: $scope.alertEventOnClick,
        eventDrop: $scope.alertOnDrop,
        eventResize: $scope.alertOnResize
      }
    };
    /* event sources array*/
    $scope.eventSources = [$scope.events, $scope.eventSource];

    /* For filtering purposes on change select option */
    $scope.filterSys = function () {
      var canAdd = 0;
      var i = 0;
      angular.forEach($scope.events,function(value, key){
        if($scope.events[key] === $scope.filter){
          $scope.events.splice(key,1);
          canAdd = 1;
        }
        i++;
      });
      if(canAdd === 0){
        $scope.events.push($scope.filter);
      }

      
      console.log($scope.events);
      console.log($scope.filter);
    }
}