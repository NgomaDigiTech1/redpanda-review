<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>

<style>
    .produit img {
        width: 253px;
        height: 160px;
        object-fit: cover;
    }
</style>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li class="">All Products</li>
                    </ol>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30 text-center">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h1 class="page-title">Listing All Products</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- content start -->
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="wrapper-content bg-white p-3 p-lg-5">
                <div class="container" style="display: block">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                        <?= form_open("products/allProducts", "id='search-products'") ?>
                        <div class="">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="search">Search<span class=" "> </span></label>
                                        <input id="searcher" name="search" type="text" placeholder="Type the name of a product" class="form-control input-md" value="<?= set_value('search') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                        <p style="text-align: center">Here is the list of all the products and services provided on our platform Red Panda Prices. Click on one product to make a request of quote</p>
                    </div>
                </div>
                <?php if ($products) : ?>
                    <div id="lists">
                        <?php foreach ($products as $product) : ?>

                            <?php $produit = (new App\Models\ProductModel)->getProduct($product->_id);?>

                            <div class="row mb-3 border no-gutters"">
                                <div class=" col-12 col-lg-3 col-md-3 produit d-flex align-items-center p-0 justify-content-center">

                                    <?php if ($product->product_slug === 'home-insurance') : ?>

                                        <a href="<?= base_url() ?>/load-home/<?= $product->product_slug; ?>">
                                            <img src="<?= base_url() . "./assets/rp_admin/images/product/" . $product['product_image']; ?>" alt="<?= $product->product_name; ?>">
                                        </a>

                                    <?php elseif ($product->product_slug === 'car-insurance') : ?>

                                        <a href="<?= base_url() ?>/load-car/<?= $product->product_slug; ?>">
                                            <img src="<?= base_url() . "./assets/rp_admin/images/product/" . $product['product_image']; ?>" alt="<?= $product->product_name; ?>">
                                        </a>

                                    <?php else : ?>

                                        <a href="<?= base_url() ?>/load-request/<?= $product->product_slug; ?>">
                                            <img src="<?= base_url() . "./assets/rp_admin/images/product/" . $product['product_image']; ?>" alt="<?= $product->product_name; ?>" style="height:120px !important; object-fit:cover">
                                        </a>

                                    <?php endif; ?>

                                </div>
                                <div class="p-4 col-12 col-lg-9 col-md-9 border-left ml-n1">
                                    <?php if ($product->product_slug === 'home-insurance') : ?>

                                        <a href="<?= base_url() ?>/load-home/<?= $product->product_slug; ?>">
                                            <h4 class="mb-3"><?= ucfirst($product['product_name']); ?></h4>
                                        </a>

                                    <?php elseif ($product->product_slug === 'car-insurance') : ?>

                                        <a href="<?= base_url() ?>/load-car/<?= $product->product_slug; ?>">
                                            <h4 class="mb-3"><?= ucfirst($product['product_name']); ?></h4>
                                        </a>

                                    <?php else : ?>

                                        <a href="<?= base_url() ?>/load-request/<?= $product->product_slug; ?>">
                                            <h4 class="mb-3"><?= ucfirst($product['product_name']); ?></h4>
                                        </a>

                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="font-12">
                                                <p class="mb-1"><span class="font-weight-bold mr-1 text-dark">
                                                        Sector :
                                                        <?php
                                                        $sect = (new App\Controllers\Products)->getSectorsProduct($product->_id);
                                                        echo (implode(', ', $sect));
                                                        ?>
                                                </p>
                                                <!-- <p class="mb-1"><span class="font-weight-bold mr-1 text-dark">Status : </span></?= ucfirst($product['product_status'])?></p> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-12">
                                            <div class="font-12">
                                                <h5 class="font-weight-bold mt-3 text-dark">Categories</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-12">
                                            <div class="font-12">
                                                <?php foreach ($product['product_categories'] as $key => $category) : ?>
                                                    <p class="mb-1"><?= ucfirst($category) ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->
<?= $this->include('products/filterJs'); ?>
<?= $this->endSection(); ?>