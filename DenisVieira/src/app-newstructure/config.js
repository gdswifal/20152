(function () {
    angular.module('appName').constant('APP_SETTINGS', {
        "API_URL": "https://appName.api.com"
    });

    angular.module('appName').run(function ($rootScope, $location) {
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