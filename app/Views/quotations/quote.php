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
                            <li><?= ucfirst($title)  ?> Listing</li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <div class="bg-white pinside30">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h1 class="page-title"><?= ucfirst($title) ?> Listing</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content start -->
    <div class="container">
        <div class="container">
            <?php if(!$products):?>
                <div class="alert alert-warning my-5 text-center">
                    <p>There ain't specific products for this product</p>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="wrapper-content bg-white p-lg-4 p-3" style="margin-bottom: 20px !important;">
                        <div class="row justify-content-center ">
                            <?php foreach ($products as $product):?>
                                <?php
                                    $produit = (new App\Models\ProductModel)->getProduct($product->product_id);                                               
                                    $org = (new App\Models\UserModel)->getUserById($product->org_id);                                               
                                ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="lender-listing">
                                        <!-- lender listing -->
                                        <div class="lender-head">
                                            <div class="lender-logo">
                                                <img
                                                        src="<?= base_url(). "./assets/rp_admin/images/product/" . $produit['product_image'] ;?>"
                                                        alt="<?= $org->org_name ?? 'Org';?>"
                                                />
                                            </div>
                                            <div class="lender-reviews">
                                                <h4><?= $org->org_name ?? 'Org';?></h4>
                                            </div>
                                        </div>
                                        <div class="lender-rate-box">                                            
                                            <img
                                                src="<?= base_url(). "./assets/rp_admin/images/user/" . $org['u_photo'] ?? "org.jpg" ;?>"
                                                alt="<?= $org->org_name; ?>"
                                                class="img-fluid"
                                                style="height: 160px !important;width: 100% !important;"
                                            />
                                        </div>

                                        <!-- Testing Characteristics here -->

                                            <div class="fee-charges-table">
                                                <ul class="list-group">
                                                        <?php foreach ($product->caracteristics as $key => $caract): ?>
                                                            <!-- </?php if(($caracteristic !== 'product_id') && ($caracteristic !== 'conditions_content') && ($caract !== '')) :?> -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                            <h5><?= ucfirst(str_replace('_', ' ', $key)) ;?></h5>
                                                                        </div>
                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: right">
                                                                            <?= ucfirst($caract) ;?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <!-- </?php endif; ?> -->
                                                        <?php endforeach; ?>
                                                </ul>
                                            </div>

                                        <!-- End Testing -->
                                        <div class="lender-actions">
                                            <!--  <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#modal_devis">Apply now</button>-->
                                            <?=form_open('quotations/applyNow')?>
                                                <div class="btn-action">
                                                    <input type="hidden" name="prod_name" id="prod_name" value="</?= $title ;?>">
                                                    <input type="hidden" name="oc_email" id="oc_email" value="</?= $client_data['oc_email'] ;?>">
                                                    <input type="hidden" name="quotation_id" id="quotation_id" value="</?= $client_data['quotation_id'] ;?>">
                                                    <input type="hidden" name="org_name" id="org_name" value="</?= $product->org_name; ?>">
                                                    <input type="hidden" name="prod_sect" id="prod_sect" value="</?= $product->org_secteur; ?>">
                                                    <input type="hidden" name="product_image" id="product_image" value="</?= $product->product_image;?> ">
                                                    <input type="hidden" name="org_email" id="org_email" value="</?= $product->org_email ;?>">
                                                    <button type="submit" class="btn btn-secondary btn-block">Select</button>
                                                </div>
                                            <?= form_close()?>
                                            <!--<a href="#" class="btn btn-secondary btn-block">Apply now</a> -->
                                            <a href="<?= base_url()?>/product-details/<?=$produit->_id;?>/<?=$produit->product_name;?>" class="btn-link">More Informations</a>
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