<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
<?php helper('form')?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Products</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/products">List product</a></li>
                            <li class="breadcrumb-item"><a href="#!">Add Image</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?= $product['product_name'] ?? "Product"?></h5>
                    </div>
                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" style="border:1px solid dodgerblue  ;background-color:transparent;elevation:20deg; border-radius: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <div class="card-body">
                        <?= form_open_multipart('products/saveImage') ?>
                            <input type="hidden" name="product_name" value="<?= $product["product_name"] ?? set_value('product_name') ?>">
                            <input type="hidden" name="product_id" value="<?= $product["_id"] ?? set_value('_id') ?>">
                            <div class="row text-c">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="product_image">
                                    </div>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['product_image'] ?? null; ?></small>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-icon btn-primary has-ripple"><i class="feather icon-check"></i></button>
                                </div>
                            </div>
                        <?= form_close()?>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
