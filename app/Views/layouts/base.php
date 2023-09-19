<?php $user_data = session()->get('user_data');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Red Panda prices is a Cprice Comparaisony SystemF.">
    <meta name="keywords" content="Comparaison Prices System, Redpanda prices, RedPanda">
    <title>The Price Bee | <?= $title ?? " Home" ?></title>
    <!-- Bootstrap -->
    <link href="<?= base_url()?>/assets/rp_website/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/rp_website/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="<?= base_url()?>/assets/rp_website/css/fontello.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="<?= base_url()?>/assets/rp_website/css/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/rp_website/css/owl.theme.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/rp_website/css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_website/css/formulaire.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.jpg" />
</head>

<body class="bg-white">
    <div class="sticky-top">
        <div class="bg-white">
            <nav
                class="navbar navbar-expand-lg navbar-light bg-white py-3 border-top border-bottom"
            >
                <div class="container">
                    <a href="<?= base_url()?>"
                    ><img
                            src="<?= base_url()?>/assets/rp_website/images/logo_rp.png"
                            alt="Red Panda Prices"
                            style="width: 120px; height: 60px;"
                        /></a>
                    <button
                        class="navbar-toggler collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link"
                                    href="<?=base_url()?>"
                                >
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="<?=base_url()?>/all-products"
                                >
                                    Product
                                </a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>/contact">
                                    Contact us
                                </a>
                            </li>
                            <?php if (!isset($user_data)):?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>/login">
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="<?=base_url()?>/signup">
                                        Register
                                    </a>
                                </li>
                            <?php elseif(isset($user_data)) :?>
                                <li>
                                    <a class="nav-link" href="<?=base_url()?>/logout">
                                        Logout
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="<?=base_url()?>/profile">
                                        <?= $user_data->u_first_name ??  $user_data->user_name ?? "Profile" ; ?>
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>                        
                    </div>
                </div>
            </nav>
        </div>
</div>

<?= $this->renderSection("content")?>

<div class="footer pdt80 pdb20" style="background-color: #f1f6ff !important;">
    <!-- footer -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="footer-logo">
                    <!-- Footer Logo -->
                    <img
                        src="<?= base_url()?>/assets/rp_website/images/logo_rp.png"
                        alt="Red Panda Prices"
                        class="rounded-circle"
                        style="width: 120px; height: 80px;"
                    />
                </div>
                <!-- /.Footer Logo -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="mt20">
                    <!-- widget footer -->
                    <h3 class="text-dark mb-3">Site</h3>
                    <ul class="listnone">
                        <!-- <li><a href="#!" class="text-base">Privacy Policy </a></li>
                         <li><a href="#!" class="text-base">Do Not Sell My Info</a></li> -->
                         <li><a href="#!" class="text-base">Terms of Use</a></li>
                         <li><a href="#!" class="text-base">Site Map</a></li>
                     </ul>
                 </div>
                 <!-- /.widget footer -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="mt20">
                    <!-- widget footer -->
                    <h3 class="text-dark mb-3">About</h3>
                    <ul class="listnone">
                       <li><a href="#!" class="text-base">Career</a></li>
                       <li><a href="#!" class="text-base">Team</a></li>
                   </ul>
               </div>
               <!-- /.widget footer -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="mt20">
                    <!-- widget footer -->
                    <h3 class="text-dark mb-3">Contact</h3>
                    <ul class="listnone">
                        <!--   <li><a href="#!" class="text-base">Customer Support </a></li>
                        <li><a href="#!" class="text-base">Partnership </a></li>-->
                        <li>
                            <a href="#!" class="text-base">Business Development</a>
                        </li>
                        <li><a href="#!" class="text-base">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.widget footer -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="mt20">
                    <!-- widget footer -->
                    <h3 class="text-dark mb-3">Follow us</h3>
                    <ul class="listnone">
                        <li>
                            <a href="#!" class="text-base">Facebook </a>
                        </li>
                        <li>
                            <a href="#!" class="text-base">Twitter</a>
                        </li>
                        <li>
                            <a href="#!" class="text-base">Telegram</a>
                        </li>
                    </ul>
                </div>
                <!-- /.widget footer -->
            </div>
        </div>
        <!-- /.footer -->
        <!-- tiny footer -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="mt-5 text-center">
                <p>
                    Copyright © The Price Bee <script>document.write(new Date().getFullYear());</script>  All Rights Reserved |
                    <span class="powered">Powered by <a href="void:javascript(0)">Ngoma DigiTech</a></span> 
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<a href="#0" class="cd-top" title="Go to top">Top</a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url()?>/assets/rp_website/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= base_url()?>/assets/rp_website/js/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- slider script -->
<script src="<?= base_url()?>/assets/rp_website/js/owl.carousel.min.js"></script>
<script src="<?= base_url()?>/assets/rp_website/js/main.js"></script>
<!--  <script src="js/main.js"></script> -->
<!-- Back to top script -->
<script src="<?= base_url()?>/assets/rp_website/js/back-to-top.js"></script>
<script src="<?= base_url()?>/assets/rp_website/js/formulaire.js"></script>



</body>
</html>


