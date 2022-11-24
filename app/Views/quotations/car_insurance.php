<?= $this->extend("layouts/base")?>
<?= $this->section("title")?>
<?= $title ; ?>
<?= $this->endSection("title")?>
<?= $this->section("content")?>
<?php
$page_session = \Config\Services::session();
?>

<div class="hero">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white p-3 p-lg-5">
                    <div class="contact-form mb60">
                        <div class=" ">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>Get Your Quote</h1>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert"">
                                    Fill the form and submit to see products for all organisations
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <?= form_open_multipart('quotations/loadCar', 'class="contact-us"' );?>
                        <input  name="prod_name" type="hidden" value="<?= $title ?? set_value('prod_name') ?>" class="form-control input-md">
                        <div class=" ">
                            <!-- Text input-->
                            <div class="row">

                                <!-- Text select-->
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label"  for="oc_title">Title<span class=" "> </span></label>
                                        <Select id="oc_title" class="form-control input-md " name="oc_title" >
                                            <option value="">Select your title</option>
                                            <option value="Mr" <?= set_select('oc_title', 'Mr') ?>>Mr</option>
                                            <option value="Mme" <?= set_select('oc_title', 'Mme') ?>>Mme</option>
                                            <option value="Ms <?= set_select('oc_title', 'Mrs') ?>">Ms</option>
                                        </Select>
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_title'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_first_name">First Name<span class=" "> </span></label>
                                        <input id="oc_first_name" name="oc_first_name" type="text" placeholder="First Name" class="form-control input-md" value="<?= set_value('oc_first_name') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_first_name'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_middle_name">Middle Name<span class=" "> </span></label>
                                        <input id="oc_middle_name" name="oc_middle_name" type="text" placeholder="Middle Name" class="form-control input-md" value="<?= set_value('oc_middle_name') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_middle_name'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_surname">Surname<span class=" "> </span></label>
                                        <input id="oc_surname" name="oc_surname" type="text" placeholder="Surname" class="form-control input-md" value="<?= set_value('oc_surname') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_surname'] ?? null; ?></small>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_email">Email<span class=" "> </span></label>
                                        <input id="oc_email" name="oc_email" type="email" placeholder="Email" class="form-control input-md" value="<?= set_value('oc_email') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_email'] ?? null; ?></small>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_phone">Telephone (office)<span class=" "> </span></label>
                                        <input id="oc_phone" name="oc_phone" type="tel" placeholder="Telephone (office)" class="form-control input-md" value="<?= set_value('oc_phone') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_phone'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-transform: none !important;" for="oc_mobile">Mobile<span class=" "> </span></label>
                                        <input id="oc_mobile" name="oc_mobile" type="tel" placeholder="Mobile" class="form-control input-md" value="<?= set_value('oc_mobile') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_mobile'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-transform: none !important;" for="oc_dob">Date Of Birth<span class=" "></span></label>
                                        <input id="oc_dob" name="oc_dob" type="date" placeholder="Date of Birth" class="form-control input-md" value="<?= set_value('oc_dob') ?>"  onchange="fillAge();">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_dob'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-transform: none !important;" for="oc_age">Age<span class=" "> </span></label>
                                        <input id="oc_age" name="oc_age" type="number" placeholder="Age" class="form-control input-md" value="<?= set_value('oc_age') ?>" readonly>
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_age'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_profession">Profession<span class=" "></span></label>
                                        <input id="oc_profession" name="oc_profession" type="text" placeholder="Profession" class="form-control input-md" value="<?= set_value('oc_profession') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_profession'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_industry">Industry<span class=" "></span></label>
                                        <input id="oc_industry" name="oc_industry" type="text" placeholder="Industry" class="form-control input-md" value="<?= set_value('oc_industry') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_industry'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_lic_type">Driver’s Licence Type<span class=" "></span></label>
                                        <input id="oc_lic_type" name="oc_lic_type" type="text" placeholder="Driver’s Licence Type" class="form-control input-md" value="<?= set_value('oc_lic_type') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_lic_type'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-transform: none !important;" for="oc_lic_nat">Driver’s License Nationality<span class=" "></span></label>
                                        <input id="oc_lic_nat" name="oc_lic_nat" type="text" placeholder="Driver’s Licence Nationality" class="form-control input-md" value="<?= set_value('oc_lic_nat') ?>" >
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_lic_nat'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-transform: none !important;" for="oc_date_lic">Driver’s Licence Issue Date<span class=" "></span></label>
                                        <input id="oc_date_lic" name="oc_date_lic" type="date" placeholder="Driver’s Lisence Issue Date" class="form-control input-md" value="<?= set_value('oc_date_lic') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_date_lic'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-check">
                                        <input id="oc_damage" name="oc_damage" type="checkbox" class="form-check-input input-md" value="<?= set_value('oc_damage') ?>">
                                        <label class="form-check-label" style="text-transform: none !important;" for="oc_damage">Loss on Damage in the last 3 years.<span class=" "></span></label>
                                    </div>
                                    <div class="form-check">
                                        <input id="veh_own" name="veh_own" type="checkbox" class="form-check-input input-md" value="<?= set_value('veh_own') ?>">
                                        <label class="form-check-label" style="text-transform: none !important;" for="veh_own">Do You own the vehicle ?<span class=" "></span></label>
                                    </div>
                                    <div class="form-check">
                                        <input id="main_driver" name="main_driver" type="checkbox" class="form-check-input input-md" value="<?= set_value('main_driver') ?>">
                                        <label class="form-check-label" style="text-transform: none !important;" for="main_driver">Are you main driver ?<span class=" "></span></label>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="veh_usage">Usage of vehicle<span class=" "> </span></label>
                                        <input id="veh_usage" name="veh_usage" type="text" placeholder="Usage of vehicle" class="form-control input-md" value="<?= set_value('veh_usage') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['veh_usage'] ?? null; ?></small>
                                    </div>
                                </div>
                                <!-- Text select-->
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="nb_veh">Number of vehicle<span class=" "> </span></label>
                                        <input id="nb_veh" name="nb_veh" type="text" placeholder="Number of vehicle" class="form-control input-md" value="<?= set_value('nb_veh') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['nb_veh'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="type_veh">Type of vehicle<span class=" "> </span></label>
                                        <input id="type_veh" name="type_veh" type="text" placeholder="Type of vehicle" class="form-control input-md" value="<?= set_value('type_veh') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['type_veh'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="veh_mfct">Vehicle Manufacturer<span class=" "> </span></label>
                                        <input id="veh_mfct" name="veh_mfct" type="text" placeholder="Vehicle Manufacturer" class="form-control input-md" value="<?= set_value('veh_mfct') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['veh_mfct'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="veh_model">Vehicle Model<span class=" "> </span></label>
                                        <input id="veh_model" name="veh_model" type="text" placeholder="Vehicle Model" class="form-control input-md" value="<?= set_value('veh_model') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['veh_model'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="veh_color">Vehicle Color<span class=" "> </span></label>
                                        <input id="veh_color" name="veh_color" type="text" placeholder="Vehicle Color" class="form-control input-md" value="<?= set_value('veh_color') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['veh_color'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="lic_plate">Licence Plate Number<span class=" "> </span></label>
                                        <input id="lic_plate" name="lic_plate" type="text" placeholder="Licence Plate Number" class="form-control input-md" value="<?= set_value('lic_plate') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['lic_plate'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="chassis">Chassis Number<span class=" "> </span></label>
                                        <input id="chassis" name="chassis" type="text" placeholder="Chassis Number" class="form-control input-md" value="<?= set_value('chassis') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['chassis'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <Select id="veh_fin" class="form-control input-md " name="veh_fin" >
                                            <option value="">Is the vehicle financed</option>
                                            <option value="No" <?= set_select('veh_fin', 'No') ?>>No</option>
                                            <option value="Yes" <?= set_select('veh_fin', 'Yes') ?>>Yes</option>
                                        </Select>
                                        <small id="input-help" class="form-text text-danger"><?= $validation['veh_fin'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_phys_add_one">Physical Address 1<span class=" "> </label>
                                        <input type="text" id="oc_phys_add_one" class="form-control input-md" placeholder="Physical Address 1" name="oc_phys_add_one" value="<?= set_value('oc_phys_add_one') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_phys_add_one'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_phys_add_two">Physical Address 2<span class=" "> </label>
                                        <input type="text" id="oc_phys_add_two" class="form-control input-md" placeholder="Physical Address 2" name="oc_phys_add_two" value="<?= set_value('oc_phys_add_two') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_phys_add_two'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_suburb">Suburb<span class=" "> </label>
                                        <input type="text" id="oc_suburb" class="form-control input-md" placeholder="Subrurb" name="oc_suburb" value="<?= set_value('oc_suburb') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_suburb'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_town">Town<span class=" "> </label>
                                        <input type="text" id="oc_town" class="form-control input-md" placeholder="Town" name="oc_town" value="<?= set_value('oc_town') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_town'] ?? null; ?></small>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_country">Country<span class=" "> </label>
                                        <input type="text" id="oc_country" class="form-control input-md" placeholder="Country" name="oc_country" value="<?= set_value('oc_country') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_country'] ?? null; ?></small>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="sr-only control-label" for="oc_city">City<span class=" "> </label>
                                        <input type="text" id="oc_city" class="form-control input-md" placeholder="City" name="oc_city" value="<?= set_value('oc_city') ?>">
                                        <small id="input-help" class="form-text text-danger"><?= $validation['oc_city'] ?? null; ?></small>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                    <!-- </C><a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm">Home</a>
                                            <a href="#!" class="btn btn-outline-success btn-sm" onclick="history.back();">Back</a> -->
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.section title start-->

            </div>

        </div>
    </div>
</div>
</div>

<!-- /.content end -->
<!-- Script to fill age automatically -->
<script type="text/javascript">

    function fillAge(){
        let date = new Date();
        let birthday = new Date(document.getElementById('oc_dob').value);

        let age = date.getFullYear() - birthday.getFullYear()

        if(date.getMonth() < birthday.getMonth()){
            age--;

        }else if(date.getMonth() ===  birthday.getMonth()){
            if(date.getDate() < birthday.getDate()){
                age--;
            }
        }
        //console.log(age);
        document.getElementById('oc_age').setAttribute('value', age.toString());
        //return age;
    }
</script>
<!-- Script to fill age automatically -->

<?= $this->endSection("content")?>

