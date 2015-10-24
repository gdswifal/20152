(function() {

    'use strict';

    angular.module('simpledesk.login.controllers',[]);
    angular.module('simpledesk.login.services',[]);
    // angular.module('simpledesk.login.filters',[]);
    // angular.module('simpledesk.login.directives',[]);

    angular.module('simpledesk.login', [
      'simpledesk.login.controllers',
      'simpledesk.login.services',
      // 'simpledesk.login.filters',
      // 'simpledesk.login.directives',
      'ui.router'
    ])

    .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

      var modulePath = 'app/modules/login/view/';

      $stateProvider
        .state('login', {
          url: '/login',
          templateUrl: modulePath+'index.html',
          controller: 'LoginRetrieveCtrl'
        });


    }]);

}());