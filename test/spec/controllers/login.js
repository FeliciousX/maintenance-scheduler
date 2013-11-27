'use strict';

describe('Controller: LoginCtrl', function () {

  // load the controller's module
  beforeEach(module('maintenenceSchedulerApp'));

  var LoginCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    LoginCtrl = $controller('LoginCtrl', {
      $scope: scope
    });
  }));

  it('should attach a list of events to the scope', function () {
    expect(scope.model.eventSources.length).toBe(1);
  });
});
