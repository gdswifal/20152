(function() {

    'use strict';

    angular.module('myApp.login.controllers',[]);
    angular.module('myApp.login.services',[]);
    // angular.module('myApp.login.filters',[]);
    // angular.module('myApp.login.directives',[]);

    angular.module('myApp.login', [
      'myApp.login.controllers',
      'myApp.login.services',
      // 'myApp.login.filters',
      // 'myApp.login.directives',
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