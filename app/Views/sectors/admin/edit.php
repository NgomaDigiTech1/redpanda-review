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
                                <h5 class="m-b-10">Sectors</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                                class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/sectors">List Sectors</a></li>
                                <li class="breadcrumb-item"><a href="#!">Edit Sector</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit sector name</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="history.back();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php if (session()->getFlashdata('success') !== NULL) : ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert" style="border:1px solid dodgerblue  ;background-color:transparent;elevation:20deg; border-radius: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?= form_open('sectors/update') ?>
                                <div class="form-group">
                                    <label class="floating-label" for="Text">Sector Name</label>
                                    <input type="text" class="form-control" id="Text" name="sector_name" value="<?= $sector->sector_name?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['sector_name'] ?? null ;  ?></small>
                                    <input type="hidden" name="sector_id" value="<?= $sector->sector_id?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

        </div>
    </section>
    <!-- [ Main Content ] end -->

<?= $this->endSection() ?>