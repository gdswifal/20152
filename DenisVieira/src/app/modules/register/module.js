(function() {

  'use strict';

  angular.module('simpledesk.register.controllers',[]);
  angular.module('simpledesk.register.services',[]);
  // angular.module('simpledesk.register.filters',[]);
  // angular.module('simpledesk.register.directives',[]);

  angular.module('simpledesk.register', [
    'simpledesk.register.controllers',
    'simpledesk.register.services',
    // 'simpledesk.register.filters',
    // 'simpledesk.register.directives',
    'ui.router'
  ])
  .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

    var modulePath = 'app/modules/register/view/';

    $stateProvider
      .state('register', {
        url: '/register',
        templateUrl: modulePath+'index.html',
        controller: 'UserCreateCtrl'
      });

  }]);

}());