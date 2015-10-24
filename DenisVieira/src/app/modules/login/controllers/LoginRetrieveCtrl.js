(function() {

	'use strict';

	angular.module('simpledesk.login.controllers').controller('LoginRetrieveCtrl', LoginRetrieveCtrl);

	LoginRetrieveCtrl.$inject = ['$scope','AuthSvc', '$rootScope', '$location', 'APP_SETTINGS'];

	function LoginRetrieveCtrl($scope, AuthSvc, $rootScope, $location, APP_SETTINGS) {

				$scope.login = function() {

			    	AuthSvc.login($scope.user).then(function(data){

			    		// console.log("Promise = "+data);

					      //$rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
					      //$scope.setCurrentUser(user);
				    }, function (error) {
				    	console.log(error);
				    	if(error.code === 'TRANSPORT_UNAVAILABLE'){

				    	}
				        $scope.falhou = true;
				    });
				}


		    	$scope.alert = {
		    		'title': 'error.code',
		    		'detail': 'error.message'
		    	};


	}

}());


