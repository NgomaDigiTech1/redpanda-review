<?= $this->extend("layouts/base")?>
<?= $this->section("title")?>
<?= $title ?? "Red Panda Prices" ?>
<?= $this->endSection("title")?>
<?= $this->section("content")?>

<?php

//Session for ProductChar id

//session()->set('product_id', $product_char->product_id);

helper('form');

?>

    <div class="section-space40">
        <div class="container">

            <div class="row">
                <div class="card p-5" style="width: 600px">
                    <?= form_open("quotations/submitDevis") ?>
                        <div class="mb60  section-title text-center  ">
                            <!-- section title start-->
                            <h1>Home Insurance</h1>
                        </div>


<!--                    <input type="text" class="form-control" value="--><?//=$product_char->product_name;?><!--" name="oc_prod_name">-->
<!--                    <input type="text" class="form-control" value="--><?//=$product_char->org_name;?><!--" name="oc_org_name">-->
<!--                    <input type="text" class="form-control" value="--><?//=$product_char->org_email;?><!--" name="oc_org_email">-->
<!--                    <input type="text" class="form-control" value="--><?//=$product_char->org_website;?><!--" name="oc_org_email">-->


                    <br>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <Select id="title" class="form-control" name="oc_title" >
                                <option value="">Select your title</option>
                                <option value="Mr" <?= set_select('oc_title', 'Mr') ?>>Mr</option>
                                <option value="Mme" <?= set_select('oc_title', 'Mme') ?>>Mme</option>
                                <option value="Ms <?= set_select('oc_title', 'Mrs') ?>">Ms</option>
                            </Select>
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_title'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_first_name">First Name</label>
                            <input type="text" id="oc_first_name" class="form-control" value="<?= set_value('oc_first_name') ?>" name="oc_first_name">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_first_name'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_middle_name">Middle Name</label>
                            <input type="text" id="oc_middle_name" class="form-control" name="oc_middle_name" value="<?= set_value('oc_middle_name') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_middle_name'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_surname">Surname</label>
                            <input type="text" id="surname" class="form-control" name="oc_surname" value="<?= set_value('oc_surname') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_surname'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_email">Email</label>
                            <input type="email" id="email" class="form-control" name="oc_email" value="<?= set_value('oc_email') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_email'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_phone">Telephone (office)</label>
                            <input type="tel" id="phone" class="form-control" name="oc_phone" value="<?= set_value('oc_phone') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_phone'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_mobile">Mobile </label>
                            <input type="tel" id="phone2" class="form-control" name="oc_mobile" value="<?= set_value('oc_mobile') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_mobile'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_dob">DoB</label>
                            <input type="date" id="dob" class="form-control" name="oc_dob" value="<?= set_value('oc_dob') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_dob'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_age">Age</label>
                            <input type="number" id="age" class="form-control" name="oc_age" value="<?= set_value('oc_age') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_age'] ?? null; ?></small>
                        </div>


                        <div class="form-group">
                            <label for="oc_type_accom">Type of Accommodation</label>
                            <select class="form-control" id="accommodation" name="oc_type_accom">
                                <option value="">Select your type</option>
                                <option value="House" <?= set_select('oc_type_accom', 'House') ?>>House</option>
                                <option value="Apartment" <?= set_select('oc_type_accom', 'Apartment') ?>>Apartment</option>
                                <option value="Town House" <?= set_select('oc_type_accom', 'Town House') ?>>Town House</option>
                                <option value="Bungalow" <?= set_select('oc_type_accom', 'Bungalow') ?>>Bungalow</option>
                            </select>
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_type_accom'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_rooms">Number of Rooms</label>
                            <input type="number" id="rooms" class="form-control" name="oc_rooms" value="<?= set_value('oc_rooms') ?>"">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_rooms'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_usage">Usage</label>
                            <select class="form-control" name="oc_usage" id="oc_usage">
                                <option value="">Select usage</option>
                                <option value="Accommodation" <?= set_select('oc_usage', 'Accommodation') ?>>Accommodation</option>
                                <option value="Business" <?= set_select('oc_usage', 'Business') ?>>Business</option>
                            </select>
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_usage'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_category">Are You</label>
                            <select class="form-control" id="areyou" name="oc_category">
                                <option value="">Select your type</option>
                                <option value="The Owner" <?= set_select('oc_category', 'The Owner') ?>>The Owner</option>
                                <option value="Tenant" <?= set_select('oc_category', 'Tenant') ?>>Tenant</option>
                                <option value="Living in owner" <?= set_select('oc_category', 'Living in owner') ?>>Living in owner</option>
                                <option value="Not Living in Owner" <?= set_select('oc_category', 'Not Living in Owner') ?>>Not Living in Owner</option>
                            </select>
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_category'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_period">Period of Occupation</label>
                            <input type="text" id="period" class="form-control" name="oc_period" value="<?= set_value('oc_period') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_period'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_adults">Occupants (Number of Adult)</label>
                            <input type="number" id="adultOccupant" class="form-control" name="oc_adults" value="<?= set_value('oc_adults') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_adults'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_children">Occupants (Number of Children under 18)</label>
                            <input type="number" id="childrenOccupant" class="form-control" name="oc_children" value="<?= set_value('oc_children') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_children'] ?? null; ?></small>
                        </div>


                        <div class="form-group">
                            <label for="oc_phys_add_one">Physical Address 1</label>
                            <input type="text" id="physical" class="form-control" name="oc_phys_add_one" value="<?= set_value('oc_phys_add_one') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_phys_add_one'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_phys_add_two">Physical Address 2</label>
                            <input type="text" id="physical2" class="form-control" name="oc_phys_add_two" value="<?= set_value('oc_phys_add_two') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_phys_add_two'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_suburb">Subrurb</label>
                            <input type="text" id="suburb" class="form-control" name="oc_suburb" value="<?= set_value('oc_suburb') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_suburb'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_town">Town</label>
                            <input type="text" id="town" class="form-control" name="oc_town" value="<?= set_value('oc_town') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_town'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_country">Country</label>
                            <input type="text" id="country" class="form-control" name="oc_country" value="<?= set_value('oc_country') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_country'] ?? null; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="oc_city">City</label>
                            <input type="text" id="city" class="form-control" name="oc_city" value="<?= set_value('oc_city') ?>">
                            <small id="input-help" class="form-text text-danger"><?= $validation['oc_city'] ?? null; ?></small>
                        </div>
                        <br>

                        <div class="btn-action">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



<?= $this->endSection()?>