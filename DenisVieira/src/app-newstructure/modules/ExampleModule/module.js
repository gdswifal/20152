(function() {

  'use strict';

  angular.module('appName.moduleName.controllers',[]);
  // angular.module('appName.moduleName.services',[]);
  // angular.module('appName.moduleName.filters',[]);
  // angular.module('appName.moduleName.directives',[]);



  angular.module('appName.moduleName', [
    'appName.moduleName.controllers',
    // 'appName.moduleName.services',
    // 'appName.moduleName.filters',
    // 'appName.moduleName.directives',
    'ui.router'
  ])
  .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

    var modulePath = 'app/modules/moduleName/views/';

    $stateProvider
      .state('moduleName', {
        url: '/',
        templateUrl: modulePath+'index.html',
        controller: 'moduleNameRetrieveCtrl'
      });

  }]);

}());