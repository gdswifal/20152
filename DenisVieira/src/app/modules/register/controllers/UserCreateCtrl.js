(function() {

	'use strict';

  angular.module('simpledesk.register.controllers').controller('UserCreateCtrl', UserCreateCtrl);

  UserCreateCtrl.$inject = ['$scope','RegisterUserSvc', '$rootScope', '$location', 'APP_SETTINGS'];

  function UserCreateCtrl($scope, RegisterUserSvc, $rootScope, $location, APP_SETTINGS) {

  			$scope.createUser = function() {

  		    	RegisterUserSvc.create($scope.user).then(function(data){

  		    		// console.log("Promise = "+data);

  				      //$rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
  				      //$scope.setCurrentUser(user);
  			    }, function (error) {

  			    });
  			}

  	    	$scope.alert = {
  	    		'title': 'error.code',
  	    		'detail': 'error.message'
  	    	};

  }

}());



