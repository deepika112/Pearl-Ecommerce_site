<!DOCTYPE html>
<?php
session_start();?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Pearl Beauty</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css" />
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css" />
    <link rel="stylesheet" href="assets/css/Hero-Technology.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script src="assets/alertifyjs/alertify.min.js "></script>
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/default.min.css" />

    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/angular-sanitize.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope, $http, $location) {
            $scope.BillAmount = 0;
            $scope.CustomerName = $scope.CustomerMobile = $scope.CustomerAddress ='';
            if (localStorage.getItem('Products') != null)
                $scope.Products = JSON.parse(localStorage.getItem('Products'));
            $scope.Increment = function (Product) { Product.Quantity++; $scope.UpdateBillAmount(); }
            $scope.Decrement = function (Product) { if (Product.Quantity > 1) Product.Quantity--; $scope.UpdateBillAmount(); }
            $scope.UpdateBillAmount = function () {
                $scope.BillAmount = 0;
                $scope.Products.forEach(Product =>
                { $scope.BillAmount = $scope.BillAmount + (Product.Price * Product.Quantity); })
            }
            $scope.UpdateBillAmount();
                    $scope.DeleteProduct=function(Index)
            {
                $scope.Products.splice(Index, 1);
            }
        $scope.PlaceOrder=function()
        {
            var data = {};
            data.BillAmount = $scope.BillAmount;
            data.CustomerName = $scope.CustomerName;
            data.CustomerMobile = $scope.CustomerMobile;
            data.CustomerAddress = $scope.CustomerAddress;
            data.Products = $scope.Products;
            $http.post("assets/api/PlaceOrder.php", angular.toJson(data)).then(function (response) {
                if (response.data.Status == 'Success') 
                    console.log(JSON.stringify(response.data));
                location.assign("./success.php");
            });

            


            //
            }

        });

    </script>
</head>

<body ng-app="myApp" onload="Load()" ng-controller="customersCtrl" style="background: rgb(255,238,238);">

    <?php include('menu.php');?>
    <div class="container" style="margin-top: 20px;">
        <h4 class="text-secondary">Cart</h4>
    </div>
    <hr />
    <div class="container">
        <div class="table-responsive bg-white shadow-sm">
            <table class="table table-striped">
                <caption class="text-center">
                    <strong>List of Added Products</strong>
                </caption>
                <thead>
                    <tr class="table-danger">
                        <th style="width: 54px;">Sn.</th>
                        <th>Product Name</th>
                        <th style="width: 84px;">Cost</th>
                        <th style="width: 188px;">Quantity </th>
                        <th style="width: 85px;">Total </th>
                        <th style="width: 119px;">Operations </th>
                    </tr>
                </thead>
                <tbody>

                    <tr ng-repeat="Product in Products">
                        <td>{{$index+1}}</td>
                        <td>{{Product.ProductName}}</td>
                        <td>{{Product.Price}}</td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" ng-click="Decrement(Product)">
                                        <i class="fa fa-minus"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" ng-model="Product.Quantity" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" ng-click="Increment(Product)">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>{{Product.Quantity * Product.Price}}</td>
                        <td>
                            <button class="btn btn-danger" ng-click="DeleteProduct($index)" type="button">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br />
                        </td>
                        <td>
                            <strong>Grand Total</strong>
                            <br />
                        </td>
                        <td></td>
                        <td></td>
                        <td>{{BillAmount}} /-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <br />
                        </td>
                        <td>
                            
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                           
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="container" style="margin-top: 26px;">
        <?php if(isset($_SESSION["User"])){ ?>
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Place Order</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input  type="text" class="form-control" readonly value="<?php echo $_SESSION['User']['UserName'] ?>"  />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Customer Mobile</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['User']['Mobile'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Customer Address</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['User']['Address'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" ng-click="PlaceOrder()">Place Order Now�</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>