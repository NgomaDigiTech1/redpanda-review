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
                                                        src="<?= base_url(). "./assets/rp_admin/images/user/" . $org['u_photo'] ;?>"
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
                                                    <?php if(($key !== 'model') && ($key !== 'mfg_year') && ($key !== '') && ($key !== 'colors') &&($key !== 'conditions_content')) :?>
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
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <li class="list-group-item">
                                                    <div class="row">                                                                   
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <h5>Color</h5>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: right">
                                                            <select name="color" id="" class="nice-select wide" required style="height: 50px; line-height:20px !important;">
                                                                <option value="" >Selet Color</option>
                                                                <?php foreach ($product->colors as $col):?>
                                                                    <option value="<?=$col?>" <?=set_select("color", $col);?>><?=$col?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>                                                            
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">                                                                   
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                            <h5>Mfg Year</h5>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: right">
                                                            <select name="year" id="year" class="nice-select wide" required style="height: 50px; line-height:20px !important;">
                                                                <option value="" >Selet Year</option>
                                                                <?php $i = 0?>
                                                                <?php foreach ($product->mfg_year as $yr):?>
                                                                    <option value="<?=$yr?>" <?=set_select("color", $yr);?> onclick="getPrice(this.dataset.year)"><?=$yr?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>                                                            
                                                </li>
                                                <li class="nav-item" style="list-style:none">
                                                    <a class="nav-link active" id="tab-2" data-toggle="tab" href="#service2" role="tab" aria-controls="service2" aria-selected="true"><i class="fa fa-credit-card fa-lg"></i>
                                                        <p>Business</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- End Testing -->
                                        <div class="lender-actions">
                                            <!--  <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#modal_devis">Apply now</button>-->
                                            <!-- </?=form_open('quotations/applyNow')?> -->
                                            <?=form_open('','id="myForm"')?>
                                                <div class="btn-action">
                                                    <input type="hidden" name="prod_name" id="prod_name" value="<?= $produit->product_name;?>">
                                                    <input type="hidden" name="org_name" id="org_name" value="<?= $org->org_name; ?>">
                                                    <input type="hidden" name="product_image" id="product_image" value="<?= $produit->product_image;?> ">
                                                    <input type="hidden" name="org_email" id="org_email" value="<?= $org->u_email ;?>">
                                                    <button type="submit" class="btn btn-secondary btn-block" id="btn_submit">Select</button>
                                                </div>
                                            <?= form_close()?>
                                            <!--<a href="#" class="btn btn-secondary btn-block">Apply now</a> -->
                                            <a href="<?= base_url()?>/details-product/<?=$produit->_id;?>/<?=$product->org_id;?>/<?= ucfirst($title)  ?> " class="btn-link">More Informations</a>
                                            <!-- <a href="</?= base_url()?>/quotations/openDevis/</?=$product->product_id;?>" class="btn-link">Open Devis</a> -->
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

    <script>
        function getPrice(cont){
            const el = document.querySelector('data-year');
            console.log(el.dataset.datayear);
        }
    </script>
<?= $this->endSection()?>