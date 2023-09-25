<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>
<?php $client_data = session()->get('client_data'); ?>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?= site_url() ?>">Home</a></li>
                    <li class="active text-light">Compare <?= ucfirst($title) ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-space20">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <h1 class="text-bold">
                        Compare the <?= ucfirst($title) ?>
                    </h1>
                    <p>
                        Want to check <?= ucfirst($title) ?> ?
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pdb40 compare-student-loan-table">
    <div class="container">
        <?php if (!$products) : ?>
            <div class="alert alert-warning text-center my-5">
                <p>There ain't yet specific products for this sector</p>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 18%;" class="lender-tag">Enterprise</th>
                                    <th style="width: 19%;" class="fixed-text">Price</th>
                                    <th style="width: 19%;" class="variable-apr">
                                        Variable APR
                                    </th>
                                    <th style="width: 17%;" class="terms">Terms(years)</th>
                                    <th class="action"></th>
                                </tr>
                            </thead>
                            <?php foreach ($products as $product) : ?>
                                <?php
                                $org = (new App\Models\UserModel)->getUserById($product->org_id);
                                $produit = (new App\Models\ProductModel)->getProduct($product->product_id);
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url() . "./assets/rp_admin/images/product/" . $produit['product_image'] ?? "org.jpg"; ?>" class="img-fluid" />
                                        </td>
                                        <td>
                                            <h3 class="compare-student-loan-title">
                                                <?= $product->price; ?> $
                                            </h3>
                                            <small>Fixed APR</small>
                                        </td>
                                        <td>
                                            <h3 class="compare-student-loan-title">2.63% - 7.70%</h3>
                                            <small>Variable APR</small>
                                        </td>
                                        <td>
                                            <h3 class="compare-student-loan-title">5,7,10,15,20</h3>
                                            <small>Terms(Years)</small>
                                        </td>
                                        <td class="text-center">
                                            <?= form_open('apply-insurance') ?>
                                            <div class="btn-action" style="text-align: unset;">
                                                <input type="hidden" name="prod_name" id="prod_name" value="<?= $client_data['oc_product']; ?>" readonly>
                                                <input type="hidden" name="oc_email" id="oc_email" value="<?= $client_data['oc_email']; ?>" readonly>
                                                <input type="hidden" name="quotation_id" id="quotation_id" value="<?= $client_data['quotation_id']; ?>" readonly>
                                                <input type="hidden" name="org_name" id="org_name" value="<?= $org->org_name ?? $u_first_name; ?>" readonly>
                                                <input type="hidden" name="prod_sect" id="prod_sect" value="<?= $client_data['oc_sector']; ?>" readonly>
                                                <input type="hidden" name="org_email" id="org_email" value="<?= $org->u_email; ?>" readonly>
                                                <input type="hidden" name="price" id="price" value="<?= $product->price; ?>">
                                                <button type="submit" class="btn btn-secondary btn-sm mb5">Select</button>
                                            </div>
                                            <?= form_close() ?>
                                            <div class="mt10">
                                                <a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample<?= $produit->_id; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    Expand Details
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="expandable-info">
                                            <div class="collapse expandable-collapse" id="collapseExample<?= $produit->_id; ?>">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <!-- <div class="">
                                                            <h3 class="mb20">What we like</h3>
                                                            <ul class="bullet bullet-check-circle list-unstyled">
                                                                <li>
                                                                    Refinancing and consolidation of private and
                                                                    federal student loans
                                                                </li>
                                                                <li>
                                                                    Unemployment protection – loan payments are
                                                                    paused and they help find new job
                                                                </li>
                                                                <li>
                                                                    Access to member perks including exclusive
                                                                    events, SoFi wealth advisors, and career
                                                                    planning
                                                                </li>
                                                                <li>
                                                                    Zero application, origination, or prepayment
                                                                    fees
                                                                </li>
                                                            </ul>
                                                        </div> -->
                                                        <div class="mt30">
                                                            <h4 class="mb5">Conditions</h4>
                                                            <p>
                                                                <?= $produit->product_description ?? ''; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <ul class="list-group">
                                                            <?php foreach ($product->caracteristics as $caracteristic => $caract) : ?>
                                                                
                                                                <?php if (($caracteristic !== 'product_id') && ($caracteristic !== 'conditions_content') && ($caract !== '')) : ?>
                                                                    <li class="list-group-item">
                                                                        <?= ucfirst(str_replace('_', ' ', $caracteristic)) ;?>
                                                                        <span class="float-right"><?= ucfirst($caract) ;?></span>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>