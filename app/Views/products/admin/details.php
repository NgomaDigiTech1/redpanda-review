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
                            <h5 class="m-b-10">Product</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/products">All Products</a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $product->product_name ;?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?= base_url()?>/assets/rp_admin/images/product/<?= $product->product_image;?>" class="d-block w-100" alt="Product images">
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h3 class="mt-0"><?= $product->product_name ;?> <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ml-2"></i></a> </h3>
                                
                                <div class="mt-3">
                                    <h5><span class="badge badge-success"></?= $product->product_status ;?></span></h5>
                                </div>
                                <div class="mt-4">
                                    <h5><span class="badge badge-success">3.8 <i class="feather icon-star-on"></i></span></h5>
                                </div> 
                                <div>  
                                    <button type="button"  class="btn btn-block btn-lg btn-danger mt-md-0 my-2"><i class="feather icon-trash mr-1"></i>Delete</button>
                  
                                    <button type="button" onclick="history.back();" class="btn btn-block btn-lg btn-success mt-md-0 mt-2"><i class="feather icon-skip-back mr-1"></i> Back</button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <h6>Description:</h6>
                                    <p><?= $product->product_description?></p>
                                    <h6><a href="">Product Characteristics</a></h6>
                                    <div class="w-100">
                                        <?php foreach ($product->caracteristics['required'] as $characteristic => $charact): ?>
                                            <div class="row mb-2">
                                                <div class="col-8"><?= ucfirst($charact) ;?></div>
                                            </div>
                                        <?php endforeach; ?>                                        
                                        <?php foreach ($product->caracteristics['optionals'] as $characteristic => $charact): ?>
                                            <div class="row mb-2">
                                                <div class="col-8"><?= ucfirst($charact) ;?></div>
                                            </div>
                                        <?php endforeach; ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>