<!DOCTYPE html>
<html lang="en" ng-app="foodleaderApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foodleader</title>

    <link
        href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAv/7lAH/LfwCy/v8AmeT/AGa6fwBZy/4AAGWcAJWq1AAAWI8AAHFZAEu+8gAAmP0A2PL/AAAZegAAi/AAAAxtAACMzADM/v8ADKXYABlmugAATKEAWMv/AAAMfgAA23IAAKU7AMrU6QAZsuUAFl27AEzxpQAmnL8AAAx2ABmy/gAAiwAAAFwAAGXL/wAAfuQAf8v+AEyx/wAmv/IAAHsdACay5QAynL8AAHLMADLL8QAAZb8AP7LcAADwcgAAJZQAMrLlAD/Y/gA/qT8AGZjlAABx2AC/v9wAJqXyABmHsgC/5f4AC2HDALLl/wAMM34Amcv/AAA/fgBy8b8ALFWqAD+L2AA/mD8Av9jyAL/L5QAAf8sADKX9AD++/wBgf78AGbLxAACYAAAAmNgAAORMAH/QfwB/f6UAABmHAACcYQAAf8wAJr/+AAByvwAAMpwAJs9lAAx2PwAAJY8AFmnHAH+y5QCM2P4AGaXlAL/cvwAAftgAIVmyADLL5QAAbh0AMsv+AL/lvwAAZcwAMqXUAD8/fgAAXFAAAFi/AABLsgAAlyYAcr7/AADjcgBZqb8APz+PAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQ1krUVFRUVFZQwAAAAAAWVFLXyxhYWFhSxFBRAAAAGMVT08wTzBPFC4yNGc2AAAOV2hPCQdPClcfPGRFTwAAbVQ+L0xMGGs+FxBlQ2gAAVBgKAVNHQM/IRlmTgAAAFxpaWxqJiZqPQQSVUozYgBcKiYjCzEbKRtHNx5WIkJcDRYTURFjKysrURMnWzgCYjsbXTU1NSRjNTVRURNTGgANSUYPDAwMDCQ1Yy0rHAgAAAZSRkYMDAwPJDUcHF4aAAAAWiBGRg8kDyRjXkBIAAAAAAAAOSU1NTpYXggaAAAAAAAAAAAAAAAAAAAAAAAAAP//AADADwAAgAMAAIABAACAAQAAgAEAAAAHAAAAAQAAAAAAAAAAAAAAAQAAAAEAAIABAADAAwAA8AcAAP//AAA="
        rel="icon" type="image/x-icon"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.4.0/js/md5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.7/uuid.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.4/lodash.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-resource.min.js"></script>
    <script src="foodleaderApp.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

</head>

<?php
$backgroundImages = glob('img/backgrounds/*');
$key = array_rand($backgroundImages);
$randomBackgroundImageFilename = $backgroundImages[$key];
?>

<body ng-controller="NavigationController"
      style="background: url('<?= $randomBackgroundImageFilename ?>') fixed center center no-repeat; background-size: cover; ">

<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Foodleader</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" ng-init="activeSection = 'order'">
                    <li ng-class="{ 'active' : (activeSection == 'order') }">
                        <a href="#" ng-click="activeSection = 'order'">Order</a>
                    </li>
                    <li ng-class="{ 'active' : (activeSection == 'overview') }" ng-show="isAdmin()">
                        <a href="#" ng-click="activeSection = 'overview'">Overview</a>
                    </li>
                    <li ng-class="{ 'active' : (activeSection == 'menu') }" ng-show="isAdmin()">
                        <a href="#" ng-click="activeSection = 'menu'">Menu</a>
                    </li>
                    <li ng-class="{ 'active' : (activeSection == 'employees') }" ng-show="isAdmin()">
                        <a href="#" ng-click="activeSection = 'employees'">Employees</a>
                    </li>
                    <li ng-class="{ 'active' : (activeSection == 'payments') }" ng-show="isAdmin()">
                        <a href="#" ng-click="activeSection = 'payments'">Payments</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Admin password"
                               ng-model="adminPassword" ng-hide="isAdmin()">
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</div>

