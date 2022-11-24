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
                            <h5>User List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Users List</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/users/create">Create New User</a>
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
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Member Since</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($users as $row): ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <img src="<?= base_url() ?>/assets/rp_admin/images/user/<?= $row->u_photo ?? "img-avatar-1.jpg" ?? "user-default-avatar.jpg" ?>"
                                                     alt="user image" class="img-radius align-top m-r-15"
                                                     style="width:40px;">
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?= ucfirst($row->u_first_name) ?? ucfirst($row->u_last_name) ?? "" ?></h6>
                                                    <p class="m-b-0"><?= $row->u_email ?? "" ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= ucfirst($row->u_role ?? "")  ?></td>
                                        <td><?= $row->u_phone ?? "" ?></td>
                                        <td><?= date('d M Y', strtotime($row->u_created_at)) ?? "" ?></td>
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
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Member Since</th>
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

