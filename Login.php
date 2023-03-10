<?php
session_start();

$err="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('assets/phpscript/FormatedOutput.php');
    include('assets/Database/DBMySql.php');$DB=new DBMySql;
    $Email =  $_POST["Email"];

    $PWD =  $_POST["PWD"];

    
    $sql="select count(*) from `customers` where `Email` ='".$Email."' and `UserPassword` ='".$PWD."';";
    if($DB->ScalerQuery($sql)==1)
    {
        $sql="select * from `customers` where `Email` ='".$Email."' and `UserPassword` ='".$PWD."';";
        $_SESSION["User"]=$DB->GetSingleRow($sql);

        $_SESSION["UID"]=$_SESSION["User"]["UID"];
        $_SESSION["UserName"]=$_SESSION["User"]["UserName"];
        $_SESSION["UserType"]=$_SESSION["User"]["UserType"];
        echo  'yu';
        if( $_SESSION["UserType"]=="Admin"){$_SESSION["Admin"]="yes";}
        if($_SESSION["UserType"]=='Admin'){header("Location: orders.php");return;}
        else {
            header("Location: myorders.php");return;
        }
    }
    else{ $err="Invalid Credentials";}


}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="container-fluid shadow d-xl-flex align-items-xl-center" style="background: url(&quot;assets/img/LoginBG.jpg&quot;) no-repeat;padding-left: 760px;padding-right: 15px;height: 534px;background-size: auto;">
        <div class="login-card" style="background: rgba(247,247,247,0.44);min-width: 349px;"><img class="profile-img-card" src="assets/img/Beauty%20Care.png">
            <p class="profile-name-card"> </p>
            <form class="form-signin" method="post" action="Login.php">
                <?php if($err!='')PrintAlert($err,'danger'); ?>
                <input class="form-control" type="email" name="Email" required placeholder="Enter Email address" autofocus="" id="inputEmail" />
                <input class="form-control" type="password" required name="PWD" placeholder="Password" id="inputPassword" />
                <div class="checkbox"></div>
                <button class="btn btn-success" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>