(function() {

	'use strict';

	angular.module('simpledesk.login.services')

		.factory('SocialAuthSvc',['$firebaseAuth','APP_SETTINGS',function($firebaseAuth,APP_SETTINGS){

		  var endPoint = APP_SETTINGS.API_URL;
		  var usersRef = new Firebase(endPoint);

		  return $firebaseAuth(usersRef);

		}]);

}());