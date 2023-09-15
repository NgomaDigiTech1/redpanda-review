<?= $this->extend("layouts/base")?>
<?= $this->section("content")?>

    <!-- content start -->
<?php if ($product_det ) :?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url();?>">Home</a></li>
                            <li class="active"><?= $produit['product_name'];?></li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white pinside30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="page-title"><?= $produit['product_name'];?>&nbsp;Details</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="btn-action">
                                    <a href="#!" class="btn btn-secondary">How To Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-content bg-white p-3 p-lg-5">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card-details">
                                <div class="card-head-sections">
                                    <div class="row align-items-center">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <!-- card listing -->
                                            <div class="card-img">
                                                <a href="#!">
                                                    <img
                                                        src="<?= base_url(). "./assets/rp_admin/images/product/" . $produit['product_image'] ?? "prod-anim.jpg";?>"

                                                        alt="img"
                                                    />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                            <h2 class="card-name">
                                                <a href="#!" class="title"><h3><strong><?= $produit['product_name'];?></strong></h3></a>
                                            </h2>
                                            <p>
                                                <?= $produit['product_description'];?>
                                            </p>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                            <a href="#!" class="btn btn-secondary btn-sm" onclick="history.back();">Back</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="st-tabs">
                                            <ul
                                                    class="nav nav-tabs flex-column flex-sm-row flex-md-row flex-lg-row"
                                                    id="myTab"
                                                    role="tablist"
                                            >
                                                <li class="nav-item">
                                                    <a
                                                            class="nav-link active"
                                                            id="tab-1"
                                                            data-toggle="tab"
                                                            href="#service1"
                                                            role="tab"
                                                            aria-controls="tab-1"
                                                            aria-selected="true"
                                                    >Categories</a
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                            class="nav-link"
                                                            id="tab-2"
                                                            data-toggle="tab"
                                                            href="#service2"
                                                            role="tab"
                                                            aria-controls="tab-2"
                                                            aria-selected="false"
                                                    >Characteristics & Features</a
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                            class="nav-link"
                                                            id="tab-3"
                                                            data-toggle="tab"
                                                            href="#service3"
                                                            role="tab"
                                                            aria-controls="tab-3"
                                                            aria-selected="false"
                                                    >Product Organisation</a
                                                    >
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div
                                                        class="tab-pane fade show active"
                                                        id="service1"
                                                        role="tabpanel"
                                                        aria-labelledby="tab-1"
                                                >
                                                    <h3>
                                                        Here are some categories of <?=$produit['product_name'];?>
                                                    </h3>
                                                    <ul class="listnone bullet bullet-check-circle-default">
                                                        <?php foreach ($produit->product_categories as $category): ?>
                                                            <li>
                                                                <?= $category;?>
                                                            </li>
                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>
                                                <div
                                                        class="tab-pane fade"
                                                        id="service2"
                                                        role="tabpanel"
                                                        aria-labelledby="tab-2"
                                                >
                                                    <h3>Characteristics & Features</h3>
                                                    <div class="fee-charges-table">
                                                        <ul class="list-group">
                                                            <?php foreach ($product_det->caracteristics as $characteristic => $charact): ?>
                                                                <?php if(($characteristic !== 'product_id') && ($characteristic !== 'conditions_content') && ($charact != null)) :?>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div
                                                                                class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"
                                                                        >
                                                                            <h5><?= ucfirst(str_replace('_', ' ',$characteristic)) ;?></h5>
                                                                        </div>
                                                                        <div
                                                                                class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"
                                                                        >
                                                                            <?= ucfirst($charact) ;?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div
                                                        class="tab-pane fade"
                                                        id="service3"
                                                        role="tabpanel"
                                                        aria-labelledby="tab-3"
                                                >
                                                    <h3>Organisation information</h3>
                                                    <ul>

                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div
                                                                        class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"
                                                                >
                                                                    <h5>Organisation</h5>
                                                                </div>
                                                                <div
                                                                        class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"
                                                                >
                                                                    <?= $org->org_name ?? $org->u_first_name;?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div
                                                                        class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"
                                                                >
                                                                    <h5>Address</h5>
                                                                </div>
                                                                <div
                                                                        class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"
                                                                >
                                                                    <?= $org['org_adress'] ?? 'Address';?>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div
                                                                        class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"
                                                                >
                                                                    <h5>Website</h5>
                                                                </div>
                                                                <div
                                                                        class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"
                                                                >
                                                                    <?= $org['org_website'] ?? 'Website';?>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- <h3>Our Sectors</h3>
                                                    <ul
                                                            class="listnone bullet bullet-check-circle-default"
                                                    >
                                                        <li>
                                                            </?= $product_det->org_secteur; ?>
                                                        </li>
                                                    </ul> -->

                                                </div>
                                            </div>
                                            <!-- Tab panes -->
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card listing -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else :?>
    <div class="alert alert-danger">No information found</div>
<?php endif;?>
    <!-- /.content end -->

<?= $this->endSection();?>