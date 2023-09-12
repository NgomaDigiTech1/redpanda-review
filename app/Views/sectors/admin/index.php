<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
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
                            <h5 class="m-b-10">Sectors</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Sectors</a></li>
                            <li class="breadcrumb-item"><a href="#!">Sectors List</a></li>
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
                            <?php if ($user_data->u_role === 'admin'):?>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>&nbsp;Sector</button>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Sector</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <?php if ($user_data->u_role === 'admin'):?>
                                        <th>Moderator</th>
                                        <th>Action</th>
                                    <?php endif;?>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if ($sectors ) : ?>
                                        <?php foreach ($sectors as $row) : ?>
                                            <?php if ($user_data->u_role === 'admin' || $user_data->u_role === 'org manager'):?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="<?= base_url(). "./assets/rp_admin/images/sector/" . $row['sector_image'] ?? "sect.jpg";?>"
                                                             alt="sect-img"
                                                             title="sector-img"
                                                             class="rounded mr-3"
                                                             style="width: 64px;height: 48px;"
                                                        />
                                                        <p class="m-0 d-inline-block align-middle font-16">
                                                            <a href="#!" class="text-body"><?= $row['sector_name']?></a>
                                                            <br />

                                                            <?php for($i = 0; $i < rand(1,4); $i++) :?>
                                                                <span class="text-warning feather icon-star-on"></span>
                                                            <?php endfor; ?>
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?= word_limiter($row->sector_description, 8) ?? 'No description'?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php if (isset($row->sector_status)): ?>
                                                            <?php if ( $row->sector_status == 'disabled'): ?>
                                                                <span class="badge badge-danger">Disabled</span>
                                                            <?php else :?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="badge badge-success">Active</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <?php if ($user_data->u_role === 'admin'):?>
                                                        <td class="align-middle">
                                                            <?php
                                                                $mod =(new App\Models\UserModel)->getUserById($row['moderator']);
                                                                echo $mod->u_first_name .'&nbsp'. $mod->u_last_name ?? 'Last';
                                                            ?>
                                                        </td>

                                                        <td class="table-action">
                                                            <a href="<?= base_url()?>/sectors/delete/<?= $row->sector_id?>"
                                                               class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Active or Disable">
                                                                <i class="feather icon-check-circle"></i>
                                                            </a>

                                                            <?php if (isset($row->sector_status)): ?>
                                                                <?php if ( $row->sector_status == 'enabled'): ?>

                                                                    <button data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-edit<?= $row->sector_id?>" class="btn btn-icon btn-outline-success">
                                                                        <i class="feather icon-edit"></i>
                                                                    </button>

                                                                    <a type="button" href="<?= base_url()?>/sectors/addImage/<?= $row->_id?>" data-toggle="tooltip" data-placement="top" title="Change Image"
                                                                            class="btn btn-icon btn-outline-info">
                                                                        <i class="feather icon-image"></i>
                                                                    </a>
                                                                    <a href="<?= base_url()?>/sectors/deleteSector/<?= $row->sector_id?>" data-toggle="tooltip" data-placement="top" title="Delete"
                                                                       class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure to delete this sector permanently ?')"
                                                                    >
                                                                        <i class="feather icon-trash-2"></i>
                                                                    </a>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        </td>
                                                    <?php endif;?>
                                                </tr>
                                                <div class="modal fade" id="modal-edit<?= $row->sector_id?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Sector</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= form_open('sectors/update')?>
                                                                    <input type="hidden" name="sector_id" id="sector_id" required value="<?= $row->sector_id?>">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label" for="sector_name">Sector Name</label>
                                                                                <input type="text" class="form-control" id="sector_name" name="sector_name" placeholder="" value="<?= $row->sector_name?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label" for="moderator">Moderator</label>
                                                                                <select class="form-control" id="moderator" name="moderator" required>
                                                                                    <option value="<?= $mod->_id ?? '';?>"><?= $mod->u_first_name ?? '';?></option>
                                                                                    <?php foreach ($moderators as $moderat):?>
                                                                                        <option value="<?= $moderat->_id ?>"<?= set_select('moderator', $moderat->_id) ?>><?= ucfirst($moderat->u_first_name) ?></option>
                                                                                    <?php endforeach;?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <input type="textarea" name="description" id="description" class="form-control" minlength="20" value="<?= $row->sector_description?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif($user_data->u_role === 'moderator'): ?>
                                                <?php if ($row->moderator == $user_data->_id):?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="<?= base_url(). "./assets/rp_admin/images/sector/" . $row['sector_image'] ?? "sect.jpg";?>"
                                                                 alt="sect-img"
                                                                 title="sector-img"
                                                                 class="rounded mr-3"
                                                                 style="width: 64px;height: 48px;"
                                                            />
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="#!" class="text-body"><?= $row['sector_name']?></a>
                                                                <br />

                                                                <?php for($i = 0; $i < rand(1,4); $i++) :?>
                                                                    <span class="text-warning feather icon-star-on"></span>
                                                                <?php endfor; ?>
                                                            </p>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= word_limiter($row->sector_description, 8) ?? 'No description'?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?php if (isset($row->sector_status)): ?>
                                                                <?php if ( $row->sector_status == 'disabled'): ?>
                                                                    <span class="badge badge-danger">Disabled</span>
                                                                <?php else :?>
                                                                    <span class="badge badge-success">Active</span>
                                                                <?php endif ?>
                                                            <?php else: ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <?php if ($user_data->u_role === 'admin'):?>
                                                            <td class="align-middle">
                                                                <?= $row['moderator'] ?? 'Moderator'?>
                                                            </td>

                                                            <td class="table-action">
                                                                <a href="<?= base_url()?>/sectors/delete/<?= $row->sector_id?>" class="btn btn-icon btn-outline-primary">
                                                                    <i class="feather icon-check-circle"></i>
                                                                </a>

                                                                <?php if (isset($row->sector_status)): ?>
                                                                    <?php if ( $row->sector_status == 'enabled'): ?>

                                                                        <button data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-edit<?= $row->sector_id?>" class="btn btn-icon btn-outline-success">
                                                                            <i class="feather icon-edit"></i>
                                                                        </button>
                                                                        <a type="button" href="<?= base_url()?>/sectors/addImage/<?= $row->sector_id?>" data-toggle="tooltip" data-placement="top" title="Change Image"
                                                                           class="btn btn-icon btn-outline-info">
                                                                            <i class="feather icon-image"></i>
                                                                        </a>
                                                                        <a href="<?= base_url()?>/sectors/deleteSector/<?= $row->sector_id?>" data-toggle="tooltip" data-placement="top" title="Delete"
                                                                           class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure to delete this sector permanently ?')"
                                                                        >
                                                                            <i class="feather icon-trash-2"></i>
                                                                        </a>
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                            </td>
                                                        <?php endif;?>
                                                    </tr>
                                                    <div class="modal fade" id="modal-edit<?= $row->sector_id?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Sector</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?= form_open('sectors/update')?>
                                                                    <input type="hidden" name="sector_id" id="sector_id" required value="<?= $row->sector_id?>">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label" for="sector_name">Sector Name</label>
                                                                                <input type="text" class="form-control" id="sector_name" name="sector_name" placeholder="" value="<?= $row->sector_name?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label" for="moderator">Moderator</label>
                                                                                <select class="form-control" id="moderator" name="moderator" required>
                                                                                    <option value=""></option>
                                                                                    <?php foreach ($moderators as $moderat):?>
                                                                                        <option value="<?= $moderat->_id ?>"<?= set_select('moderator', $moderat->_id) ?>><?= ucfirst($moderat->u_first_name) ?></option>
                                                                                    <?php endforeach;?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <input type="textarea" name="description" id="description" class="form-control" minlength="20" value="<?= $row->sector_description?>" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

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
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Sector</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('sectors/create')?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="sector_name">Sector Name</label>
                                    <input type="text" class="form-control" id="sector_name" name="sector_name" placeholder="" value="<?= set_value('sector_name') ?>" required>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['sector_name'] ?? null ; ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="moderator">Select a moderator</label>
                                    <select class="form-control" id="moderator" name="moderator" required>
                                        <option value=""></option>
                                        <?php foreach ($moderators as $moderat):?>
                                            <option value="<?= $moderat->_id ?>" <?= set_select('moderator', $moderat->_id) ?>><?= ucfirst($moderat->u_first_name) ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['moderator'] ?? null ; ?></small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" minlength="20" value="<?= set_value('description') ?>" required></textarea>
                                    <small id="input-help" class="form-text text-danger"><?= $validation['description'] ?? null ; ?></small>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
