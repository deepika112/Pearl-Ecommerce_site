<?php
session_start();
if(!isset($_SESSION["UID"])){header("location: login.php"); return;}

include('assets/phpscript/FormatedOutput.php');
include('assets/Database/DBMySql.php');$db=new DBMySql;

$Orders=array();
$con=$db->GetActiveConnection();
$result= $db->GetResultOnConnection("select * from ordersbycustomer order by OID desc ",$con);

if($result)while( $row = $result->fetch_assoc()){ $Orders[] = $row; }

for ($n=0;$n<count($Orders);$n++)//
{
    $result = $db->GetResultOnConnection("select * from orderinfo where OrderNumber=".$Orders[$n]['OrderNumber'],$con);
    $Products=array();
    if($result)while( $row = $result->fetch_assoc()){ $Products[] = $row; }
    $Orders[$n]['Products']=$Products;
}
$con->close();
//$Orders=$Orders;




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

<body style="background: rgb(255,238,238);">
    <?php include('menu.php'); ?>
    <div class="container" style="margin-top: 11px;">
        <h4 class="text-secondary">Orders</h4>
    </div>
    <hr>
    <div class="container">

    <?php if($Orders) foreach($Orders as $Order)
          {
                        
    ?>

<div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col d-xl-flex align-items-xl-center">
                        <h5 class="text-secondary flex-fill">Order Number - #<?php echo $Order['OrderNumber']; ?></h5>
                        <h5 class="text-success">Bill Amount - <?php echo $Order['BillAmount'] ?></h5>
                    </div>
                </div>
                <div class="row" style="margin-top: 11px;">
                    <div class="col d-xl-flex align-items-xl-center">
                        <h6 class="flex-fill">Customer - <?php echo $Order['CustomerName'] ?> - <?php echo $Order['CustomerMobile'] ?></h6>
                    </div>
                </div>
                <hr>
                <div class="table-responsive bg-white border rounded shadow-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-danger">
                                <th style="width: 54px;">Sn.</th>
                                <th>ProductName</th>
                                <th style="width: 247px;">Price</th>
                                <th style="width: 188px;">Quantity</th>
                                <th style="width: 85px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            if( $Order['Products'])foreach($Order['Products'] as $Product)
                                        {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td style="width: 133px;"><?php echo $Product['ProductName']; ?></td>
                                <td><?php echo $Product['Price']; ?></td>
                                <td><?php echo $Product['Quantity']; ?></td>
                                <td><?php echo ($Product['Price'] * $Product['Quantity']); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php } ?>
        
        
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>