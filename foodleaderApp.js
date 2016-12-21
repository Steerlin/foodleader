angular.module('foodleaderApp', ['ngResource'])

    .factory('EmployeeResource', ['$resource', function ($resource) {
        return $resource('employees.json?' + Math.random());
    }])

    .factory('MenuItemResource', ['$resource', function ($resource) {
        return $resource('menu.json?' + Math.random());
    }])

    .factory('OrderItemResource', ['$resource', function ($resource) {
        return $resource('orders/:employeeId.json?' + Math.random());
    }])

    .factory('AllOrdersResource', ['$resource', function ($resource) {
        return $resource('all_orders.php?' + Math.random());
    }])

    .controller('GihpyController', [
        '$http', '$scope', function ($http, $scope) {
            var url = 'http://api.giphy.com/v1/gifs/search?q=food&api_key=dc6zaTOxFJmzC&limit=1&offset=' + (Math.floor((Math.random() * 1000))).toString();
            $http.get(url).then(function (data) {
                $scope.giphy = data.data.data[0].images.original.url;
            });
        }
    ])

    .factory('SaveOrderItems', ['$http', function ($http) {
        return function (employeeId, orderItems) {
            return $http.post('save_order.php?' + employeeId, orderItems);
        };
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

            $scope.addMenuItem = function (name, category, price, orderOneDayBefore, description) {

                var menuItem = {
                    'menuItemId': 'MenuItem-' + uuid.v4(),
                    'name': name,
                    'category': category,
                    'price': price,
                    'orderOneDayBefore': orderOneDayBefore,
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

    .controller('OrderController', [
        'MenuItemResource',
        'EmployeeResource',
        'OrderItemResource',
        'SaveOrderItems',
        '$scope',
        function (MenuItemResource, EmployeeResource, OrderItemResource, SaveOrderItems, $scope) {

            $scope.dayOffset = 0;
            $scope.selectedEmployeeId = localStorage.getItem("selectedEmployeeId");

            $scope.getSelectedDate = function () {
                return moment().add($scope.dayOffset, 'days').format('YYYY-MM-DD');
            };

            $scope.isAFriday = function (date) {
                return 5 == moment(date).format('e');
            };

            MenuItemResource.query().$promise.then(function (menuItems) {
                $scope.menuItems = _.groupBy(menuItems, 'category');
            });

            $scope.employees = EmployeeResource.query();

            $scope.loadOrderItems = function () {
                localStorage.setItem("selectedEmployeeId", $scope.selectedEmployeeId);
                $scope.orderItems = OrderItemResource.query({'employeeId': $scope.selectedEmployeeId});
            };
            $scope.loadOrderItems();

            $scope.order = function (menuItem) {
                var orderItem = {
                    'employeeId': $scope.selectedEmployeeId,
                    'name': menuItem.name,
                    'menuItemId': menuItem.menuItemId,
                    'price': menuItem.price,
                    'date': $scope.getSelectedDate()
                };
                $scope.orderItems.push(orderItem);
                SaveOrderItems($scope.selectedEmployeeId, $scope.orderItems);
            };

            $scope.removeOrder = function (orderItem) {
                $scope.orderItems = _.without($scope.orderItems, orderItem);
                SaveOrderItems($scope.selectedEmployeeId, $scope.orderItems);
            };

            $scope.getOrdersOnDate = function (date) {
                return _.filter($scope.orderItems, {'date': date});
            };

            $scope.getTotal = function (orderItems) {
                return _.sumBy(orderItems, 'price');
            };


        }
    ])

    .controller('PaymentController', [
        'EmployeeResource',
        'OrderItemResource',
        'SaveOrderItems',
        '$scope',
        function (EmployeeResource, OrderItemResource, SaveOrderItems, $scope) {

            $scope.employees = EmployeeResource.query();

            $scope.loadOrderItems = function () {
                if ($scope.selectedEmployeeId == undefined) {
                    return;
                }
                $scope.orders = OrderItemResource.query({'employeeId': $scope.selectedEmployeeId});
            };
            $scope.loadOrderItems();

            $scope.clearOrders = function () {
                $scope.orders = [];
                SaveOrderItems($scope.selectedEmployeeId, $scope.orders);
                $scope.loadOrderItems();
            };

            $scope.getTotal = function (orderItems) {
                return _.sumBy(orderItems, 'price');
            };

        }
    ])

    .controller('NavigationController', [
            '$scope',
            function ($scope) {

                $scope.isAdmin = function () {
                    return md5($scope.adminPassword) == '62506be34d574da4a0d158a67253ea99';
                }

            }
        ]
    )

    .controller('OverviewController', [
        'AllOrdersResource',
        'EmployeeResource',
        '$scope',
        function (AllOrdersResource, EmployeeResource, $scope) {

            $scope.dayOffset = 0;

            $scope.allOrders = AllOrdersResource.query();
            $scope.employees = EmployeeResource.query();

            $scope.getSelectedDate = function () {
                return moment().add($scope.dayOffset, 'days').format('YYYY-MM-DD');
            };

            $scope.getEmployeeName = function (employeeId) {
                var employee = _.find($scope.employees, {'employeeId': employeeId});
                return employee ? employee.name : null;
            };

            $scope.getOrdersOnDate = function (date) {
                return _.filter($scope.allOrders, {'date': date});
            };

        }
    ])

;


