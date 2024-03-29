<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 18:12:44 GMT -->
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
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.ico" />
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/rp_admin/css/style.css">

</head>

<div class="auth-wrapper">
	<!-- [ reset-password ] start -->
	<div class="auth-content">
		<div class="card">
			<?= form_open('reset') ?>
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
                            <img src="<?= base_url()?>/assets/rp_website/images/tpb_logo_jpg.jpg" alt=""
                                 class="img-fluid mb-4"
                                 style="height: 60px; width: 120px;"
                            >
							<h4 class="mb-3 f-w-400">Reset your password</h4>
							<div class="form-group mb-4">
								<label class="floating-label" for="Email">Email address</label>
								<input type="email" class="form-control" name="Email" name="user_email" value = "<?= $user_data->u_email ?? ""?>">
							</div>
							<button class="btn btn-block btn-primary mb-4">Reset password</button>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
	<!-- [ reset-password ] end -->
</div>

<!-- Required Js -->
<script src="<?= base_url() ?>/assets/rp_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/ripple.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/pcoded.min.js"></script>



</body>

</html>