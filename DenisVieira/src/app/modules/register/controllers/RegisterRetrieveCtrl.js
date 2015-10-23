(function() {

	'use strict';

	angular.module('myApp.register.controllers')

	  .controller('RegisterRetrieveCtrl', ['$scope','RegisterUserSvc', function ($scope,RegisterUserSvc) {

			$scope.falhou = false;
	    
	  }]);

}());