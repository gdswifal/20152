
(function() {

	'use strict';

	angular.module('myApp.login.controllers')

		.controller('SocialLoginCtrl', ['$scope','SocialAuthSvc', function ($scope,SocialAuthSvc) {

			$scope.socialLogin = function(authMethod){

			    SocialAuthSvc.$authWithOAuthRedirect(authMethod).then(function(authData){

			    }).catch(function(error){
			      if(error.code === 'TRANSPORT_UNAVAILABLE'){
			        
			        SocialAuthSvc.$authWithOAuthPopup(authMethod).then(function(authData){

			        })

			      }else{
			        console.log(error);
			      }

			    })
		  	}

		}]);

}());