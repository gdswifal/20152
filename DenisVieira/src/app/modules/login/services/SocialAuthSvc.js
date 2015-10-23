(function() {

	'use strict';

	angular.module('myApp.login.services')

		.factory('SocialAuthSvc',['$firebaseAuth',function($firebaseAuth){

		  var endPoint = 'https://ionic-sociallogin.firebaseio.com/';
		  var usersRef = new Firebase(endPoint);

		  return $firebaseAuth(usersRef);

		}]);

}());