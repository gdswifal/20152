(function() {

	'use strict';

	angular.module('simpledesk.dashboard.controllers').controller('DashboardRetrieveCtrl', DashboardRetrieveCtrl);

	DashboardRetrieveCtrl.$inject = ['$scope', 'SocialAuthSvc','$rootScope', '$location', 'APP_SETTINGS'];

	function DashboardRetrieveCtrl($scope, SocialAuthSvc,$rootScope, $location, APP_SETTINGS) {

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

	}

}());


