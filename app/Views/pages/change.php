<?php $user_data = session()->get('user_data');?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 18:12:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.jpg" />

    <!-- vendor css -->
	<link rel="icon" href="<?= base_url() ?>/assets/rp_admin/images/favicon.ico" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/rp_admin/css/style.css">
	


</head>

<div class="auth-wrapper">
	<div class="blur-bg-images"></div>
	<!-- [ change-password ] start -->
	<div class="auth-content">
		<div class="card">
			<?= form_open('change') ?>
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
                            <img src="<?= base_url()?>/assets/rp_website/images/tpb_logo_jpg.jpg" alt=""
                                 class="img-fluid mb-4"
                                 style="height: 60px; width: 120px;"
                            >
							<h4 class="mb-4 f-w-400">Change your password</h4>
							<div class="form-group mb-3">
                                <input type="hidden" name="u_email" value="<?= $user_data['u_email'] ;?>">
								<label class="floating-label" for="current_password">Current Password</label>
								<input type="password" class="form-control" placeholder="" name="current_password" value="<?=set_value('current_password');?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['current_password'] ?? null; ?></small>
							</div>
							<div class="form-group mb-3">
								<label class="floating-label" for="new_Password">New Password</label>
								<input type="password" class="form-control" name="new_password" placeholder="" value="<?= set_value('new_password');?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['new_password'] ?? null; ?></small>
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="conf_new_password">Re-Type New Password</label>
								<input type="password" class="form-control" name="conf_new_password" placeholder="" value="<?= set_value('conf_new_password');?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['conf_new_password'] ?? null; ?></small>
                            </div>
							<button class="btn btn-block btn-primary mb-4">Change password</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- [ change-password ] end -->
</div>

<!-- Required Js -->
<script src="<?= base_url() ?>/assets/rp_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/ripple.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/pcoded.min.js"></script>



</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 18:12:44 GMT -->
</html>
