<?php

session_start();
include('assets/Database/DBMySql.php'); $db=new DBMySql;
include('assets/phpscript/FormatedOutput.php');
$keyword="";
$UID=0;
if(($_SESSION["UserType"]!='Admin')){ header("location: login.php");return; }
$UID=$_SESSION["UID"];


if(isset($_GET["OID"]) && isset($_GET["Status"]))
{
    $sql="UPDATE orders SET `Status`='".$_GET["Status"]."' WHERE OID=".$_GET["OID"];
    $db->NonQuery($sql);
}

//
$sql="Select * from ordersbycustomer Where UID=".$UID;
$result=$db->GetResult($sql);
//   header("location: customerlogin.php");return;


?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Pearl Beauty</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css" />
    <link rel="stylesheet" href="assets/css/cards.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body style="background: rgb(242,242,242);">
    <?php include("menu.php");?>

    <div class="container d-flex" style="margin-top: 20px;">
        <h4 class="text-secondary d-xl-flex flex-fill align-items-xl-center">Product Status</h4>
    </div>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Add Update Product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">�</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control" type="text" placeholder="Enter Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Cost</label>
                                                    <input class="form-control" type="number" placeholder="Product Cost" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input class="form-control" type="number" placeholder="Quantity" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand</label>
                                                    <input class="form-control" type="text" placeholder="Enter Brand" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                                            <button class="btn btn-primary" type="button">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6>Double Click on order to View Details</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 49px;">Sn.</th>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th style="width: 140px;">Billing Amt</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 215px;">Set Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n=1;
                                      if($result)  while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td>
                                        <?php echo $n++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["OrderNumber"];?>
                                    </td>
                                    <td>
                                        <?php echo $row["OrderDate"];?>
                                    </td>


                                    <td>
                                        <?php echo $row["BillAmount"];?>
                                    </td>
                                    <td>
                                        <?php echo $row["Status"];?>
                                    </td>
                                    <td>
                                        <?php if($row["Status"]=='Pending'){?>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-Danger" href="myorders.php?OID= <?php echo $row["OID"];?>&Status=Cancelled">Cancel Order</a>
                                        </div>
                                        <?php } else {echo '# # #';}?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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