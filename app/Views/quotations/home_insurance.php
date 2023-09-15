<?= $this->extend("layouts/base")?>
<?= $this->section("content")?>

<div class="hero-home-loan">
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
                        
                        <?= form_open('load-home/' . $product->product_slug, 'class="contact-us"' );?>
                            <!-- <input  name="prod_name" type="hidden" value="</?= $product->product_name ?>" class="form-control input-md"> -->
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
                                    <!-- Text select-->
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label"  for="oc_type_accom">Type of Accommodation<span class=" "> </span></label>
                                            <Select id="oc_type_accom" class="form-control input-md " name="oc_type_accom" >
                                                <option value="">Select your type of house</option>
                                                <option value="House" <?= set_select('oc_type_accom', 'House') ?>>House</option>
                                                <option value="Apartment" <?= set_select('oc_type_accom', 'Apartment') ?>>Apartment</option>
                                                <option value="Town House" <?= set_select('oc_type_accom', 'Town House') ?>>Town House</option>
                                                <option value="Bungalow" <?= set_select('oc_type_accom', 'Bungalow') ?>>Bungalow</option>
                                            </Select>
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_type_accom'] ?? null; ?></small>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label" for="oc_rooms">Number of Rooms<span class=" "> </span></label>
                                            <input id="oc_rooms" name="oc_rooms" type="number" placeholder="Number of Rooms" class="form-control input-md" value="<?= set_value('oc_rooms') ?>">
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_rooms'] ?? null; ?></small>
                                        </div>
                                    </div>
                                    <!-- Text select-->
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label"  for="oc_usage">Usage<span class=" "> </span></label>
                                            <Select id="oc_usage" class="form-control input-md " name="oc_usage" >
                                                <option value="">Select usage</option>
                                                <option value="Accommodation" <?= set_select('oc_usage', 'Accommodation') ?>>Accommodation</option>
                                                <option value="Business" <?= set_select('oc_usage', 'Business') ?>>Business</option>
                                            </Select>
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_type_accom'] ?? null; ?></small>
                                        </div>
                                    </div>

                                    <!-- Text select-->
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label"  for="oc_usage">Are You<span class=" "> </span></label>
                                            <Select id="oc_category" class="form-control input-md " name="oc_category" >
                                                <option value="">Select your type of occupation</option>
                                                <option value="The Owner" <?= set_select('oc_category', 'The Owner') ?>>The Owner</option>
                                                <option value="Tenant" <?= set_select('oc_category', 'Tenant') ?>>Tenant</option>
                                                <option value="Living in owner" <?= set_select('oc_category', 'Living in owner') ?>>Living in owner</option>
                                                <option value="Not Living in Owner" <?= set_select('oc_category', 'Not Living in Owner') ?>>Not Living in Owner</option>
                                            </Select>
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_category'] ?? null; ?></small>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label" for="oc_period">Period of Occupation<span class=" "> </label>
                                            <input type="text" id="oc_period" class="form-control input-md" placeholder="Period of Occupation" name="oc_period" value="<?= set_value('oc_period') ?>">
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_period'] ?? null; ?></small>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label" for="oc_adults">Occupants (Number of Adult)<span class=" "> </label>
                                            <input type="number" id="oc_adults" class="form-control input-md" placeholder="Number of Adult" name="oc_adults" value="<?= set_value('oc_adults') ?>">
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_adults'] ?? null; ?></small>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="sr-only control-label" for="oc_children">Occupants (Number of Children under 18)<span class=" "> </label>
                                            <input type="number" id="oc_children" class="form-control input-md" placeholder="Number of Children under 18" name="oc_children" value="<?= set_value('oc_children') ?>">
                                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_children'] ?? null; ?></small>
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
                                            <input type="text" id="oc_suburb" class="form-control input-md" placeholder="Suburb" name="oc_suburb" value="<?= set_value('oc_suburb') ?>">
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

