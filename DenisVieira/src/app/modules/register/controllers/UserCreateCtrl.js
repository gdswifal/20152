(function() {

	'use strict';

	angular.module('myApp.register.controllers')

	  .controller('UserCreateCtrl', ['$scope','RegisterUserSvc', function ($scope,RegisterUserSvc) {

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
	    
	  }]);

}());