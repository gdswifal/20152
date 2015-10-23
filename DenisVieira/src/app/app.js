(function() {

  angular.module('myApp', [

    // App Components

    // App Modules
    'myApp.login',
    'myApp.dashboard',
    'myApp.register',

    // External Dependencies
    'firebase',
    'ui.router'
  ])
  .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

  }]);



}());