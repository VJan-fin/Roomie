<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 17.01.2016
 * Time: 20:03
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico" sizes="16x16 32x32 48x48 64x64"
          type="image/vnd.microsoft.icon">

    <title>Roomie</title>

    <!-- CSS -->
<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/superhero/bootstrap.min.css" rel="stylesheet" integrity="sha256-AbCXzDgd7Vj/2JrsXgjrLdYZ92AgN262cXvQr4tAQa4= sha512-cA2CLCEXBR7hnXGgSNa+TaQ7WT2zW1IVm6uCLcu3ebHNhy+VIudw9kwgHlcL57wCiiXLZ1x7yT5Mv3QkDO2XZA==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!--    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.7.1/loading-bar.min.css' type='text/css' media='all' />-->
    <link href='css/loading-bar.css' rel='stylesheet' type='text/css' media='all'>

    <!-- Custom CSS -->
    <link href="css/main.css">

</head>

<body ng-app="roomie-app" ng-cloak class="ng-cloak">

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#/auth"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>

<div ng-controller="RentalUnitController">
    <div class="form-group">
        <button class="btn btn-primary btn-lg" ng-click="getAllRentalUnits()">Get All</button>
        <button class="btn btn-primary btn-lg" ng-click="getSingleRentalUnit()">Get Only One</button>
    </div>

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-spinner fa-4x fa-spin"></span></p>

    <div class="rentalUnits" ng-hide="loading" ng-repeat="unit in rentalUnits">
        <h3>Rental Unit #{{ unit.id }} <small>by {{ unit.user_id }}</h3>
        <p>{{ unit.address }}</p>
    </div>

</div>

<!-- Angular routing -->
<div ui-view></div>


    <!-- Libraries -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<!--    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.7.1/loading-bar.min.js'></script> -->

    <script src="app/libraries/angular.js"></script>
    <script src="app/libraries/angular-ui-router.min.js"></script>
    <script src="app/libraries/angular-sanitize.min.js"></script>
    <script src="app/libraries/angular-animate.min.js"></script>
    <script src="app/libraries/angular-loader.min.js"></script>
    <script src="app/libraries/angular-resource.min.js"></script>
    <script src="app/libraries/angular-route.min.js"></script>
    <script src="app/libraries/angular-touch.min.js"></script>
    <script src="app/libraries/loading-bar.js"></script>

    <!--[if lte IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Base64/0.3.0/base64.min.js"></script>
    <![endif]-->
    <script src="//cdn.jsdelivr.net/satellizer/0.13.4/satellizer.min.js"></script>


    <!-- Custom scripts -->
    <script src="app/app.js"></script>

    <!-- Services -->
    <script src="app/services/RentalUnitService.js"></script>
    <!-- Controllers -->
    <script src="app/controllers/RentalUnitController.js"></script>
    <script src="app/controllers/AuthController.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</body>
</html>