<div class="container" ng-if="activeSection == 'employees'" ng-controller="EmployeeController">

    <div class="row">

        <div class="col-md-12">

            <div class="well well-sm">

                <form class="form-horizontal">

                    <div class="form-group ">

                        <label class="control-label col-md-2" for="name">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" placeholder="name" ng-model="name">
                        </div>

                        <div class="col-md-2">

                            <button type="submit" class="btn btn-success "
                                    ng-disabled="!(name)"
                                    ng-click="addEmployee(name); name = null">
                                <i class="glyphicon glyphicon-plus-sign"></i>
                                Add
                            </button>
                        </div>
                    </div>


                </form>

            </div>
            <div class="well well-sm">

                <p ng-class="text-muted" ng-show="employees.length == 0">
                    No employees found
                </p>

                <table class="table table-striped" ng-show="employees.length > 0">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="employee in employees | orderBy:'name'">
                        <td>
                            {{ employee.name }}
                        </td>
                        <td>
                            <button class="btn btn-link pull-right"
                                    ng-click="removeEmployee(employee)">
                                <i class="glyphicon glyphicon-trash pull-right"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="container" ng-if="activeSection == 'menu'" ng-controller="MenuController">

    <div class="row">

        <div class="col-md-12">

            <div class="well well-sm clearfix">

                <form class="form-horizontal">

                    <div class="form-group ">

                        <label class="control-label col-md-2" for="name">Name</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control " id="name" ng-model="name">
                        </div>

                        <label class="control-label col-md-2" for="price">Price</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">€</div>
                                <input type="number" step="0.01" class="form-control " id="price"
                                       ng-model="price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-2" for="category">Category</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control " id="category"
                                   ng-model="category">
                        </div>

                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="orderOneDayBefore"
                                           ng-model="orderOneDayBefore"/>
                                    Order at least one day before
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group ">

                        <label class="control-label col-md-2" for="description">Description</label>
                        <div class="col-md-10">
                        <textarea class="form-control" id="description"
                                  ng-model="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group ">

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-success pull-right"
                                    ng-disabled="!(name && price)"
                                    ng-click="addMenuItem(name, category, price, orderOneDayBefore, description); name = category = price = orderOneDayBefore = description = null">
                                <i class="glyphicon glyphicon-plus-sign"></i>
                                Add
                            </button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="well">

                <p class="text-muted text-center" ng-show="menuItems.length < 1">
                    No menu-items found
                </p>

                <table class="table table-striped" ng-show="menuItems.length > 0">

                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>One day before</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="menuItem in menuItems"
                        ng-class="{'success': menuItem.active, 'danger': !menuItem.active}">
                        <td>
                            <button class="btn btn-link btn-sm"
                                    ng-click="menuItem.active = !menuItem.active; saveMenu(menuItems);">
                                <i ng-show="menuItem.active" class="glyphicon glyphicon-eye-open text-success"></i>
                                <i ng-hide="menuItem.active" class="glyphicon glyphicon-eye-close text-danger"></i>
                            </button>
                        </td>
                        <td>
                            {{ menuItem.name }}
                        </td>
                        <td>
                            {{ menuItem.category }}
                        </td>
                        <td>
                            {{ menuItem.price | currency:"€ ":2 }}
                        </td>
                        <td>
                            <span class="glyphicon glyphicon-check" ng-if="menuItem.orderOneDayBefore"></span>
                        </td>
                        <td>
                            <button class="btn btn-link pull-right btn-sm"
                                    ng-click="removeMenuItem(menuItem)">
                                <i class="glyphicon glyphicon-trash pull-right"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="container" ng-if="activeSection == 'order'" ng-controller="OrderController">


    <div class="row">

        <div class="col-md-12">

            <div class="well well-sm">

                <p>

                    <select
                        class="form-control"
                        ng-model="selectedEmployeeId"
                        ng-options="employee.employeeId as employee.name for employee in employees | orderBy:'name' "
                        ng-change="loadOrderItems()">
                        <option value="">Select an employee to order for</option>
                    </select>

                </p>

                <button class="btn btn-default btn-lg pull-left"
                        ng-disabled="dayOffset == 0"
                        ng-click="dayOffset = dayOffset > 0 ? dayOffset-1 : 0;">
                    <span class="glyphicon glyphicon-chevron-left "
                    ></span>
                </button>
                <button class="btn btn-default btn-lg pull-right"
                        ng-click="dayOffset = dayOffset+1;">
                    <span class="glyphicon glyphicon-chevron-right "
                    ></span>
                </button>

                <h3 class="text-center">
                    {{ getSelectedDate() | date:"fullDate" }}
                </h3>

            </div>

        </div>
    </div>

    <div class="row" ng-hide="orderingAvailableOn(getSelectedDate())">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-alert"></i>
                Ordering is not available for this date!
            </div>
        </div>
    </div>

    <div class="row" ng-show="selectedEmployeeId && orderingAvailableOn(getSelectedDate())">
        <div class="col-md-12">

            <div class="well well-sm">


                <h3 class="text-center">Your orders for this day</h3>

                <p class="text-center" ng-show="selectedEmployeeId && getOrdersOnDate(getSelectedDate()).length == 0">
                    No orders yet
                </p>

                <table class="table" ng-show="getOrdersOnDate(getSelectedDate()).length > 0">
                    <tr ng-repeat="orderItem in getOrdersOnDate(getSelectedDate())">
                        <td align="left">
                            {{ orderItem.name }}
                        </td>
                        <td align="left">
                            {{ orderItem.remarks }}
                        </td>
                        <td align="right">
                            {{ orderItem.price | currency:"€ ":2 }}
                        </td>
                        <td>
                            <a ng-click="removeOrder(orderItem)" class="pull-right">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tfoot>
                    <tr>
                        <th>Total</th>
                        <td></td>
                        <td align="right">{{ getTotal(getOrdersOnDate(getSelectedDate())) | currency:"€ ":2 }}</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>


    <div class="row" ng-show="selectedEmployeeId && orderingAvailableOn(getSelectedDate())">
        <div class="col-md-12">

            <div class="well clearfix">

                <h3 class="text-center">Menu</h3>

                <div class="well" ng-repeat="(category, categoryMenuItems) in menuItems">
                    <h4 class="text-center">{{ category }}</h4>
                    <table class="table">
                        <tr ng-repeat="menuItem in categoryMenuItems ">
                            <td>
                                <span class="lead">{{ menuItem.name}} </span>
                                <p ng-if="menuItem.description">{{ menuItem.description }}</p>
                            </td>
                            <td class="col-md-2 text-right">
                                <span class="lead">
                                {{ menuItem.price | currency:"€ ":2 }}
                                </span>
                            </td>
                            <td class="col-md-2 text-right">
                                <input type="text" class="form-control input-sm " placeholder="remarks"
                                       ng-model="menuItem.remarks">
                            </td>
                            <td class="col-md-1">
                                <button class="btn btn-sm pull-right btn-success"
                                        ng-click="order(menuItem)">
                                    Add
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row" ng-show="selectedEmployeeId">
        <div class="col-md-12">

            <div class="well clearfix">

                <h3 class="text-center">Unpaid orders</h3>

                <p class="text-muted text-center" ng-show="orderItems.length == 0">
                    No orders found
                </p>

                <table class="table table-striped" ng-show="orderItems.length > 0">

                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Menu-item</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="orderItem in orderItems | orderBy:'date'">
                        <td>
                            {{ orderItem.date }}
                        </td>
                        <td>
                            {{ orderItem.name }}
                        </td>
                        <td>
                            {{ orderItem.price | currency:"€ ":2}}
                        </td>
                    </tr>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>Total</th>
                        <th></th>
                        <th>{{ getTotal(orderItems) | currency:"€ ": 2 }}</th>
                    </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>

