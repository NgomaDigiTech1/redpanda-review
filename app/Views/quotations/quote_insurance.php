<?= $this->extend("layouts/base")?>
<?= $this->section("title")?>
<?= $title;?>
<?= $this->endSection("title")?>
<?= $this->section("content")?>
<?php $client_data = session()->get('client_data');?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url();?>">Home</a></li>
                            <li class="active"><?= ucfirst($title)  ?> Listing</li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <div class="bg-white pinside30">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h1 class="page-title"><?= ucfirst($title) ?> Listing</h1>
                            </div>
<!--                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">-->
<!--                                <div class="btn-action"> <a href="#!" class="btn btn-secondary">How To Apply</a> </div>-->
<!--                            </div>-->
                        </div>
                    </div>
<!--                    <div class="sub-nav" id="sub-nav">-->
<!--                        <ul class="nav nav-justified">-->
<!--                            <li class="nav-item">-->
<!--                                <a href="#" class="nav-link">Give me call back</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a href="#!" class="nav-link">Emi Caculator</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- content start -->
    <div class="container">
        <div class="container">
            <?php if(!$products):?>
                <div class="alert alert-warning text-center my-5">
                    <p>There ain't yet specific products for this sector</p>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="wrapper-content bg-white p-lg-4 p-3">
                        <div class="row">
                            <?php foreach ($products as $product):?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="lender-listing">
                                        <!-- lender listing -->
                                        <div class="lender-head">
                                            <div class="lender-logo">
                                                <img
                                                        src="<?= base_url(). "./assets/rp_admin/images/user/" . $product['org_picture'] ?? "org.jpg" ;?>"
                                                        alt="<?= $product->org_name; ?>"
                                                />
                                            </div>
                                            <div class="lender-reviews">
                                                <h4><?= $product->org_name; ?></h4>
                                            </div>
                                        </div>
                                        <div class="lender-rate-box">
                                            <!--
                                            <div class="lender-ads-rate">
                                                <small>Advertised Rate</small>
                                                <h3 class="lender-rate-value">3.74%</h3>
                                            </div>
                                            <div class="lender-compare-rate">
                                                <small>Comparison Rate* </small>
                                                <h3 class="lender-rate-value">5.74%</h3>
                                            </div>
                                             -->
                                            <img
                                                    src="<?= base_url(). "./assets/rp_admin/images/product/" . $product['product_image'] ?? "org.jpg" ;?>"
                                                    alt="<?= $product->org_name; ?>"
                                            />

                                        </div>

                                        <!-- Testing Characteristics here -->

                                            <div class="fee-charges-table">
                                                <ul class="list-group">
                                                        <?php foreach ($product->caracteristics['requires'] as $caracteristic => $caract): ?>
                                                            <?php if(($caracteristic !== 'product_id') && ($caracteristic !== 'conditions_content') && ($caract !== '')) :?>
                                                                <li class="list-group-item">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <h5><i><?= ucfirst(str_replace('_', ' ', $caracteristic)) ;?></i></h5>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: right">
                                                                        <?= ucfirst($caract) ;?>
                                                                    </div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                </ul>
                                            </div>
                                   
                                         -->
                                        <!-- End Testing -->
                                        <div class="lender-actions">
                                            <!--  <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#modal_devis">Apply now</button>-->
                                            <?=form_open('quotations/applyHome')?>
                                            <div class="btn-action">
                                                <input type="hidden" name="prod_name" id="prod_name" value="<?= $title ;?>">
                                                <input type="hidden" name="oc_email" id="oc_email" value="<?= $client_data['oc_email'] ;?>">
                                                <input type="hidden" name="quotation_id" id="quotation_id" value="<?= $client_data['quotation_id'] ;?>">
                                                <input type="hidden" name="org_name" id="org_name" value="<?= $product->org_name; ?>">
                                                <input type="hidden" name="prod_sect" id="prod_sect" value="<?= $product->org_secteur; ?>">
                                                <input type="hidden" name="org_email" id="org_email" value="<?= $product->org_email ?? ""; ?>">
                                                <input type="hidden" name="product_image" id="product_image" value="<?= $product->product_image ?? ""; ?>">
                                                <button type="submit" class="btn btn-secondary btn-block">Select</button>
                                            </div>
                                            <?= form_close()?>
                                            <!--<a href="#" class="btn btn-secondary btn-block">Apply now</a> -->
                                            <a href="<?= base_url()?>/sectors/productDetails/<?=$product->product_id;?>" class="btn-link">More Informations</a>
                                            <!-- <a href="<?= base_url()?>/quotations/openDevis/<?=$product->product_id;?>" class="btn-link">Open Devis</a> -->
                                        </div>
                                    </div>
                                    <!-- /.lender listing -->
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>

    </div>
    <!-- /.content end -->

<?= $this->endSection()?>