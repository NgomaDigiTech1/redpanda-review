<?php
    $user_data = session()->get('user_data');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title> <?= $title ?? "Red Panda Prices"?> </title>
  
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.jpg" />

    <!-- tag input css -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/plugins/bootstrap-tagsinput.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/plugins/dataTables.bootstrap4.min.css">
    <!-- select2 css -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/plugins/select2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/formulaire.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/style.css">
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/rp_admin/css/plugins/dropzone.min.css">
    <style>
        body{font-family: "Century Gothic"};
        .menu-styler.style-toggler { display: none;}
        .menu-styler .style-toggler{
            display:none !important;
        }
    </style>
</head>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url()?>/assets/rp_admin/images/user/<?= $user_data->u_photo ?? "user-default-avatar.png"?>" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= ucfirst($user_data->u_role) ?? "User Role" ?> <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="<?= base_url()?>/profile" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="<?= base_url()?>/users/addImage" data-toggle="tooltip" title="Profile Picture"><i class="feather icon-image"></i><small class="badge badge-pill badge-primary"></small></a></li>
                        <li class="list-inline-item"><a href="<?= base_url()?>/logout" onclick="return confirm('Are you sure to logout ?');" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="<?= base_url()?>/dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <?php if ($user_data->u_role === 'admin'):?>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="<?= base_url()?>/sectors" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Sectors</span></a>
                    </li>
                <?php endif;?>
                <?php if (($user_data->u_role === 'admin') || ($user_data->u_role === 'org manager')):?>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Products</span></a>
                        <ul class="pcoded-submenu">
                            <?php if ($user_data->u_role === 'admin'):?>
                                <li><a href="<?= base_url()?>/products/create">Add new</a></li>
                                <li><a href="<?= base_url()?>/products">List</a></li>
                            <?php endif;?>
                            <?php if ($user_data->u_role === 'org manager'):?>
                                <li><a href="<?= base_url()?>/products/getOrganisationProducts">My Products</a></li>
                                <li><a href="<?= base_url()?>/products">Add Product</a></li>
                            <?php endif;?>
                        </ul>
                    </li>
                <?php endif;?>
                <?php if ($user_data->u_role === 'admin'):?>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Users</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url()?>/users/create">Add User</a></li>
                            <li><a href="<?= base_url()?>/users">List Users</a></li>
                        </ul>
                    </li>
                <?php endif;?>
                
            </ul>
            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="#!" class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img
                    src="<?= base_url()?>/assets/rp_website/images/logo_rp.png"
                    alt="Red Panda Logo"
                    class="logo"
                    style="height: 45px; width: 70px;"
            >
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li> -->
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="<?= base_url()?>/assets/rp_admin/images/user/<?= $user_data->u_photo ?? "user-default-avatar.png" ?>" class="img-radius" alt="User-Profile-Image">
                            <span><?= ucfirst($user_data->u_first_name) ?? "" ?></span>
                            <a href="<?= base_url()?>/logout" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="<?= base_url()?>/profile" class="dropdown-item"><i class="feather icon-user"></i>Profile</a></li>
                            <li><a href="<?= base_url()?>/logout" class="dropdown-item"><i class="feather icon-lock"></i>Sign out</a></li>
                            <li><a href="<?= base_url()?>/change" class="dropdown-item"><i class="feather icon-settings"></i>Change Password</a></li>
                            <li><a href="<?= base_url()?>" class="dropdown-item"><i class="feather icon-home"></i>Home</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

<!--Content Render-->
<?= $this->renderSection('content') ?>


<!-- Required Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/ripple.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/pcoded.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/apexcharts.min.js"></script>
<!-- custom-chart js -->
<script src="<?= base_url()?>/assets/rp_admin/js/pages/dashboard-main.js"></script>
<!-- tag-input js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/bootstrap-tagsinput.min.js"></script>

<!-- datatable Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/pages/data-advance-custom.js"></script>

<!-- notification Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/bootstrap-notify.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/pages/ac-notification.js"></script>
<!-- file-upload Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/dropzone-amd-module.min.js"></script>
<script src="<?= base_url()?>/assets/rp_admin/js/menu-setting.min.js"></script>
<!-- select2 Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/select2.full.min.js"></script>
<!-- form-select-custom Js -->
<script src="<?= base_url()?>/assets/rp_admin/js/pages/form-select-custom.js"></script>

<script>
    $('#user-list-table').DataTable();
</script>
<script>
    // DataTable start
    $('#report-table').DataTable();
    // DataTable end
</script>
<script>
    $(document).ready(function() {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++ ;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>
<!-- Ckeditor js -->
<script src="<?= base_url()?>/assets/rp_admin/js/plugins/ckeditor.js"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<!--Include Js Php file-->
<?= $this->include('dashboard/jsPhp') ?>
<!-- Js Php file-->
</body>
</html>