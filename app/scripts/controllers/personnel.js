'use strict';

angular.module('maintenenceSchedulerApp')
  .controller('PersonnelCtrl', function ($scope) {
    $scope.model = {};

    /* config object */
    $scope.uiConfig = {
      calendar:{
        height: 450,
        editable: true,
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

    $scope.model.eventSources = [

        // your event source
        // TODO: make this dynamic
        {
            events: [ // put the array in the `events` property
                {
                    title  : 'eshan',
                    start  : '2013-11-01'
                  },
                  {
                    title  : 'isaac',
                    start  : '2013-11-05',
                    end    : '2013-11-15'
                  },
                  {
                    title  : 'ISSac',
                    start  : '2013-11-09 12:30:00',
                    allDay : false
                  }
                ],
                color: 'pink',     // an option!
                textColor: 'black' // an option!
              }

        // any other event sources...

            ];
  });
