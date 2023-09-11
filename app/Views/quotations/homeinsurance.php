<?= $this->extend("layouts/base")?>
<?= $this->section("content")?>
<?php
$page_session = \Config\Services::session();
?>

<div class="section-space40">
    <div class="container">
        <div class="row">

            <form id="regForm" class="justify-content-center" action="">
                <div class="mb60  section-title text-center  ">
                    <!-- section title start-->
                    <h1>Home Insurance</h1>
                    <div style="text-align:center;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>

                <div class="tab">
                    <h2 class="text-center">TYPE OF COVER</h2>
                    <div class="radio-group row justify-content-between px-3 text-center a">
                        <div class="col-auto mr-sm-2 mx-1 card-block py-0 text-center radio selected ">
                            <div class="flex-row">
                                <div class="col">
                                    <div class="pic"> <img class="irc_mut img-fluid" src="https://i.imgur.com/6r0XCez.png" width="100" height="100"> </div>
                                    <p>COMPREHENSIVE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ml-sm-2 mx-1 card-block py-0 text-center radio ">
                            <div class="flex-row">
                                <div class="col">
                                    <div class="pic"> <img class="irc_mut img-fluid" src="https://i.imgur.com/6r0XCez.png" width="100" height="100"> </div>
                                    <p>THIRD PARTY</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ml-sm-2 mx-1 card-block py-0 text-center radio ">
                            <div class="flex-row">
                                <div class="col">
                                    <div class="pic"> <img class="irc_mut img-fluid" src="https://i.imgur.com/6r0XCez.png" width="100" height="100"> </div>
                                    <p>PARTIAL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <Select id="title" class="form-control">
                            <option value="">Mr</option>
                            <option value="">Mme</option>
                            <option value="">Ms</option>
                        </Select>
                    </div>

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" id="middlename" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" id="surname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telephone Nbr (office)</label>
                        <input type="tel" id="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone2">Mobile nbre</label>
                        <input type="tel" id="phone2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="dob">DoB</label>
                        <input type="date" id="dob" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" id="age" class="form-control">
                    </div>
                </div>

                <div class="tab">


                    <div class="form-group">
                        <label for="accomodation">Type of Accomodation</label>
                        <select class="form-control" name="accomodation" id="accomodation">
                            <option value="">House</option>
                            <option value="">Appartment</option>
                            <option value="">Town House</option>
                            <option value="">Bungalow</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rooms">Number of Rooms</label>
                        <input type="number" id="rooms" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="usages">Usage</label>
                        <select class="form-control" name="usage" id="usages">
                            <option value="">Accomodation</option>
                            <option value="">Business</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="areyou">Are You</label>
                        <select class="form-control" name="usage" id="areyou">
                            <option value="">The Owner</option>
                            <option value="">Tenant</option>
                            <option value="">Living in owner</option>
                            <option value="">Not Living in Owner</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="period">Period of Occupation</label>
                        <input type="text" id="period" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="adultOccupant">Occupants (Number of Adult)</label>
                        <input type="text" id="adultOccupant" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="childrenOccupant">Occupants (Number of Children under 18)</label>
                        <input type="text" id="childrenOccupant" class="form-control">
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label for="physical">Physical Address 1</label>
                        <input type="text" id="physical" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="physical2">Physical Address 2</label>
                        <input type="text" id="physical2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="subrurb">Subrurb</label>
                        <input type="text" id="subrurb" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="town">Town</label>
                        <input type="text" id="town" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control">
                    </div>
                </div>

                <br>

                <div class="row justify-content-center">
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-secondary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </div>

            </form>
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

