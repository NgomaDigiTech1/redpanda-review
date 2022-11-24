<?= $this->extend("layouts/base")?>
<?= $title ; ?>
<?= $this->section("content")?>
<?php
$page_session = \Config\Services::session();
?>

<div class="">
    <!-- content start -->
    <div class="hero-home-loan">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12">
                    <div class="request-form text-center">
                        <h2 class="form-title">Request Quote Now</h2>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert"">
                        Easy to apply for a request with us, once you have completed this form
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?= form_open('quotations/requesting', 'class="form-row"' );?>

                        <input  name="prod_id" type="hidden" value="<?= $key ?? set_value('prod_id') ?>" class="form-control input-md">
                        <input  name="prod_name" type="hidden" value="<?= $title ?? set_value('prod_name') ?>" class="form-control input-md">
                        <!-- Text input-->
                        <div class="form-group mb-1 col-md-6">
                            <input id="oc_first_name" name="cl_name" type="text" placeholder="Name" class="form-control input-md" value="<?= set_value('cl_name') ?>" >
                            <small id="input-help" class="form-text text-danger"><?= $validation['cl_name'] ?? null; ?></small>
                        </div>
                        <!-- Text input-->
                        <div class="form-group mb-1 col-md-6">
                            <input id="oc_email" name="cl_email" type="email" placeholder="Email" class="form-control input-md" value="<?= set_value('cl_email') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['cl_email'] ?? null; ?></small>
                        </div>
                        <!-- Text input-->
                        <div class="form-group mb-1 col-md-12">
                            <input id="oc_phone" name="cl_phone" type="tel" placeholder="Phone" class="form-control input-md" value="<?= set_value('cl_phone') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['cl_phone'] ?? null; ?></small>
                        </div>

                        <!-- Button -->
                        <div class="form-group mb-1 col-md-12 mt-4">
                            <button type="submit" class="btn btn-secondary btn-block">Send A Request</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content end -->


<?= $this->endSection("content")?>
