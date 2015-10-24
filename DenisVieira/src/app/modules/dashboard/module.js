(function() {

    'use strict';

    angular.module('simpledesk.dashboard.controllers',[]);
    // angular.module('simpledesk.dashboard.services',[]);
    // angular.module('simpledesk.dashboard.filters',[]);
    // angular.module('simpledesk.dashboard.directives',[]);

    angular.module('simpledesk.dashboard', [
      'ui.router',
      'simpledesk.dashboard.controllers'
      //'simpledesk.dashboard.services',
      // 'simpledesk.dashboard.filters',
      // 'simpledesk.dashboard.directives',

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