</div>

<div class="container" ng-if="activeSection == 'overview'" ng-controller="OverviewController">

    <div class="row">
        <div class="col-md-12">

            <div class="well well-sm clearfix">

                <button class="btn btn-default btn-lg pull-left"
                        ng-disabled="dayOffset == 0"
                        ng-click="dayOffset = dayOffset > 0 ? dayOffset-1 : 0;">
                    <span class="glyphicon glyphicon-chevron-left "
                    ></span>
                </button>
                <button class="btn btn-default btn-lg pull-right"
                        ng-click="dayOffset = dayOffset+1;">
                    <span class="glyphicon glyphicon-chevron-right "
                    ></span>
                </button>
                <h2 class="text-center">
                    {{ getSelectedDate() | date:"fullDate" }}
                </h2>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2>Summary</h2>

                <p class="text-muted text-center" ng-show="getOrdersOnDate(getSelectedDate()).length < 1">
                    No orders found
                </p>
                <table class="table table-striped" ng-show="getOrdersOnDate(getSelectedDate()).length > 0">

                    <thead>
                    <tr>
                        <th>Menu-item</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="(item, count) in getSummary(getSelectedDate())">
                        <td>
                            {{ item }}
                        </td>
                        <td>
                            {{ count }}
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="well">
                <h2>Individual orders</h2>

                <p class="text-muted text-center" ng-show="getOrdersOnDate(getSelectedDate()).length < 1">
                    No orders found
                </p>

                <table class="table table-striped" ng-show="getOrdersOnDate(getSelectedDate()).length > 0">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Menu-item</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="order in getOrdersOnDate(getSelectedDate())">
                        <td>
                            {{ getEmployeeName(order.employeeId) }}
                        </td>
                        <td>
                            {{ order.name }}
                        </td>
                        <td>
                            {{ order.remarks }}
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="container" ng-if="activeSection == 'payments'" ng-controller="PaymentController">

    <div class="row">

        <div class="col-md-12">

            <div class="well well-sm clearfix">

                <select
                    class="form-control"
                    ng-model="selectedEmployeeId"
                    ng-options="employee.employeeId as employee.name for employee in employees | orderBy:'name' "
                    ng-change="loadOrderItems()">
                    <option value="">Select an employee to order for</option>
                </select>

            </div>

            <div class="well well-sm clearfix" ng-show="orders.length == 0">
                <p class="text-muted text-center">
                    No orders found
                </p>
            </div>

            <div class="well well-sm clearfix" ng-show="orders.length > 0">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Menu-item</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="order in orders | orderBy:'date'">
                        <td>
                            {{ order.date }}
                        </td>
                        <td>
                            {{ order.name }}
                        </td>
                        <td>
                            {{ order.price | currency:"€ ":2}}
                        </td>
                    </tr>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>Total</th>
                        <th></th>
                        <th>{{ getTotal(orders) | currency:"€ ": 2 }}</th>
                    </tr>
                    </tfoot>

                </table>

                <p class="text-center">

                    <button class="btn btn-lg btn-danger" ng-click="clearOrders()">
                        Clear unpaid orders
                    </button>

                </p>

            </div>
        </div>
    </div>
</div>

<div class="container" ng-if="false">

    <div ng-controller="GihpyController">

        <p align="center">
            <img src="{{ giphy }}" width="100%">
        </p>

    </div>

    <footer class="footer">
        <p class="text-center">&copy; Emile "Meatleader 2016" Carels & Simona Bussé</p>
    </footer>
</div>

</body>
</html>
