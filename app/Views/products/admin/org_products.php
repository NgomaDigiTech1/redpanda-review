<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Organisation Products</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Organisation Products List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="<?= base_url();?>/products" class="btn btn-success btn-sm btn-round has-ripple" ><i class="feather icon-plus"></i> Product</a>
                                <!-- <button class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Product</button> -->
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Sectors</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($products):?>
                                        <?php if(session()->getTempdata('redondance')):?>
                                            <div class="alert alert-danger"><?=session()->getTempdata('redondance');?></div>
                                        <?php endif;?>
                                        <?php if(session()->getTempdata('success')):?>
                                            <div class="alert alert-primary"><?=session()->getTempdata('success');?></div>
                                        <?php endif;?>
                                        <?php foreach($products as $product):?>
                                            <?php
                                                $produit = (new App\Models\ProductModel)->getProduct($product->product_id);                                               
                                            ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img 
                                                        src="<?=base_url()?>/assets/rp_admin/images/product/<?= $produit->product_image ?? "" ?>" 
                                                        alt="contact-img" 
                                                        title="contact-img" 
                                                        class="rounded mr-3"
                                                        height="48" 
                                                        style="width: 64px;height: 48px;"
                                                    />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="" class="text-body"><?=$produit->product_name; ?></a>
                                                    </p>                                                    

                                                </td>
                                                <td class="align-middle">
                                                    <?php
                                                        $categ = (new App\Controllers\Products)->getProductCategories($product->product_id);  
                                                        echo implode(', ', $categ);                                               
                                                    ?>
                                                </td>
                                                <td class="align-middle">
                                                    <?php
                                                        $sect = (new App\Controllers\Products)->getSectorsProduct($produit->_id);
                                                        echo (implode(', ', $sect));
                                                    ?>
                                                </td>        
                                                <td class="table-action">
                                                    <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>
                                                    <a href="#!" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                                    <a href="<?= base_url()?>/produits/deleteOrgProduct/<?= $product->_id ;?>" class="btn btn-icon btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete"
                                                        class="btn btn-icon btn-outline-danger" onclick="return confirm('Sure to delete this Product ?')"><i class="feather icon-trash-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <div class="text-center" style="justify-content:center;">
                                            <div class="lalert alert-info">
                                                You have not selected any products. <br/><br />
                                                Please add your own <a href="<?= base_url()?>/products">here</a>!
                                            </div>
                                        </div>
                                            <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Category">Category</label>
                                <select class="form-control" id="Category">
                                    <option value=""></option>
                                    <option value="1">Kids cloths</option>
                                    <option value="2">Man cloths</option>
                                    <option value="3">Man watch</option>
                                    <option value="3">Office Chairs</option>
                                    <option value="3">Travel bag</option>
                                    <option value="3">Woman cloath</option>
                                    <option value="3">Wooden Chairs</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Price">Price</label>
                                <input type="text" class="form-control" id="Price" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Quantity">Quantity</label>
                                <input type="text" class="form-control" id="Quantity" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Icon">Profie Image</label>
                                <input type="file" class="form-control" id="Icon" placeholder="sdf">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                <label class="custom-control-label" for="customSwitch4">Active</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<?= $this->endSection() ?>
