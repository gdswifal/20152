(function() {

	'use strict';

	angular.module('myApp.register.services')

		.factory('RegisterUserSvc',['$firebaseAuth','$q','$location',function($firebaseAuth,$q,$location){

			var create = function(user){

				var endPoint = 'https://ionic-sociallogin.firebaseio.com';
				var ref = new Firebase(endPoint);			

				var retorno = $q.defer();

				ref.createUser({
				  name: user.name,
				  email: user.email,
				  password: user.password
				}, function(error, authData) {
				  if (error) {
				    console.log("Error creating user:", error);
					switch (error.code) {
					      case "INVALID_EMAIL":
					        console.log("The specified user account email is invalid.");
					        break;
					      case "INVALID_PASSWORD":
					        console.log("The specified user account password is incorrect.");
					        break;
					      case "INVALID_USER":
					        console.log("The specified user account does not exist.");
					        break;
					      default:
					        console.log("Error logging user in:", error);
					    }				    
				  } else {

				  
			  	    ref.child("users").child(authData.uid).set({
				      provider: 'password',
				      name: user.name,
				      email: user.email
				    },function(error){
				    	if(!error){
				    		console.log("Successfully created user account with uid:", authData.uid);
				    		retorno.resolve(authData);
				    		$location.path('login');
				    	}
				    });
				    
				    
				  }
				});	

				return retorno.promise;
			}



			return {			
				create: create
			};

		}]);

}());