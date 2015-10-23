(function() {

    'use strict';

    angular.module('myApp.dashboard.controllers',[]);
    // angular.module('myApp.dashboard.services',[]);
    // angular.module('myApp.dashboard.filters',[]);
    // angular.module('myApp.dashboard.directives',[]);

    angular.module('myApp.dashboard', [
      'ui.router',
      'myApp.dashboard.controllers'
      //'myApp.dashboard.services',
      // 'myApp.dashboard.filters',
      // 'myApp.dashboard.directives',

    ])

    .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

      var modulePath = 'app/modules/dashboard/view/';

      $stateProvider
        .state('dashboard', {
          url: '/',
          templateUrl: modulePath+'index.html',
          controller: 'DashboardRetrieveCtrl'
        });


    }]);



}());