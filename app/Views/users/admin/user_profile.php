<?= $this->extend('dashboard/base')?>
<?= $this->section('content')?>
<!-- [ Main Content ] start -->
<?php
$user_data = session()->get('user_data');
$session_data = session()->get('product_data');
helper('text');
use CodeIgniter\I18n\Time;
;?>
<div class="pcoded-main-container ">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <!-- profile header start -->
        <div class="user-profile user-card mb-4">
            <div class="card-header border-0 p-0 pb-0">
                <div class="cover-img-block">
                    <!-- <img src="assets/images/profile/cover.jpg" alt="" class="img-fluid"> -->
                    <div class="overlay"></div>
                    <div class="change-cover">
                        <div class="dropdown">
                            <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon feather icon-camera"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
                                <a class="dropdown-item" href="#"><i class="feather icon-film mr-2"></i> upload video</a>
                                <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-4 text-center mt-n5">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="<?= base_url()?>/assets/rp_admin/images/user/<?= $user_data->u_photo ?? "user-default-avatar.png"?>" alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>change</span>
                                            </div>
                                        </div>
                                        <div class="certificated-badge">
                                            <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                            <i class="fas fa-check front-icon text-white"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url()?>/users/addImage"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
                                        <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-1"><?= ucfirst($user_data->u_first_name) ?? ucfirst($user_data->u_username)?></h5>
                            <p class="mb-2 text-muted"><?= ucfirst($user_data->u_role) ?? "User Role"?></p>
                        </div>
                        <div class="col-md-8 mt-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if(($user_data->u_role === 'admin') || ($user_data->u_role === 'org manager')) :?>
                                        <a href="<?= $user_data->org_website ?? "#!" ?>" target="_blank" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-globe mr-2 f-18"></i><?= $user_data->org_website ?? "Organisation web site" ?></a>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                    <a href="mailto:<?= $user_data->u_email ?? "User email"?>" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-mail mr-2 f-18"></i><?= $user_data->u_email ?? "User email"?></a>
                                    <div class="clearfix"></div>
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-phone mr-2 f-18"></i><?= $user_data->u_phone ?? "User phone"?></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <i class="feather icon-map-pin mr-2 mt-1 f-18"></i>
                                        <div class="media-body">
                                            <p class="mb-0 text-muted"><?= $user_data->org_adress ?? ""?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-reset active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather icon-home mr-2"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-reset" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather icon-user mr-2"></i>Profile</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link text-reset" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false"><i class="feather icon-image mr-2"></i>Gallery</a> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile header end -->
        <!-- profile body start -->
        <div class="row">
            <div class="col-md-12 order-md-2">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card user-profile-list">
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="user-list-table" class="table nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Datetime</th>
                                                        <th>Product</th>
                                                        <th>Client</th>
                                                        <th>Sector</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($user_data->u_role === 'admin'):?>

                                                    <?php if (empty($quotes)):?>

                                                        <div class="alert alert-primary text-center">
                                                            No quote has been submitted !
                                                        </div>

                                                    <?php else:?>

                                                        <?php foreach ($quotes as $quote):?>
                                                            <tr>
                                                                <td>
                                                                    <?= $quote->created_at?><br>
                                                                    <p style="color: violet;"><strong><?= $time = Time::parse($quote['created_at'])->humanize();?></strong></p>
                                                                </td>
                                                                <td>

                                                                    <div class="d-inline-block align-middle">
                                                                        <img
                                                                                src="<?= base_url(). "./assets/rp_admin/images/product/" . $quote['product_image'];?>"
                                                                                alt="<?= $quote->oc_product ?? ''; ?>" title="product-img"
                                                                                class="img-fluid align-top m-r-15"
                                                                                style="width:40px;height: 27px;"
                                                                        >
                                                                        <div class="d-inline-block">
                                                                            <h6 class="m-b-0"><?= $quote->oc_product ?? ''; ?></h6>
                                                                            <p class="m-b-0"><?= $quote->org ?? ""?></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-inline-block align-middle">
                                                                        <div class="d-inline-block">
                                                                            <h6 class="m-b-0"><?= $quote->oc_first_name ?? ''; ?></h6>
                                                                            <p class="m-b-0"><a style="color: darkviolet" href="mailto:<?= $quote->oc_email ?? ""?>"><?= $quote->oc_email ?? ""?></a></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><?= $quote->prod_sect ?? ''; ?></td>
                                                                <td><?= $quote->oc_phone ?? ''; ?></td>

                                                                <td>
                                                                    <?php if (isset($quote->status)): ?>
                                                                        <?php if ( $quote->status == 'pending'): ?>
                                                                            <span class="badge badge-light-danger">Pending</span>
                                                                        <?php elseif ($quote->status == 'processing') :?>
                                                                            <span class="badge badge-light-warning">Processing</span>
                                                                        <?php elseif ($quote->status == 'done') :?>
                                                                            <span class="badge badge-light-success">Done</span>
                                                                        <?php elseif ($quote->status == 'cancelled') :?>
                                                                            <span class="badge badge-light-danger">Cancelled</span>
                                                                        <?php endif ?>
                                                                    <?php endif ?>
                                                                    <div class="overlay-edit">
                                                                        <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/process"
                                                                           class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Process">
                                                                            <i class="feather icon-check-circle"></i></a>
                                                                        <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/done"
                                                                           class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Done">
                                                                            <i class="feather icon-thumbs-up"></i></a>
                                                                        <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/cancel"
                                                                           class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                                            <i class="feather icon-slash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endif;?>

                                                <?php if($user_data->u_role === 'org manager'):?>

                                                    <?php if (empty($quotes)):?>

                                                        <div class="alert alert-primary text-center">
                                                            No quote has been submitted !
                                                        </div>

                                                    <?php else:?>

                                                        <?php foreach ($quotes as $quote):?>
                                                            <?php if($quote->org === $user_data->org_name):?>
                                                                <tr>
                                                                    <td>
                                                                        <?= $quote->created_at?><br>
                                                                        <strong style="color: violet;"><?= $time = Time::parse($quote['created_at'])->humanize();?></strong>
                                                                    </td>
                                                                    <td>

                                                                        <div class="d-inline-block align-middle">
                                                                            <img
                                                                                    src="<?= base_url(). "./assets/rp_admin/images/product/" . $quote['product_image'];?>"
                                                                                    alt="<?= $quote->oc_product ?? ''; ?>" title="product-img"
                                                                                    class="img-fluid align-top m-r-15"
                                                                                    style="width:40px;height: 27px;"
                                                                            >
                                                                            <div class="d-inline-block">
                                                                                <h6 class="m-b-0"><?= $quote->oc_product ?? ''; ?></h6>
                                                                                <p class="m-b-0"><?= $quote->org ?? ""?></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <div class="d-inline-block">
                                                                                <h6 class="m-b-0"><?= $quote->oc_first_name ?? ''; ?></h6>
                                                                                <p class="m-b-0"><a href="mailto:<?= $quote->oc_email ?? ""?>"><?= $quote->oc_email ?? ""?></a></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $quote->prod_sect ?? ''; ?></td>
                                                                    <td><?= $quote->oc_phone ?? ''; ?></td>

                                                                    <td>
                                                                        <?php if (isset($quote->status)): ?>
                                                                            <?php if ( $quote->status == 'pending'): ?>
                                                                                <span class="badge badge-light-danger">Pending</span>
                                                                            <?php elseif ($quote->status == 'processing') :?>
                                                                                <span class="badge badge-light-warning">Processing</span>
                                                                            <?php elseif ($quote->status == 'done') :?>
                                                                                <span class="badge badge-light-success">Done</span>
                                                                            <?php elseif ($quote->status == 'cancelled') :?>
                                                                                <span class="badge badge-light-danger">Cancelled</span>
                                                                            <?php endif ?>
                                                                        <?php endif ?>
                                                                        <div class="overlay-edit">
                                                                            <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/process"
                                                                               class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Process">
                                                                                <i class="feather icon-check-circle"></i></a>
                                                                            <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/done"
                                                                               class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Done">
                                                                                <i class="feather icon-thumbs-up"></i></a>
                                                                            <a type="button" href="<?= base_url()?>/quotations/dealing/<?= $quote->quotation_id?>/cancel"
                                                                               class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                                                <i class="feather icon-slash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endif;?>

                                                <?php if($user_data->u_role === 'customer'):?>

                                                    <?php if (empty($quotes)):?>

                                                        <div class="alert alert-primary text-center">
                                                            No quote has been submitted !
                                                        </div>

                                                    <?php else:?>

                                                        <?php foreach ($quotes as $quote):?>
                                                            <?php if($quote->oc_email === $user_data->u_email):?>
                                                                <tr>
                                                                    <td>
                                                                        <?= $quote->created_at?><br>
                                                                        <strong style="color: violet;"><?= $time = Time::parse($quote['created_at'])->humanize();?></strong>
                                                                    </td>
                                                                    <td>

                                                                        <div class="d-inline-block align-middle">
                                                                            <img
                                                                                    src="<?= base_url(). "./assets/rp_admin/images/product/" . $quote['product_image'];?>"
                                                                                    alt="<?= $quote->oc_product ?? ''; ?>" title="product-img"
                                                                                    class="img-fluid align-top m-r-15"
                                                                                    style="width:40px;height: 27px;"
                                                                            >
                                                                            <div class="d-inline-block">
                                                                                <h6 class="m-b-0"><?= $quote->oc_product ?? ''; ?></h6>
                                                                                <p class="m-b-0"><?= $quote->org ?? ""?></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <div class="d-inline-block">
                                                                                <h6 class="m-b-0"><?= $quote->oc_first_name ?? ''; ?></h6>
                                                                                <p class="m-b-0"><a href="mailto:<?= $quote->oc_email ?? ""?>"><?= $quote->oc_email ?? ""?></a></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $quote->prod_sect ?? ''; ?></td>
                                                                    <td><?= $quote->oc_phone ?? ''; ?></td>

                                                                    <td>
                                                                        <?php if (isset($quote->status)): ?>
                                                                            <?php if ( $quote->status == 'pending'): ?>
                                                                                <span class="badge badge-light-danger">Pending</span>
                                                                            <?php elseif ($quote->status == 'processing') :?>
                                                                                <span class="badge badge-light-warning">Processing</span>
                                                                            <?php elseif ($quote->status == 'done') :?>
                                                                                <span class="badge badge-light-success">Done</span>
                                                                            <?php elseif ($quote->status == 'cancelled') :?>
                                                                                <span class="badge badge-light-danger">Cancelled</span>
                                                                            <?php endif ?>
                                                                        <?php endif ?>

                                                                    </td>

                                                                </tr>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                <?php endif;?>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Datetime</th>
                                                    <th>Product</th>
                                                    <th>Client</th>
                                                    <th>Sector</th>
                                                    <th>Phone</th>
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Personal details</h5>
                                <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
                                    <i class="feather icon-edit"></i>
                                </button>
                            </div>
                            <div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
                                <form>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Full Name</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= ucfirst($user_data->u_first_name) ?? ucfirst($user_data->u_username). " ". ucfirst($user_data->u_last_name) ?? ""?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Gender</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= $user_data->u_gender ?? "Nothing" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-top: 12px;">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Birth Date</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= $user_data->u_birth_date ?? "Nothing" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-top: 12px;">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Location</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= $user_data->u_location ?? " " ;?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-2">
                                <?= form_open("users/update")?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="u_first_name" class="form-control" placeholder="First Name" value="<?= $user_data->u_first_name ?? "" ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="u_last_name" class="form-control" placeholder="Last Name" value="<?= $user_data->u_last_name ?? "" ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Gender</label>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" value="Male" name="u_gender" class="custom-control-input"<?= isset($user_data->u_gender)=="Male" ? "checked":""  ?> >
                                            <label class="custom-control-label" for="customRadioInline1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" value="Female" name="u_gender" class="custom-control-input" <?= isset($user_data->u_gender)=="Female" ? "checked":"" ?>>
                                            <label class="custom-control-label" for="customRadioInline2">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Birth Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="u_birth_date" class="form-control" value="<?= $user_data->u_birth_date ?? "" ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder" name="u_location">Location</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="u_location"><?= $user_data->u_location ?? "" ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Contact Information</h5>
                                <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-2">
                                    <i class="feather icon-edit"></i>
                                </button>
                            </div>
                            <div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
                                <form>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Mobile Number</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= $user_data->u_phone ?? "" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
                                        <div class="col-sm-9" style="padding-top: 12px;">
                                            <?= $user_data->u_email ?? "" ?>
                                        </div>
                                    </div>
                                    <?php if(($user_data->u_role === 'admin') || ($user_data->u_role === 'org manager')) :?>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Website</label>
                                            <div class="col-sm-9" style="padding-top: 12px;">
                                                <?= $user_data->org_website ?? "" ?>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                </form>
                            </div>
                            <div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
                                <?= form_open("users/update")?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="u_phone" class="form-control" placeholder="Mobile Number" value="<?= $user_data->u_phone ?? ""?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="u_email" disabled class="form-control" placeholder="Email" value="<?= $user_data->u_email ?? ""?>">
                                    </div>
                                </div>
                                <?php if(($user_data->u_role === 'admin') || ($user_data->u_role === 'org manager')) :?>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="org_website" class="form-control" placeholder="Web Site" value="<?= $user_data->org_website ?? ""?>">
                                        </div>
                                    </div>
                                <?php endif;?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                        <!-- Organisation information !-->
                        <?php if(($user_data->u_role === 'admin') || ($user_data->u_role === 'org manager')) :?>
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Organisation Information</h5>
                                    <button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-2">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                </div>
                                <div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Organisation Name</label>
                                            <div class="col-sm-9" style="padding-top: 12px;">
                                                <?= $user_data->org_name ?? "" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 12px;">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Organisation Address</label>
                                            <div class="col-sm-9"style="padding-top: 12px;">
                                                <?= $user_data->org_adress ?? "" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 12px;">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Creation Date</label>
                                            <div class="col-sm-9"style="padding-top: 12px;">
                                                <?= $user_data->org_created_at ?? "" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 12px;">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Lead</label>
                                            <div class="col-sm-9"style="padding-top: 12px;">
                                                <?= $user_data->org_lead ?? "" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 12px;">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Organisation RCC</label>
                                            <div class="col-sm-9"style="padding-top: 12px;">
                                                <?= $user_data->org_num_rcc ?? "" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding-top: 12px;">
                                            <label class="col-sm-3 col-form-label font-weight-bolder">Sectors & Fields</label>
                                            <div class="col-sm-9"style="padding-top: 12px;">
                                                <?= $user_data->org_secteur ?? "" ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
                                    <?= form_open("users/update")?>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Organisation Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="org_name" class="form-control" placeholder="Full Organisation Name" value="<?= $user_data->org_name ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Organisation Address</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="org_adress" class="form-control" placeholder="The Organisation Address" value="<?= $user_data->org_adress ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Creation Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="org_created_at" class="form-control" placeholder="Web Site" value="<?= $user_data->org_created_at ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Lead</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="org_lead" class="form-control" placeholder="Lead" value="<?= $user_data->org_lead ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Organisation RCC</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="org_num_rcc" class="form-control" placeholder="The Organisation RCC Number" value="<?= $user_data->org_num_rcc ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-bolder">Sectors & Fields</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="org_secteur" class="form-control" data-role="tagsinput" placeholder="Sectors and fields" value="<?= $user_data->org_secteur ?? ""?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!--End organisation information -->
                        <?php endif;?>

                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card user-card user-card-1">
                                    <div class="card-header border-0 p-2 pb-0">
                                        <div class="cover-img-block">
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="assets/images/widget/slider5.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="assets/images/widget/slider6.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="assets/images/widget/slider7.jpg" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="user-about-block text-center">
                                            <div class="row align-items-end">
                                                <div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star text-muted f-20"></i></a></div>
                                                <div class="col"><img class="img-radius img-fluid wid-80" src="assets/images/user/avatar-4.jpg" alt="User image"></div>
                                                <div class="col text-right pb-3">
                                                    <div class="dropdown">
                                                        <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h6 class="mb-1 mt-3">Joseph William</h6>
                                            <p class="mb-3 text-muted">UI/UX Designer</p>
                                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                                            <p class="mb-0">been the industry's standard</p>
                                        </div>
                                        <hr class="wid-80 b-wid-3 my-4">
                                        <div class="row text-center">
                                            <div class="col">
                                                <h6 class="mb-1">37</h6>
                                                <p class="mb-0">Mails</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">2749</h6>
                                                <p class="mb-0">Followers</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">678</h6>
                                                <p class="mb-0">Following</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card user-card user-card-1">
                                    <div class="card-header border-0 p-2 pb-0">
                                        <div class="cover-img-block">
                                            <img src="assets/images/widget/slider6.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="user-about-block text-center">
                                            <div class="row align-items-end">
                                                <div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star-on text-c-yellow f-20"></i></a></div>
                                                <div class="col">
                                                    <div class="position-relative d-inline-block">
                                                        <img class="img-radius img-fluid wid-80" src="assets/images/user/avatar-5.jpg" alt="User image">
                                                        <div class="certificated-badge">
                                                            <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                                            <i class="fas fa-check front-icon text-white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col text-right pb-3">
                                                    <div class="dropdown">
                                                        <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h6 class="mb-1 mt-3">Suzen</h6>
                                            <p class="mb-3 text-muted">UI/UX Designer</p>
                                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                                            <p class="mb-0">been the industry's standard</p>
                                        </div>
                                        <hr class="wid-80 b-wid-3 my-4">
                                        <div class="row text-center">
                                            <div class="col">
                                                <h6 class="mb-1">37</h6>
                                                <p class="mb-0">Mails</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">2749</h6>
                                                <p class="mb-0">Followers</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">678</h6>
                                                <p class="mb-0">Following</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card user-card user-card-1">
                                    <div class="card-header border-0 p-2 pb-0">
                                        <div class="cover-img-block">
                                            <img src="assets/images/widget/slider7.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="user-about-block text-center">
                                            <div class="row align-items-end">
                                                <div class="col"></div>
                                                <div class="col">
                                                    <div class="position-relative d-inline-block">
                                                        <img class="img-radius img-fluid wid-80" src="assets/images/user/avatar-1.jpg" alt="User image">
                                                    </div>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h6 class="mb-1 mt-3">John Doe</h6>
                                            <p class="mb-3 text-muted">UI/UX Designer</p>
                                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                                            <p class="mb-0">been the industry's standard</p>
                                        </div>
                                        <hr class="wid-80 b-wid-3 my-4">
                                        <div class="row text-center">
                                            <div class="col">
                                                <h6 class="mb-1">37</h6>
                                                <p class="mb-0">Mails</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">2749</h6>
                                                <p class="mb-0">Followers</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">678</h6>
                                                <p class="mb-0">Following</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body hover-data text-white">
                                        <div class="">
                                            <h4 class="text-white">Hire Me?</h4>
                                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                                            <p class="mb-3">been the industry's standard</p>
                                            <button type="button" class="btn waves-effect waves-light btn-warning"><i class="feather icon-link"></i> Meating</button>
                                            <button type="button" class="btn waves-effect waves-light btn-danger"><i class="feather icon-download"></i> Resume</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card user-card user-card-2 shape-center">
                                    <div class="card-header border-0 p-2 pb-0">
                                        <div class="cover-img-block">
                                            <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="assets/images/widget/slider7.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="assets/images/widget/slider6.jpg" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="assets/images/widget/slider5.jpg" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                                                <a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="user-about-block text-center">
                                            <div class="row align-items-end">
                                                <div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star-on text-c-yellow f-20"></i></a></div>
                                                <div class="col">
                                                    <div class="position-relative d-inline-block">
                                                        <img class="img-radius img-fluid wid-80" src="assets/images/user/avatar-5.jpg" alt="User image">
                                                        <div class="certificated-badge">
                                                            <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                                            <i class="fas fa-check front-icon text-white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col text-right pb-3">
                                                    <div class="dropdown">
                                                        <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h6 class="mb-1 mt-3">Suzen</h6>
                                            <p class="mb-3 text-muted">UI/UX Designer</p>
                                            <p class="mb-1">Lorem Ipsum is simply dummy text</p>
                                            <p class="mb-0">been the industry's standard</p>
                                        </div>
                                        <hr class="wid-80 b-wid-3 my-4">
                                        <div class="row text-center">
                                            <div class="col">
                                                <h6 class="mb-1">37</h6>
                                                <p class="mb-0">Mails</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">2749</h6>
                                                <p class="mb-0">Followers</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">678</h6>
                                                <p class="mb-0">Following</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                        <div class="row text-center">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l1.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl1.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l2.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl2.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l3.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl3.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l4.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl4.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l5.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl5.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <a href="assets/images/light-box/l6.jpg" data-lightbox="roadtrip"><img src="assets/images/light-box/sl6.jpg" class="img-fluid m-b-10 img-thumbnail bg-white" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile body end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection()?>
