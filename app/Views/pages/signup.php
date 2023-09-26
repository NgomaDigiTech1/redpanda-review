<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title><?= $title ?? "Red panda prices" ?></title>
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
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/rp_website/images/favicon.jpg" />
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/rp_admin/css/style.css">
</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<?= form_open("signup")?>
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
							<img src="<?= base_url()?>/assets/rp_website/images/tpb_logo_jpg.jpg" alt=""
                                 class="img-fluid mb-4"
                                 style="height: 60px; width: 120px;"
                            >
							<h4 class="mb-3 f-w-400">Sign Up</h4>

                            <div class="form-group mb-3">
                                <label class="floating-label" for="u_first_name">Name</label>
                                <input type="text" class="form-control" id="u_first_name" name="u_first_name" placeholder="" value="<?= set_value('u_first_name') ?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['u_first_name'] ?? null; ?></small>
                            </div>

							<div class="form-group mb-3">
								<label class="floating-label" for="Email">Email address</label>
								<input type="email" class="form-control" id="Email" name="user_email" placeholder="" value="<?= set_value('user_email') ?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['user_email'] ?? null; ?></small>
                            </div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" id="Password" name="user_password" placeholder="" value="<?= set_value('user_password') ?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['user_password'] ?? null; ?></small>
                            </div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Conf_Password">Confirm Password</label>
								<input type="password" class="form-control" id="Conf_Password" name="conf_password" placeholder="" value="<?= set_value('conf_password') ?>">
                                <small id="input-help" class="form-text text-danger"><?= $validation['conf_password'] ?? null; ?></small>
                            </div>
                        <div class="checkbox-card">
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input check_me" id="customCheck1" name="u_checkbox">
                                <label class="custom-control-label" for="customCheck1">I'm an <strong><i>Organisation</i></strong>&nbsp;(Don't check if not)</label>
                            </div>
                            <div style="display: none" class="supplier_field">
                                <div class="form-group">
                                    <label class="floating-label" for="org_name">Organisation Name</label>
                                    <input type="text" class="form-control " id="org_name" name="org_name" placeholder="" value="<?= set_value('org_name') ?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['org_name'] ?? null; ?></small>
                                </div>
                                <div  class="form-group">
                                    <label class="org_address" for="org_address"></label>
                                    <textarea class="form-control " id="org_adress" name="org_adress" placeholder="Type your full organisation address here !" value="<?= set_value('org_address') ?>"></textarea>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['org_adress'] ?? null; ?></small>
                                </div>
                            </div>
                        </div>
							<button class="btn btn-primary btn-block mb-4">Sign up</button>
							<p class="mb-2">Already have an account? <a href="<?= base_url('login');?>" class="f-w-400">Sign in</a></p>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="<?= base_url() ?>/assets/rp_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/ripple.js"></script>
<script src="<?= base_url() ?>/assets/rp_admin/js/pcoded.min.js"></script>
<script type="text/javascript">
    //Activate or deactivate supplier fields on signup form

    $(function(){
        $('.check_me').click(function (){
            var x = $(this).is(':checked');
            if(x == true){
                $('.supplier_field').fadeIn(1500);
            }else{
                $('.supplier_field').fadeOut(1500);
            }
        });
    })
</script>

</body>
</html>