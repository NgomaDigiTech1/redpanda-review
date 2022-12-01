<?= $this->extend("dashboard/base")?>
<?= $this->section("content")?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Products</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>/products">Products List</a></li>
                            <li class="breadcrumb-item"><a href="#!">Create product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>New Product</h5>
                    </div>
                    <div class="card-body">
                        <?= form_open('products/create')?>
                        <!-- Start  -->
                            <div class="row m-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Text">Product Sectors</label>
                                        <select class="js-example-tags col-sm-12" multiple="multiple" name="product_sectors[]" size="3">
                                            <?php foreach ($sectors as $sector):?>
                                                <option value="<?= $sector->_id ?>"  <?= set_select('product_sectors[]', $sector->_id) ?>>
                                                    <?= ucfirst($sector->sector_name) ?>
                                                </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small id="input-help" class="form-text text-danger"><?= $validation['product_sectors'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="floating-label" for="Text">Product Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="productname" value="<?= set_value('productname')?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['productname'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Text">Product Categories</label>
                                        <input type="text" class="form-control" name="product_categories" data-role="tagsinput" value="<?= set_value('product_categories')?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['product_categories'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="container-fluid" style="display:contents">
                                    <div class="col-md-12">
                                        <h5 class="mt-5 mb-3 text-danger">Invariant Characteristics</h5>
                                        <span class="form-text text-danger">Don't repeat the invariant variables in the Product Characteristics</span>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="price" value="Price" readonly style="background-color:#fff">
                                            <small id="input-help" class="form-text text-danger">Automatically taken</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="mfg_year" value="Mfg Year" readonly style="background-color:#fff">
                                            <small id="input-help" class="form-text text-danger">Automatically taken</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="model" value="Model" readonly style="background-color:#fff">
                                            <small id="input-help" class="form-text text-danger">Automatically taken</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="colors" value="Colors" readonly style="background-color:#fff">
                                            <small id="input-help" class="form-text text-danger">Automatically taken</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mt-5 mb-3">Product Characteristics</h5>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Text">Required Characteristics(*)</label>
                                        <input type="text" class="form-control" name="require_chars" data-role="tagsinput" value="<?= set_value('require_chars')?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['require_chars'] ?? null ;  ?></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Text">Optional Characteristics</label>
                                        <input type="text" class="form-control" name="optional_chars" data-role="tagsinput" value="<?= set_value('optional_chars')?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['optional_chars'] ?? null ;  ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product Description</span>
                                        </div>
                                        <textarea class="form-control" aria-label="With textarea" name="product_description"><?= set_value('product_description')?></textarea>
                                    </div>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['product_description'] ?? null ;  ?></small>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input"  name="conditions" type="checkbox"  value="yes" <?= set_checkbox('conditions', 'yes') ?> >
                                            <label class="form-check-label" for="invalidCheck">Terms and conditions</label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <input type="submit" class="btn btn-md btn-primary" value="Save">
                                </div>
                            </div>
                        <!-- End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?= $this->endSection()?>