(function() {

	'use strict';

	angular.module('myApp.login.services')

		.factory('AuthSvc',['$firebaseAuth','$q','$location',function($firebaseAuth,$q,$location){

			var login = function(user){

				var endPoint = 'https://ionic-sociallogin.firebaseio.com/';
				var ref = new Firebase(endPoint);			

				var retorno = $q.defer();

				ref.authWithPassword({
				  email    : user.email,
				  password : user.password
				}, function(error, authData) {
				  if (error) {
				    console.log("Login Failed!", error);
				  } else {
				    console.log("Authenticated successfully with payload:", authData);
				    $location.path('/');
				    // retorno.resolve(authData);

				  }
				});		

				return retorno.promise;
			}

			return {			
				login: login
			};			



		}]);

}());