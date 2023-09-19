<?= $this->extend("layouts/base")?>
<?= $title ?>
<?= $this->section("content")?>


<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div>

    <?php if($prod_sectors) {?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30 text-center">
                    <h2 class="text-bold">These are products for <?= ucfirst($title); ?> Sector</h2>
                    <p class="lead">Here are different organisations offering products in this sector </p>
                    <p>Just click on the view request button to see the quotes</p>
                </div>
            </div>
        </div>
    <?php }?>
</div>

<!-- content start -->
<div class="pdb40 compare-table">
    <div class="container">
        <div class="row justify-content-center ">
            <?php if(!$prod_sectors) :?>
                <div class="alert alert-info">
                    <p>The sector <strong><?= ucfirst($title) ; ?> </strong> hasn't yet got products ... Please  check another one or come later !</p>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm mb5">Home</a>
                    <a href="#!" class="btn btn-outline-success btn-sm mb5" onclick="history.back();">Back</a>
                </div>
            <?php else:?>
                <?php if(count($prod_sectors) == 1) :?>
                    <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <p><?= count($prod_sectors) ; ?> <strong> result </strong> matches</p>
                    </div>
                <?php else:?>
                    <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <p><?= count($prod_sectors) ; ?> <strong> results </strong> match</p>
                    </div>
                <?php endif;?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:20%;t ext-align: center" class="card-tag">Product</th>
                                        <th style="width:20%;" class="card-name">Product Name</th>
                                        <th style="width:20%; text-align: center;" class="anuual-fees">Organisations</th>
                                        <th class="reward-rate">Rewards Rate </th>
                                        <th class="action"></th>
                                    </tr>
                                </thead>
                                
                                <?php foreach($prod_sectors as $item) :?>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 8px">

                                                <?php if(isset($item->product_slug) && ($item->product_slug === 'home-insurance')) : ?>

                                                    <a href="<?= base_url() ?>/load-home/<?=$item->product_slug;?>">

                                                    <img
                                                        src="<?= base_url()?>/assets/rp_admin/images/product/<?= $item['product_image'];?>"
                                                        alt="img"
                                                        style="width: 180px;height: 120px"
                                                        class="img-fluid"
                                                    />
                                                <?php elseif(isset($item->product_slug) && ($item->product_slug === 'car-insurance')) : ?>

                                                    <a href="<?= base_url() ?>/load-car/<?=$item->product_slug;?>">
                                                        <img
                                                            src="<?= base_url()?>/assets/rp_admin/images/product/<?= $item['product_image'];?>"
                                                            alt="product-image"
                                                            style="width: 180px;height: 120px"
                                                            class="img-fluid"
                                                        >
                                                    </a>

                                                <?php else: ?>

                                                    <a href="<?= base_url() ?>/load-request/<?=$item->product_slug;?>">
                                                        <img
                                                            src="<?= base_url(). "./assets/rp_admin/images/product/" . $item['product_image'];?>"
                                                            alt="<?=$item->product_name;?>"
                                                            style="width: 180px;height: 120px"
                                                            class="img-fluid"
                                                        >
                                                    </a>

                                                <?php endif;?>
                                            </td>
                                            <td style="padding: 8px">

                                                <?php if($item->product_slug === 'home-insurance') : ?>
                                                    <a href="<?= base_url() ?>/load-home/<?=$item->product_slug;?>"><h4 class="mb-3"><?= ucfirst($item['product_name']);?></h4></a>
                                                <?php elseif($item->product_slug === 'car-insurance') : ?>
                                                    <a href="<?= base_url() ?>/load-car/<?=$item->product_slug;?>"><h4 class="mb-3"><?= ucfirst($item['product_name']);?></h4></a>
                                                <?php else: ?>
                                                    <a href="<?= base_url() ?>/load-request/<?=$item->product_slug;?>" ><h4 class="mb-3"><?= ucfirst($item['product_name']);?></h4></a>
                                                <?php endif;?>

                                                <input type="hidden" name="product_name" value="<?=$item->product_name;?>">
                                                <input type="hidden" name="product_id" value="<?=$item->_id;?>">
                                                <div class="icon rate-done mb10">
                                                    <?php for($i = 0; $i < rand(1,4); $i++) :?>
                                                        <i class="fa fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            </td>
                                            <td style="padding:8px; text-align: center;" class="text-dark text-bold">
                                                <?= (new App\Controllers\Sectors)->countOrg((string)$item->_id);?>                                               
                                            </td>
                                            <td style="padding:8px; text-align: center;" class="text-dark text-bold"><?= rand(5, 20);?> %</td>
                                            <td style="padding:8px" class="text-center">

                                                <div class="mt10" >
                                                    <a
                                                        class="btn-link"
                                                        id="example-one"
                                                        data-text-swap="Hide Details"
                                                        data-text-original="Expand Details"
                                                        data-toggle="collapse"
                                                        href="#collapseExample<?=$item->_id;?>"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExample<?=$item->_id;?>"
                                                    >
                                                       <span  style="font-size: 14px;">Description</span>
                                                    </a>
                                                </div>
                                                <br>
                                                <span><blink>Select to see all the offers</blink></span><br><br>
                                                
                                                <?php if($item->product_slug === 'home-insurance') : ?>
                                                    <a href="<?= base_url() ?>/load-home/<?=$item->product_slug;?>" class="btn btn-secondary btn-sm mb5">Select</a>
                                                <?php elseif($item->product_slug === 'car-insurance') : ?>
                                                    <a href="<?= base_url() ?>/load-car/<?=$item->product_slug;?>" class="btn btn-secondary btn-sm mb5">Select</a>
                                                <?php else: ?>
                                                    <button class="btn btn-secondary btn-sm mb5" data-toggle="modal" data-target="#modal<?=$item->product_slug;?>">View quotes</button> 
                                                    <a href="<?= base_url() ?>/load-request/<?=$item->product_slug;?>" class="btn btn-secondary btn-sm mb5">Select</a>
                                                <?php endif;?>

                                            </td>
                                        </tr>
                                        <tr>
                                        <td colspan="12" class="expandable-info">
                                            <div class="collapse expandable-collapse" id="collapseExample<?=$item->_id;?>">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <h4 class="mb20">Product Description</h4>
                                                                <p style="font-size: 14px; line-height: 24px; color: #778191; text-align: justify"><?= $item->product_description?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <h4 class="mb20">Categories</h4>
                                                                <ul class="bullet bullet-check-circle list-unstyled">
                                                                    <?php foreach ($item['product_categories'] as $category):?>
                                                                        <li><?=$category;?></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <h4 class="mb20">General Characteristics</h4>
                                                                <ul class="bullet bullet-check-circle list-unstyled">
                                                                    <?php foreach ($item['caracteristics']['required'] as $characteristic => $charact):?>
                                                                        <li><?=$charact;?></li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                    <!-- Here is the Popup modal for requesting a quote -->
                                    <div class="modal fade" id="modal<?=$item->product_slug;?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Register in order to do a request</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">                                                    
                                                    <?= form_open('quotations/registerRequest') ?>
                                                        <input type="text" class="form-control" value="<?= $item->product_slug ;?>" name = "oc_prod_name">
                                                        <input type="text" class="form-control" value="<?= $item->_id ;?>" name = "prod_id">
                                                        <!-- <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <Select id="title" class="form-control" style="height: 38px !important;" name="oc_title"  >
                                                                <option value="">Select your title</option>
                                                                <option value="Mr" <?= set_select('oc_title', 'Mr') ?>>Mr</option>
                                                                <option value="Mme" <?= set_select('oc_title', 'Mme') ?>>Mme</option>
                                                                <option value="Ms <?= set_select('oc_title', 'Mrs') ?>">Mrs</option>
                                                            </Select>
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_title'] ?? null; ?></small>
                                                        </div> -->

                                                        <div class="form-group">
                                                            <label for="oc_first_name">First Name</label>
                                                            <input type="text" id="firstname" class="form-control" style="height: 38px !important;" value="<?= set_value('oc_first_name') ?>" name="oc_first_name"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_first_name'] ?? null; ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="oc_last_name">Last Name</label>
                                                            <input type="text" id="lastname" class="form-control" style="height: 38px !important;" name="oc_last_name" value="<?= set_value('oc_last_name') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_last_name'] ?? null; ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="oc_email">Email</label>
                                                            <input type="email" id="email" class="form-control" style="height: 38px !important;" name="oc_email" value="<?= set_value('oc_email') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_email'] ?? null; ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="oc_phone">Telephone</label>
                                                            <input type="tel" id="phone" class="form-control" style="height: 38px !important;" name="oc_phone" value="<?= set_value('oc_phone') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_phone'] ?? null; ?></small>
                                                        </div>

                                                        <!-- <div class="form-group">
                                                            <label for="oc_phys_add_one">Physical Address 1</label>
                                                            <input type="text" id="physical" class="form-control" style="height: 38px !important;" name="oc_phys_add_one" value="<?= set_value('oc_phys_add_one') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_phys_add_one'] ?? null; ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="oc_town">Town</label>
                                                            <input type="text" id="town" class="form-control" style="height: 38px !important;" name="oc_town" value="<?= set_value('oc_town') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_town'] ?? null; ?></small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="oc_country">Country</label>
                                                            <input type="text" id="country" class="form-control" style="height: 38px !important;" name="oc_country" value="<?= set_value('oc_country') ?>"  >
                                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_country'] ?? null; ?></small>
                                                        </div> -->

                                                        <div class="btn-action">
                                                            <button type="submit" class="btn btn-secondary">Submit</button>
                                                            <!--    <a href=" <?= base_url() ?>/quotations/quote/<?= $item->product_name;?>" class="btn btn-secondary btn-sm mb5">Submit</a> -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Popup -->
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>

            <?php endif;?>

        </div>
    </div>
</div>
<!-- /.content end -->

<?= $this->endSection()?>