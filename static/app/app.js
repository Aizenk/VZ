function ngEnter() {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter, {'event': event});
                });

                event.preventDefault();
            }
        });
    };
}

angular
    .module('vz', ['ngRoute'])
    .directive('ngEnter', ngEnter)
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'static/views/main.html',
                controller: mainCtrl
            })
    })
;

function mainCtrl($scope, $http) {
    $scope.getTexts = function () {
        $http.get('/texts/get-all').then(function (response) {
            $scope.items = response.data;
        })
    };

    $scope.createText = function () {
        $http.get('/texts/create', {
            params: {text: $scope.text}
        }).then(function (response) {
            $scope.getTexts()
        })
    };

    $scope.getTexts();
}