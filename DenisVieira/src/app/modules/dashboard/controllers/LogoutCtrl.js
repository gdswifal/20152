(function() {

	'use strict';

	angular.module('myApp.dashboard.controllers')

		.controller('LogoutCtrl', ['$scope','SocialAuthSvc','$location', function ($scope,SocialAuthSvc,$location) {
			
			$scope.logout = function(){
				SocialAuthSvc.$unauth(function(data){
					console.log(data);
				});
			}

		}]);

}());