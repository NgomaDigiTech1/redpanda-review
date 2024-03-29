<?= $this->extend("layouts/base")?>

<?= $this->section("content")?>
<div class=" ">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside60">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="error-img mb60">
                                <img src="<?=base_url()?>/assets/rp_website/images/error-img.png" class="" alt="Borrow - Loan Company Responsive Website Templates">
                            </div>
                            <div class="error-ctn text-center">
                                <h2 class="msg">Sorry</h2>
                                <h1 class="error-title mb40">404, Page Not Found</h1>
                                <p class="mb40">The webpage you were trying to reach could not be found on the server, or that you typed in the URL incorrectly.</p>
                                <a href="<?=base_url()?>" class="btn btn-secondary text-center">go to homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->
<?= $this->endSection()?>