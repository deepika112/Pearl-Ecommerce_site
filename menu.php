<?php


if(session_status()==1) session_start();?>
<nav class="navbar navbar-dark navbar-expand-md bg-danger">
    <div class="container">
        <a class="navbar-brand" href="index.php">Pearl Beauty</a>
        <!-- <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <a class="nav-link active" href="search.php">Search</a>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown" style="padding-right: 5px;padding-left: 5px;">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="" style="padding-right: 5px;padding-left: 5px;">Eye</a>
                        <div class="dropdown-menu" style="padding-right: 5px;padding-left: 5px;">
                            <a class="dropdown-item" href="search.php?SubCategory=Kajal" style="padding-right: 5px;padding-left: 5px;">Kajal</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Eye Liner" style="padding-right: 5px;padding-left: 5px;">Eye Liner</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Mascara" style="padding-right: 5px;padding-left: 5px;">Mascara</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown" style="padding-right: 5px;padding-left: 5px;">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="" style="padding-right: 5px;padding-left: 5px;">Lips</a>
                        <div class="dropdown-menu" style="padding-right: 5px;padding-left: 5px;">
                            <a class="dropdown-item" href="search.php?SubCategory=Lip Balm" style="padding-right: 5px;padding-left: 5px;">Lip Balm</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Lip Liner" style="padding-right: 5px;padding-left: 5px;">Lip Liner</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Lipstick" style="padding-right: 5px;padding-left: 5px;">Lipstick</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown" style="padding-right: 5px;padding-left: 5px;">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="" style="padding-right: 5px;padding-left: 5px;">Face</a>
                        <div class="dropdown-menu" style="padding-right: 5px;padding-left: 5px;">
                            <a class="dropdown-item" href="search.php?SubCategory=Primer" style="padding-right: 5px;padding-left: 5px;">Primer</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Foundation" style="padding-right: 5px;padding-left: 5px;">Foundation</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Compact" style="padding-right: 5px;padding-left: 5px;">Compact</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Blush" style="padding-right: 5px;padding-left: 5px;">Blush</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Concealer" style="padding-right: 5px;padding-left: 5px;">Concealer</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Highlighter" style="padding-right: 5px;padding-left: 5px;">Highlighter</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown" style="padding-right: 5px;padding-left: 5px;">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="" style="padding-right: 5px;padding-left: 5px;">Hair</a>
                        <div class="dropdown-menu" style="padding-right: 5px;padding-left: 5px;">
                            <a class="dropdown-item" href="search.php?SubCategory=Conditioner" style="padding-right: 5px;padding-left: 5px;">Conditioner</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Hair oil" style="padding-right: 5px;padding-left: 5px;">Hair oil</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Serum" style="padding-right: 5px;padding-left: 5px;">Serum</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Shampoo" style="padding-right: 5px;padding-left: 5px;">Shampoo</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown" style="padding-right: 5px;padding-left: 5px;">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="" style="padding-right: 5px;padding-left: 5px;">Skin</a>
                        <div class="dropdown-menu" style="padding-right: 5px;padding-left: 5px;">
                            <a class="dropdown-item" href="search.php?SubCategory=Moisturizer" style="padding-right: 5px;padding-left: 5px;">Moisturizer</a>
                            <a class="dropdown-item" href="search.php?SubCategory=FaceWash" style="padding-right: 5px;padding-left: 5px;">FaceWash</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Lotions" style="padding-right: 5px;padding-left: 5px;">Lotions</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Skin Serum" style="padding-right: 5px;padding-left: 5px;">Skin Serum</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Sunscream" style="padding-right: 5px;padding-left: 5px;">Sunscream</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <div class="nav-item dropdown">
                        <a data-toggle="dropdown" aria-expanded="false" class="text-white" href="">Accessories</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="search.php?SubCategory=Perfume Bottles">Perfume Bottles</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Bags Cases">Bags & Cases</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Hair Stylers">Hair Stylers</a>
                            <a class="dropdown-item" href="search.php?SubCategory=Foundation Brushes">Foundation Brushes</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item d-xl-flex align-items-xl-center " style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                <a class="nav-link active" href="myorders.php">My Orders</a>

                </li>
                <li class="nav-item d-xl-flex align-items-xl-center" style="padding: 5px;padding-right: 5px;padding-left: 5px;">
                    <?php  if(isset($_SESSION["UserName"])){  ?>
                    <a class="nav-link active">
                        <?php echo "Welcome ". $_SESSION["UserName"]; ?>
                    </a>
                    <a href="assets/phpscript/Logout.php" class="nav-link active">Logout</a>
                    <?php   } else {?>
                    <a class="nav-link active" href="login.php">Login</a>
                    <a class="nav-link active" href="signup.php">Signup</a>

                    <?php   } ?>
                    <a class="nav-link active" href="Aboutus.php">About us</a>

                </li>

            </ul>
        </div>
    </div>
</nav>