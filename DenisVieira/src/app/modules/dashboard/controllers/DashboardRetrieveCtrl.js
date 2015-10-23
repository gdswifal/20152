(function() {

	'use strict';

	angular.module('myApp.dashboard.controllers')

		.controller('DashboardRetrieveCtrl', ['$scope','SocialAuthSvc','$location', function ($scope,SocialAuthSvc,$location) {

		    SocialAuthSvc.$onAuth(function(authData){
		    	console.log(authData);
			    if(authData === null){
			      console.log("Usuário não autenticado");		  
					$location.path('login');
			    }
			    else{
			      console.log("Usuário está autenticado");
			      //console.log(authData);
			    }
			    $scope.authData = authData;		    
			});

		}]);

}());