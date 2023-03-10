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
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php include('menu.php');?>
    <div class="jumbotron shadow hero-technology" style="height: 791px;">
        <h1 class="hero-title" style="margin-top: 138px;">Pearl Beauty</h1>
        <div class="container d-xl-flex justify-content-xl-center mb-5">
        <form action="search.php">
            <input type="search" name="ProductName" class="form-control" style="max-width: 635px;min-width: 635px;" placeholder="Search Product / Brand" />
        <br/><button class="btn btn-danger btn-lg hero-button" type="submit">Search Now</button>
        </form>
        
        </div>
        
    </div>

    <div class="container">
        <h3 class="text-center text-secondary">Categories</h3>
        <hr />
        <div class="row">
            <div class="col text-center">
            
                <a href="search.php?Category=Eye"><img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/eyes.jpg" style="width: 150px;margin: 7px;" /></a>
                <a href="search.php?Category=Hair Care">
                    <img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/hairs.jpg" style="width: 150px;margin: 7px;" />
                </a>
                <a href="search.php?Category=Lips">
                    <img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/lips.jpg" style="width: 150px;margin: 7px;" />
                </a>
                <a href="search.php?Category=Skin">
                    <img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/skin.jpg" style="width: 150px;margin: 7px;" />
                </a>
                <a href="search.php?Category=Tools Accessories">
                    <img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/tool.jpg" style="width: 150px;margin: 7px;" />
                </a>
                <a href="search.php?Category=Face">
                    <img class="rounded img-fluid border shadow-sm" src="assets/img/Categories/face.jpg" style="width: 150px;margin: 7px;" />
                </a>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>