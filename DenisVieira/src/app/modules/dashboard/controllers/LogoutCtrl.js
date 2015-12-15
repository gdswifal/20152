(function() {

	'use strict';

  angular.module('simpledesk.dashboard.controllers').controller('LogoutCtrl', LogoutCtrl);

  LogoutCtrl.$inject = ['$scope','SocialAuthSvc', '$rootScope', '$location', 'APP_SETTINGS'];

  function LogoutCtrl($scope, SocialAuthSvc, $rootScope, $location, APP_SETTINGS) {

  	$scope.logout = function(){
  		SocialAuthSvc.$unauth(function(data){
  			console.log(data);
  		});
  	}

  }

}());


