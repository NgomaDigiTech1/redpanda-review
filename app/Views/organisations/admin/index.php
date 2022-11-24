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
                            <h5>Organisation List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Organisations</a></li>
                            <li class="breadcrumb-item"><a href="#!">Organisation list</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Activities</th>
                                    <th>Leader</th>
                                    <th>Start date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($organisations as $row): ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?= base_url() ?>/assets/rp_admin/images/user/avatar-1.jpg"
                                                     alt="user image" class="img-radius align-top m-r-15"
                                                     style="width:40px;">
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= $row->organisation_name ?? "" ?></h6>
                                                    <p class="m-b-0"><?= $row->organisation_domaine ?? "" ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $row->organisation_adresse ?? "" ?></td>
                                        <?php if (isset($row->org_secteur)): ?>
                                            <td><?php foreach ($row->org_secteur as $item): ?>
                                                    <?= $item . ',' ?>
                                                <?php endforeach; ?>
                                            </td>
                                        <?php endif ?>
                                        <td><?= $row->org_lead ?? ""?></td>
                                        <td><?= isset($row->organisation_created_at) ? date('d M Y', strtotime($row->organisation_created_at)) : "" ?></td>
                                        <td>
                                            <span class="badge badge-light-success">Active</span>
                                            <div class="overlay-edit">
                                                <button type="button" class="btn btn-icon btn-success"><i
                                                            class="feather icon-check-circle"></i></button>
                                                <button type="button" class="btn btn-icon btn-danger"><i
                                                            class="feather icon-trash-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Activities</th>
                                    <th>Leader</th>
                                    <th>Start date</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
