<?= $this->extend("dashboard/base")?>
<?= $title ;?>
<?= $this->section("content")?>

<?php $user_data = session()->get('user_data');?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- support-section start -->
                <div class="row">
                    <?php if ($user_data->u_role === 'admin'):?>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $org;?></h2>
                                    <span class="text-c-green"><strong>ORGANISATIONS</strong></span>
                                    <p class="mb-3 mt-3">Total number of organisations.</p>
                                </div>
                                <div class="card-footer bg-success text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $org;?>&nbsp;organisations</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $sect;?></h2>
                                    <span class="text-c-blue"><strong><a href="<?= base_url()?>/sectors">SECTORS</a></strong></span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/sectors">Total number of sectors on Red Panda Prices</a></p>
                                </div>
                                <div class="card-footer bg-primary text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $sect;?>&nbsp;sectors</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $prod;?></h2>
                                    <span class="text-c-red">
                                        <strong>
                                            <a class="text-c-red" href="<?= base_url()?>/products">PRODUCTS</a>
                                        </strong>
                                    </span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/products">Total number of generic products</a></p>
                                </div>
                                <div class="card-footer bg-danger text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $prod;?>&nbsp;products</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <?php if ($user_data->u_role === 'moderator'):?>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $org;?></h2>
                                    <span class="text-c-green"><strong>ORGANISATIONS</strong></span>
                                    <p class="mb-3 mt-3">Total number of organisations.</p>
                                </div>
                                <div class="card-footer bg-success text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $org;?>&nbsp;organisations</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $mod_sect;?></h2>
                                    <span class="text-c-blue"><strong><a href="<?= base_url()?>/sectors">SECTORS</a></strong></span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/sectors">Total number of sectors you manage</a></p>
                                </div>
                                <div class="card-footer bg-primary text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $mod_sect;?>&nbsp;sectors</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0">
                                        <?= $mod_prod;?>
                                    </h2>
                                    <span class="text-c-red">
                                        <strong>
                                            <a class="text-c-red" href="<?= base_url()?>/products">PRODUCTS</a>
                                        </strong>
                                    </span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/products">Total number of generic products</a></p>
                                </div>
                                <div class="card-footer bg-danger text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $mod_prod;?>&nbsp;products</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <?php if ($user_data->u_role === 'org manager'):?>

                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $sect;?></h2>
                                    <span class="text-c-blue"><strong><a href="<?= base_url()?>/sectors">SECTORS</a></strong></span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/sectors">Total number of sectors on Red Panda Prices</a></p>
                                </div>
                                <div class="card-footer bg-primary text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $sect;?>&nbsp;sectors</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $prod;?></h2>
                                    <span class="text-c-red">
                                        <strong>
                                            <a class="text-c-red" href="<?= base_url()?>/products">PRODUCTS</a>
                                        </strong>
                                    </span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/products">Total number of generic products</a></p>
                                </div>
                                <div class="card-footer bg-danger text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">Total</h5>
                                            <span><?= $prod;?>&nbsp;products</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0">
                                        <?= view_cell('\App\Controllers\Dashboard::countReqOrg', ['org' => $user_data['org_name']]) ?>
                                    </h2>
                                    <span class="text-info">
                                    <strong>
                                       <a class="text-info" href="<?= base_url()?>/profile"> ALL REQUESTS </a>
                                    </strong>
                                </span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/profile">Total number of requests</a></p>
                                </div>
                                <div class="card-footer bg-info text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white">
                                                <?= view_cell('\App\Controllers\Dashboard::countReqOrgPending', ['org' => $user_data['org_name']]) ?>
                                            </h5>
                                            <span>Pending</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white">
                                                <?= view_cell('\App\Controllers\Dashboard::countReqOrgProcessing', ['org' => $user_data['org_name']]) ?>
                                            </h5>
                                            <span>Processing</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white">
                                                <?= view_cell('\App\Controllers\Dashboard::countReqOrgToday', ['org' => $user_data['org_name']]) ?>
                                            </h5>
                                            <span>Today</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                </div>
                <!-- support-section end -->
            </div>
            <div class="col-lg-12 col-md-12">
                <!-- page statistic card start -->
                <div class="row">
                    <?php if ($user_data->u_role === 'admin'):?>
                        <div class="col-sm-6 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $quotation;?></h2>
                                    <span class="text-info">
                                        <strong>
                                           <a class="text-info" href="<?= base_url()?>/profile"> ALL REQUESTS </a>
                                        </strong>
                                    </span>
                                    <p class="mb-3 mt-3"><a style="color: black" href="<?= base_url()?>/profile">Total number of requests</a></p>
                                </div>
                                <div class="card-footer bg-info text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $pending ?? '';?></h5>
                                            <span>Pending</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $cancelled ?? '';?></h5>
                                            <span>Cancelled</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $processing ?? '';?></h5>
                                            <span>Processing</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $done ?? '';?></h5>
                                            <span>Solved</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $users;?></h2>
                                    <span class="text-c-blue"><strong><a href="<?= base_url()?>/users">ALL USERS</a></strong></span>
                                    <p class="mb-3 mt-3"><a href="<?= base_url()?>/users/create">Create a user here</a></p>
                                </div>
                                <div class="card-footer bg-facebook text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $admin;?></h5>
                                            <span>Admin</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $moderator;?></h5>
                                            <span>Moderators</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $org;?></h5>
                                            <span>Managers</span>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0 text-white"><?= $customer;?></h5>
                                            <span>Customers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <!-- page statistic card end -->
            </div>
            <!-- project ,team member start -->

            <!-- project ,team member start -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- Button trigger modal -->
<?= $this->endSection()?>