angular.module('foodleaderApp', ['ngResource'])

    .factory('EmployeeResource', ['$resource', function ($resource) {
        return $resource('employees.json');
    }])

    .factory('MenuItemResource', ['$resource', function ($resource) {
        return $resource('menu.json');
    }])

    .factory('SaveEmployees', ['$http', function ($http) {
        return function (employees) {
            return $http.post('save_employees.php', employees);
        };
    }])

    .factory('SaveMenu', ['$http', function ($http) {
        return function (menuItems) {
            return $http.post('save_menu.php', menuItems);
        };
    }])

    .controller('EmployeeController', [
        'EmployeeResource',
        '$scope',
        'SaveEmployees',
        function (EmployeeResource, $scope, SaveEmployees) {

            $scope.employees = [];

            var loadEmployees = function () {
                $scope.employees = EmployeeResource.query();
            }();

            $scope.addEmployee = function (name) {

                var employee = {
                    'employeeId': 'Employee-' + uuid.v4(),
                    'name': name
                };
                $scope.employees.push(employee);
                $scope.saveEmployees($scope.employees);
            };

            $scope.removeEmployee = function (employee) {
                $scope.employees = _.without($scope.employees, employee);
                $scope.saveEmployees($scope.employees);
            };

            $scope.saveEmployees = SaveEmployees;

        }]
    )

    .controller('MenuController', [
        'MenuItemResource',
        '$scope',
        'SaveMenu',
        function (MenuItemResource, $scope, SaveMenu) {

            $scope.menuItems = [];

            var loadMenu = function () {
                $scope.menuItems = MenuItemResource.query();
            }();

            $scope.addMenuItem = function (name, price, description) {

                var menuItem = {
                    'menuItemId': 'MenuItem-' + uuid.v4(),
                    'name': name,
                    'price': price,
                    'description': description
                };
                $scope.menuItems.push(menuItem);
                $scope.saveMenu($scope.menuItems);
            };

            $scope.removeMenuItem = function (menuItem) {
                $scope.menuItems = _.without($scope.menuItems, menuItem);
                $scope.saveMenu($scope.menuItems);
            };

            $scope.saveMenu = SaveMenu;

        }]
    )

;


