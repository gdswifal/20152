(function () {
    angular.module('simpledesk').constant('APP_SETTINGS', {
        "API_URL": "https://simpledesk.firebaseio.com/"
    });

    angular.module('simpledesk').run(function ($rootScope, $location) {
        $rootScope.user = null;
        $rootScope.currentPath = $location.path();
        console.log($rootScope.currentPath);

        // $rootScope.$on("$routeChangeStart", function (event, next, current) {
        //     if ($rootScope.user == null) {
        //         $location.path("/login");
        //     }
        // });

    })
    .config(['$stateProvider','$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise("/");

    }]);
})();