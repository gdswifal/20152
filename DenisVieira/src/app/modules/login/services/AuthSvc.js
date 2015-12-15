(function() {

	'use strict';

	angular.module('simpledesk.login.services')

		.factory('AuthSvc',['$firebaseAuth','$q','$location','APP_SETTINGS',function($firebaseAuth,$q,$location,APP_SETTINGS){

			var login = function(user){

				var endPoint = APP_SETTINGS.API_URL;
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