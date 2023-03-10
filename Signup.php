<?PHP
//if(session_status()==1)
{session_start();}

$Name=$Mobile=$Email=$PWD=$Address="";
include('assets/Database/DBMySql.php'); $db=new DBMySql;
include('assets/phpscript/FormatedOutput.php');


$err=$CID="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name=$_POST["Name"];
    $Mobile=$_POST["Mobile"];
    $Email=$_POST["Email"];

    $PWD=$_POST["PWD"];
    $REPWD=$_POST["REPWD"];
    $Address=$_POST["Address"];

    if($PWD!=$REPWD){$err="Password MisMatch";}
    else{
        if($db->ScalerQuery("select count(*) from customers where Email='".$Email."'")!="0") 
        {$err="Email Id Already Exist.";}
        else  
            if($db->ScalerQuery("select count(*) from customers where Mobile='".$Mobile."'")!="0") 
            {$err="Mobile Number Already Exist.";}
        else {
        $sql="INSERT INTO customers(`UserName`,`Email`,`Mobile`,UserPassword,Address) VALUES('".$Name."','".$Email."','".$Mobile."','".$PWD."','".$Address."');";
        if($db->NonQuery($sql)){

            $_SESSION["User"]=$db->ScalerQuery("select * from customers where Email='".$Email."'");
            $UID=$_SESSION["User"]['UID'];
            $_SESSION["Name"]=$Name;
            $_SESSION["Email"]=$Email;
            $_SESSION["UserType"]='User';
            header("location: login.php");return;
            
            }



        
        }
    }

}



?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pearl Beauty</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css">
    <link rel="stylesheet" href="assets/css/cards.css">
<link rel="stylesheet" href="assets/css/Team-Grid.css" />
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
     <?php include("menu.php");?>
    <div class="container d-xl-flex align-items-xl-center" style="margin-top: 20px;">
        <h4 class="text-secondary flex-fill">New User ?</h4>
    </div>
    <hr>
     

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                        <form method="post" action="signup.php">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="text" name="Name" title="Name" required pattern="[a-zA-Z .]{3,25}" placeholder="Enter Name" value="<?php echo $Name;?>">
                                    <p> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="text" maxlength="10" name="Mobile" title="Mobile" required pattern="[6789]{1}[0-9]{9}" placeholder="Enter Mobile Number" value="<?php echo $Mobile;?>" />
                                    <p> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="email" name="Email" title="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="Email" value="<?php echo $Email;?>" />
                                    <p> </p>
                                    <div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="password" name="PWD" required placeholder="Password">
                                    <p> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="password" name="REPWD" required placeholder="Re-Enter Password">
                                    <p> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control input-lg" type="text" name="Address" required="" placeholder="Address" value="<?php echo $Address;?>" />
                                    <p> </p>
                                   <?php if($err!=""){ ?> <div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i><span><strong><?php echo $err; ?></strong></span></div><?php } ?>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <button class="btn btn-warning btn-block btn-lg" type="submit"> <i class="glyphicon glyphicon-ok"></i> Proceed </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>