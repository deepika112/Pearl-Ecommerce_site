<?php 

session_start();

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pearl Beauty</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/myjs.js"></script>
    <script src="assets/alertifyjs/alertify.min.js "></script>
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/default.min.css" />

    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/angular-sanitize.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope, $http, $location) {

            $scope.Products = [];
            $scope.SelectedProducts = [];
            $scope.Category = null;
            $scope.params = QueryStringToJSON();

            if ($scope.params.SubCategory) $http.get("assets/api/getproducts.php?SubCategory=" + $scope.params.SubCategory).then(function (response) { $scope.Products = response.data.Data; });
            else if($scope.params.Category)$http.get("assets/api/getproducts.php?Category="+$scope.params.Category).then(function (response) { $scope.Products = response.data.Data; });
            else if ($scope.params.ProductName) {
                $http.get("assets/api/getproducts.php?ProductName=" + $scope.params.ProductName).then(function (response) { $scope.Products = response.data.Data; });
                $scope.ProductName = $scope.params.ProductName;
            }

            else $http.get("assets/api/getproducts.php").then(function (response) {$scope.Products = response.data.Data;});

            
            console.log(QueryStringToJSON());
            
            $scope.SelectCategory = function () {
                $http.get("assets/api/getproducts.php?Category="+$scope.Category).then(function (response) {
                        $scope.Products = response.data.Data;
                });
            }
            $scope.Search = function () {
                $http.get("assets/api/getproducts.php?ProductName=" + $scope.ProductName).then(function (response) {
                        $scope.Products = response.data.Data;
                });
            }
            $scope.AddToCart = function (Product, Index) {
                if ($scope.SelectedProducts.includes(Product))
                    $scope.SelectedProducts.splice($scope.SelectedProducts.indexOf(Product), 1);
                else $scope.SelectedProducts.push(Product);
                console.log($scope.SelectedProducts);
            }
            $scope.CheckOut = function () {
               
                localStorage.setItem('Products', JSON.stringify($scope.SelectedProducts));
                location.assign('./pointofsale.php');
            } 
        });

    </script>
</head>

<body ng-app="myApp" ng-controller="customersCtrl" style="background: rgb(255,238,238);">
    <?php include('menu.php');?>
    <div class="container" style="margin-top: 11px;">
        <div class="row">

        <div ng-show="SelectedProducts.length>0"  class="col">
        <button ng-click="CheckOut()" class="btn btn-primary" >Check out</button>
        </div>
            <div class="col-3">
            <select class="form-control" ng-model="Category" ng-change="SelectCategory()">
           
            <option>Eye</option>
            <option>Lips</option>
            <option>Hair Care</option>
            <option>Face</option>
            <option>Skin</option>
            <option>Tools Accessories</option>
            </select></div>
            <div
                class="col">
                <form>
                    <div class="input-group">
                    <input class="form-control" ng-model="ProductName" type="text" name="Keyword" placeholder="Enter Product Name">
                        <div class="input-group-append">
                        <button class="btn btn-primary" ng-click="Search()" type="button">Go!</button></div>
                    </div>
                </form>
        </div>
    </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div ng-repeat="Product in Products" class="col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                    <img class="img-fluid border rounded shadow-sm" src="{{'assets/img/products/'+Product.PID+'.jpg'}}"  style="margin-bottom: 10px;">
                        <h6>{{Product.ProductName}}</h6>
                        <h6 class="text-muted card-subtitle mb-2">Price : <strong>{{Product.Price}}</strong>/-</h6>
                        <p class="card-text">{{Product.Description}}</p>
                        <div class="btn-group" role="group">
                        <button class="btn btn-success" ng-show="!SelectedProducts.includes(Product)" ng-click="AddToCart(Product,$index)" type="button">Add to Cart</button>
                        <button class="btn btn-danger"  ng-show="SelectedProducts.includes(Product)" ng-click="AddToCart(Product,$index)" type="button">Remove from Cart</button></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>