<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title><?= $title ?? "The Price Bee" ?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="Ngoma Digitech"/>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.ico" />
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/rp_admin/css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <?= form_open("login") ?>
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <img src="<?= base_url()?>/assets/rp_website/images/tpb_logo_jpg.jpg" alt=""
                                 class="img-fluid mb-4"
                                 style="height: 60px; width: 120px;"
                            >
                            <h4 class="mb-3 f-w-400">Sign In</h4>
                            <?php if(session()->getFlashdata('error')):?>
                                <div class="alert alert-danger"><?=session()->getFlashdata('error');?></div>
                            <?php endif;?>
                            <?php if(session()->getFlashdata('success')):?>
                                <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
                            <?php endif;?>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" class="form-control" id="Email" name="user_email" placeholder=""
                                       value="<?= set_value('user_email') ?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['user_email'] ?? null; ?></small>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder=""
                                       name="user_password">
                                <small id="input-help"
                                       class="form-text text-danger"><?= $validation['user_password'] ?? null; ?></small>
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                            </div>
                            <button class="btn btn-block btn-primary mb-4" role="submit">Signin</button>
                            <p class="mb-2 text-muted">Forgot password? <a href="<?= base_url('reset');?>" class="f-w-400">Reset</a></p>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="<?= base_url('signup');?>" class="f-w-400">Sign up</a></p>
                            <p class="mb-0 text-muted">Go <a href="<?= base_url();?>" class="f-w-400">Home</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->
<!-- Required Js -->
<script src="<?= base_url() ?>/assets/rp_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/ripple.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/pcoded.min.js"></script>
</body>
</html>

