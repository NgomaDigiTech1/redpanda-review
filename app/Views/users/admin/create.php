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
                            <h5 class="m-b-10">Users</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>/users">List Users</a></li>
                            <li class="breadcrumb-item"><a href="#!">Create user</a></li>
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
                        <h5>User</h5>
                    </div>
                    <div class="card-body">

                        <?= form_open('users/create')?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">First Name</label>
                                    <input type="text" class="form-control" id="Text" aria-describedby="emailHelp" name="user_firstname" value="<?= set_value('user_firstname')?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['user_firstname'] ?? null ;  ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Text">Last Name</label>
                                    <input type="text" class="form-control" id="Text" name="user_lastname" value="<?= set_value('user_lastname')?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['user_lastname'] ?? null ;  ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Text">Email</label>
                                    <input type="text" class="form-control" id="Text" name="user_email" value="<?= set_value('user_email')?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['user_email'] ?? null ;  ?></small>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label" for="Text">Phone Number</label>
                                    <input type="text" class="form-control" id="Text" name="user_phone" value="<?= set_value('user_phone')?>">
                                    <small id="input-help" class="form-text text-danger"><?= $validation['user_phone']  ?? null ;  ?></small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label" for="">User Role</label>
                                    <select name="user_role" class="form-control">
                                        <?php foreach($roles as $role):?>
                                            <option value="<?= $role->role_name?>"><?= ucfirst($role->role_name)?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-md btn-primary" value="Save">
                            </div>
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
<?= $this->endSection()?>
