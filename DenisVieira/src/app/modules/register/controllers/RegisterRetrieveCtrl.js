(function() {

	'use strict';

  angular.module('simpledesk.register.controllers').controller('RegisterRetrieveCtrl', RegisterRetrieveCtrl);

  RegisterRetrieveCtrl.$inject = ['$scope', '$rootScope', '$location', 'APP_SETTINGS'];

  function RegisterRetrieveCtrl($scope, $rootScope, $location, APP_SETTINGS) {

  	$scope.falhou = false;
  }

}());


