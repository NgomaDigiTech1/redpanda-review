<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/products">Products List</a></li>
                            <li class="breadcrumb-item"><a href="#!">Add Characteristics</a></li>
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
                        <h5><?= $product["product_name"]?></h5>
                    </div>
                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" style="border:1px solid dodgerblue  ;background-color:transparent;elevation:20deg; border-radius: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <?php if (isset($product["caracteristics"])):?>
                            <?= form_open('products/saveCharacteristics') ?>
                                <input type="hidden" name="product_id" value="<?= $product["_id"]?>" readonly>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p class="floating-label text-danger" for="Text">Basic Price USD (*)</p>
                                            <input type="number" class="form-control" id="Text" name="price" min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p class="floating-label text-danger" for="Text">Model (*)</p>
                                            <input type="text" class="form-control" id="Text" name="model" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-danger" for="Text">Colors (*)</label>
                                            <input type="text" class="form-control" id="Text" name="colors" data-role="tagsinput" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Text" class="text-danger">Mfg Year (*)</label>
                                            <input type="text" class="form-control" data-role="tagsinput" id="Text" name="mfg_year" required>
                                        </div>
                                    </div>
                                    <?php foreach ($product["caracteristics"] as $key=>$val):?>
                                        <?php if ($key === "required"):?>
                                            <?php foreach ($val as $keys=> $item):?>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <p class="floating-label text-danger" for="Text"> <?= ucfirst($item) ?> (*)</p>
                                                            <input type="text" class="form-control" id="Text" name="<?=$item?? "charact_name"?>" required>
                                                        </div>
                                                    </div>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <?php foreach ($val as $keys=> $item):?>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <p class="floating-label" for="Text"> <?= ucfirst($item) ?></p>
                                                        <input type="text" class="form-control" id="Text" name="<?=$item ?? "charact_name"?>">
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                    <?php if (isset($product["conditions"]) && $product["conditions"] === "yes"):?>
                                        <div class="col-sm-12">
                                            <label class="floating-label" for="Text">Main Conditions</label>
                                            <div class="form-group">
                                                <textarea name="conditions_content" id="classic-editor">
                                                    <?= set_value('conditions_content')?>
                                                </textarea>
                                                <small id="input-help" class="form-text text-danger"><?= $validation['product_description'] ?? null ;  ?></small>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-icon btn-primary"><i class="feather icon-check"></i></button>
                                    </div>
                                </div>
                            </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
