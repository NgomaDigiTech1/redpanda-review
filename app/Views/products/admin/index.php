<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>

<style>
    .filterDiv {
        display: none; /* Hidden by default */
    }
    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }
</style>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5>Products List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Products List</a></li>
                            <?php if ($user_data->u_role === 'admin'):?>
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/products/create">Create New product</a>
                            <?php endif;?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
    <?php if ($user_data->u_role === 'admin'):?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <div class="col-md-12">
                                <div class="alert-warning">
                                <?php if(session()->getFlashdata('error')):?>
                                    <div class="alert alert-danger"><?=session()->getFlashdata('error');?></div>
                                <?php endif;?>
                                <?php if(session()->getFlashdata('success')):?>
                                    <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
                                <?php endif;?>
                            </div>
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <!-- <th>Description</th> -->
                                    <th>Categories</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if ($products): ?>
                                        <?php foreach ($products as $row): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="<?=base_url()?>/assets/rp_admin/images/product/<?= $row->product_image ?? "" ?>" alt="<?= $row->product_name ?? "" ?>" class="img-radius align-top m-r-15" style="width:40px;">
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0"><?= $row->product_name ?? "" ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        $sect = (new App\Controllers\Products)->getSectorsProduct($row['_id']);
                                                        echo (implode(', ', $sect));
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php
                                                        $cat = '';
                                                        foreach ($row->product_categories as $categories){
                                                            $cat .= $categories .', ' ;
                                                        }
                                                        echo substr($cat, 0, 30) ;
                                                    ?>

                                                </td>
                                                <td colspan="2">
                                                    <?php if (isset($row->product_status)): ?>
                                                        <?php if ( $row->product_status == 'disable'): ?>
                                                            <span class="badge badge-light-danger">Disabled</span>
                                                        <?php else :?>
                                                            <span class="badge badge-light-success">Active</span>
                                                        <?php endif ?>
                                                    <?php else: ?>
                                                            <span class="badge badge-light-success">Active</span>
                                                    <?php endif ?>
                                                        <div class="overlay-edit" style="width:100%">
                                                            <a type="button" class="btn btn-icon btn-secondary" href="<?= base_url()?>/produits/details/<?= $row->_id?>/<?= url_title(ucfirst($row->product_name))?>"><i
                                                                    class="feather icon-eye"></i></a>
                                                            <a type="button" class="btn btn-icon btn-success" href="<?= base_url()?>/products/active/<?= $row->_id?>"><i
                                                                    class="feather icon-check-circle"></i></a>
                                                            <a type="button" href="<?= base_url()?>/products/addCharacter/<?= $row->_id?>/<?= url_title(ucfirst($row->product_name))?>" class="btn btn-icon btn-info"><i
                                                                    class="feather icon-plus-circle"></i></a>
                                                            <a type="button" href="<?= base_url()?>/products/addImage/<?= $row->_id?>/<?= url_title(ucfirst($row->product_name))?>" class="btn btn-icon btn-warning"><i
                                                                    class="feather icon-image"></i></a>
                                                        </div>
                                                </td>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <!-- <th>Description</th> -->
                                    <th>Categories</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ($user_data->u_role === 'moderator'):?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <th>Description</th>
                                    <th>Categories</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($products):?>
                                    <?php if($sect_mod):?>
                                        <?php foreach ($products as $row): ?>
                                            <?php if(in_array($row->product_sectors, $sect_mod)):?>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="<?=base_url()?>/assets/rp_admin/images/product/<?= $row->product_image ?? "" ?>" alt="<?= $row->product_name ?? "" ?>" class="img-radius align-top m-r-15" style="width:40px;">
                                                            <div class="d-inline-block">
                                                                <h6 class="m-b-0"><?= $row->product_name ?? "" ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $row->product_sectors ?? "" ?>
                                                    </td>
                                                    <td>
                                                        <?php helper('text'); ?>
                                                        <?= substr($row->product_description, 0, 30) ?? "" ?>
                                                    </td>
                                                    <td>

                                                        <?php
                                                        $cat = '';
                                                        foreach ($row->product_categories as $categories){
                                                            $cat .= $categories .', ' ;
                                                        }
                                                        echo substr($cat, 0, 30) ;

                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php if (isset($row->product_status)): ?>
                                                            <?php if ( $row->product_status == 'disable'): ?>
                                                                <span class="badge badge-light-danger">Disabled</span>
                                                            <?php else :?>
                                                                <span class="badge badge-light-success">Active</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="badge badge-light-success">Active</span>
                                                        <?php endif ?>
                                                        <div class="overlay-edit" style="display: none">
                                                            <a type="button" class="btn btn-icon btn-success" href="<?= base_url()?>/products/delete/<?= $row->product_id?>/enable"><i
                                                                        class="feather icon-check-circle"></i></a>
                                                            <a type="button" href="<?= base_url()?>/products/delete/<?= $row->product_id?>/disable" class="btn btn-icon btn-danger"><i
                                                                        class="feather icon-trash-2"></i></a>
                                                            <a type="button" href="<?= base_url()?>/products/addCharacter/<?= $row->product_id?>" class="btn btn-icon btn-info"><i
                                                                        class="feather icon-plus-circle"></i></a>
                                                            <a type="button" href="<?= base_url()?>/products/addImage/<?= $row->product_id?>" class="btn btn-icon btn-warning"><i
                                                                        class="feather icon-image"></i></a>
                                                        </div>
                                                    </td>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Sector</th>
                                    <th>Description</th>
                                    <th>Categories</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>

    <?php if ($user_data->u_role === 'org manager'):?>
        <div class="card col-xl-12 mx-auto">
            <div class="col-xl-12 col-md-12 mb-5">
                <hr>
                <p style="text-align: center; font-size: 16px;">Select a <strong>Sector</strong>  to filter associated <strong>Products</strong></p>
            
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-6 text-center">
                            <select class="js-example-placeholder-multiple col-sm-12" name="product_sector" id="prodsect" onChange="filterProduct(this.value);">
                                <option value="all">All Sectors</option>
                                <?php foreach ($sectors as $sector):?>
                                    <option value="<?= $sector->_id ?>" <?= set_select('product_sector', $sector->_id) ?>><?= ucfirst($sector->sector_name) ?></option>
                                <?php endforeach;?>
                            </select>
                            <small id="input-help" class="form-text text-danger"><?= $validation['product_sectors'] ?? null ;  ?></small>
                        </div>
                    </div>
            </div>
            <div class="row justify-content-center">
                <?php if(!$products):?>
                    <div class="alert alert-info">
                        <p>There's no product for this sector in this context</p>
                    </div>
                <?php else:?>
                    <?php foreach($products as $prod) :?>
                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 filterDiv 
                        <?php foreach ($prod['product_sectors'] as $key => $value):?>
                            <?= $value;?>
                        <?php endforeach;?>"
                    > 
                        <!-- <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3"> -->
                            <div class="card user-card user-card-1" style="max-width: 300px !important;">
                                <div class="card-header border-0 p-2 pb-0">
                                    <div class="cover-img-block">
                                        <img
                                                src="<?= "./assets/rp_admin/images/product/" . $prod['product_image'] ?? "prod-anim.jpg";?>"
                                                alt="<?=$prod->product_name;?>"
                                                class="img-fluid"
                                                style="height: 160px !important;width: 100%;"
                                        />
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="text-center">
                                        <h4 class="mb-1 mt-3"><?=$prod->product_name?></h4>
                                        <p class="mb-3 text-muted">
                                            <?php
                                                $sect = (new App\Controllers\Products)->getSectorsProduct($prod->_id);
                                                echo (implode(', ', $sect));
                                            ?>
                                        </p>
                                        <p class="mb-3 text-muted"></p>
                                        <p class="mb-1"><?= word_limiter($prod->product_description, 6) ?></p>
                                    </div>
                                    <hr class="wid-80 b-wid-3 my-4">

                                </div>
                                <div class="card-body hover-data text-white">
                                    <div class="">
                                        <h4 class="text-white"><?= $prod->product_name?></h4>
                                        <p class="mb-1"><?= word_limiter($prod->product_description, 10) ?></p>
                                        <a type="button" href="<?= base_url()?>/products/addcharacter/<?= $prod->_id?>/<?=strtolower(url_title($prod->product_name));?>" class="btn waves-effect waves-light btn-warning"><i class="feather feather icon-plus"></i>&nbsp;Characteristics</a>
                                        <p>To create your product just add characteristics by clicking on the button over</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    <?php endif;?>
        <!-- [ Main Content ] end -->
    </div>
</div>

    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

    </div>

<!-- [ Main Content ] end -->
<?= $this->include('products/admin/filterJs');?>
<?= $this->endSection() ?>

