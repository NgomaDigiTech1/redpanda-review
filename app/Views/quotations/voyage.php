<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?= site_url() ?>">Accueil</a></li>
                    <li class="active text-light">Assurance Voyage </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-space20">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <h1 class="text-bold">Compagnies pour l'Assurance Voyage</h1>
                    <p class="lead">Voici ici la liste de quelques compagnies offrant l'assurance voyage</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pdb40 compare-table">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:20%;" class="card-tag">Logo</th>
                                <th style="width:20%;" class="card-name">Compagnie</th>
                                <th style="width:21%;" class="anuual-fees">Offres</th>
                                <th class="reward-rate">Site Web</th>
                                <th class="action">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/rawsur.png" alt="rawsure" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title">RAWSUR</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">GOSUR (Entreprises et Particuliers)</td>
                                <td class="text-dark text-bold"><a href="https://rawsur.com/" target="_blank">rawsur.com</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-raw" aria-expanded="false" aria-controls="collapseExample-raw">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-raw">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">1. ASSISTANCE MEDICALE ET D’URGENCE</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Frais médicaux et hospitalisation à l’étranger</li>
                                                            <li>Evacuation médicale d’urgence</li>
                                                            <li>Soins dentaires d’urgence</li>
                                                            <li>Rapatriement de la dépouille mortelle</li>
                                                            <li>Rapatriement d’un membre de la famille voyageant avec le bénéficiaire</li>
                                                            <li>Retour d’urgence au domicile suite au décès d’un proche parent</li>
                                                            <li>Voyage d’un membre de la famille immédiate</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">2. PRESTATIONS D’ASSISTANCE PERSONNELLE</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Assistance médicale</li>
                                                            <li>Assistance et défense juridique</li>
                                                            <li>Services précédant le départ</li>
                                                            <li>Assistance générale internationale</li>
                                                            <li>Assistance pour l’obtention d’information à l’étranger au sujet des bagages ou
                                                                du passeport en cas de perte
                                                            </li>
                                                            <li>Livraison de médicaments</li>
                                                            <li>Avance de caution</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">3. PRESTATIONS POUR PERTES ET RETARDS</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Perte à l’étranger de passeport, permis de conduire ou carte d’identité
                                                                nationale
                                                            </li>
                                                            <li>Indemnité pour perte en vol de bagages enregistrés</li>
                                                            <li>Indemnité pour retard de l’arrivée des bagages</li>
                                                            <li>Localisation et acheminement des bagages et des effets personnels</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="mt30">
                                                    <h4 class="mb5">Information Connexe</h4>
                                                    <p>Visitez <a href="https://rawsur.com/">Rawsur</a> notre site !</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/activa.png" alt="activa" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title">ACTIVA</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">Activa Voyage</td>
                                <td class="text-dark text-bold"><a href="https://www.group-activa.com/" target="_blank">group-activa.com</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-activa" aria-expanded="false" aria-controls="collapseExample-activa">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-activa">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20"> VOYAGE</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Assistance médicale</li>
                                                            <li>Prolongation du séjour du bénéficiaire</li>
                                                            <li>Rapatriement de corps</li>
                                                            <li>Assistance juridique à l’étranger</li>
                                                            <li>Avance de Caution Pénale</li>
                                                            <li>Indemnité en cas de retard de livraison ou de perte de bagages</li>
                                                            <li>Indemnité en cas de retard de vol, etc…</li>
                                                            <li>Assistance d’un proche en cas de nécessité</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="mt30">
                                                    <h4 class="mb5">Information Connexe</h4>
                                                    <p>Visitez <a href="https://www.group-activa.com/">Activa Group</a> notre site !</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/sfa.png" alt="sfa" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title">SFA</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">Voyage et évacuation sanitaire</td>
                                <td class="text-dark text-bold"><a href="https://sfa-congo.com/" target="_blank">sfa-congo.com</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-sfa" aria-expanded="false" aria-controls="collapseExample-raw">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-sfa">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Transport sanitaire en cas de maladie ou d’accident survenant :</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Dans le pays de résidence, par l’assisteur, et l’intermédiaire de l’équipe
                                                                médicale
                                                            </li>
                                                            <li>A l’étranger, par l’assisteur, et l’intermédiaire de son équipe médicale</li>
                                                            <li>Avance des frais médicaux hors du pays de résidence</li>
                                                            <li>Accompagnement du bénéficiaire de moins de 18 ans par un proche</li>
                                                            <li>Retour vers le pays de résidence</li>
                                                            <li>Rapatriement du corps en cas de décès</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="mt30">
                                                    <h4 class="mb5">Information Connexe</h4>
                                                    <p>Visitez <a href="https://sfa-congo.com/">SFA</a> notre site !</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>