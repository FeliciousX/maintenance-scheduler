// Services module.
angular.module('maintenanceScheduler.services', [ ]);

// Controllers module.
angular.module('maintenanceScheduler.controllers', [ ]);

// Directives module.
angular.module('maintenanceScheduler.directives', [ ]);

// Filters module.
angular.module('maintenanceScheduler.filters', [ ]);

// Application module.
angular.module('maintenanceScheduler', [
  'maintenanceScheduler.services',
  'maintenanceScheduler.controllers',
  'maintenanceScheduler.directives',
  'maintenanceScheduler.filters',
  'restangular' 
])

  // Application configuration.
  .config(function (RestangularProvider, $httpProvider, $routeProvider) {

    // API base URL.
    RestangularProvider.setBaseUrl('/api/');

    // Enable CORS.
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];

    // Application routes.
    $routeProvider

      .when('/', {
        controller  : 'MainCtrl as main',
        templateUrl : 'templates/views/main.html'
      })
      
      .otherwise({
        redirectTo : '/'
      })
  })

  // Application runtime configuration and events.
  .run(function ($rootScope) {

    // Show loading message on route change start.
    $rootScope.$on('$routeChangeStart', function (event, next, current) {
      $rootScope.showLoader = true;
    });

    // Hide loading message on route change success.
    $rootScope.$on('$routeChangeSuccess', function (e, current, previous) {
      $rootScope.showLoader = false;
    });
  });
