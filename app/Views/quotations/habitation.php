<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?= site_url() ?>">Accueil</a></li>
                    <li class="active text-light">Assurance Habitation</li>
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
                    <h1 class="text-bold">Compagnies pour l'Assurance Habitation</h1>
                    <p class="lead">Voici ici la liste de quelques compagnies offrant l'assurance habitation</p>
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
                                <td class="text-dark text-bold">Garantie de base, Garantie de complémentaire</td>
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
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">1. Garantie de base</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Incendie, implosions, explosion et chute de foudre</li>
                                                            <li>Dommages directs en dégât des eaux</li>
                                                            <li>Recours de voisins et des tiers</li>
                                                            <li>Hautes eaux et inondation</li>
                                                            <li>Tempête, ouragan, cyclone, tombes d’eau</li>
                                                            <li>Chute d’un aéronef</li>
                                                            <li>Choc de véhicule terrestre identifié</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">2. Garantie complémentaire</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Tous dommages en vol</li>
                                                            <li>Responsabilité civile RC Chef de famille</li>
                                                            <li>Perte de loyer / Privation de jouissance</li>
                                                            <li>Dommages aux matériels informatiques</li>
                                                            <li>Dommages directs en bris de glace</li>
                                                            <li>Dommages électriques</li>
                                                            <li>Bris de machine</li>
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
                                <td class="text-dark text-bold">Multi risque</td>
                                <td class="text-dark text-bold"><a href="https://www.group-activa.com" target="_blank">group-activa.com</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-activa" aria-expanded="false" aria-controls="collapseExample-activa">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-activa">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20"> Multi Risque</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Incendie affectant vos biens meubles et immeubles</li>
                                                            <li>Vol ou tentative de vol</li>
                                                            <li>Dégât des eaux</li>
                                                            <li>Bris de glaces</li>
                                                            <li>Responsabilité civile en tant que chef de famille</li>
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
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/myfair.png" alt="myfair" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title"> MAYFAIR Insurance</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">Multirisque Habitation</td>
                                <td class="text-dark text-bold"><a href="https://drc.mayfairinsurance.africa/" target="_blank">drc.mayfairinsurance.africa</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-myf" aria-expanded="false" aria-controls="collapseExample-raw">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-myf">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Multirisque Habitation </h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Incendie, foudre, tremblement de terre ou éruption volcanique, incendie souterrain</li>
                                                            <li>Explosion</li>
                                                            <li>Emeutes et grèves dues à des événements non politiques</li>
                                                            <li>Aéronef ou autre appareil aérien ou tout article en est tombé</li>
                                                            <li>Eclatement ou débordement d’un appareil ou d’une conduite de réservoir d’eau</li>
                                                            <li>Vol accompagné d’effraction forcée et violente dans ou hors des
                                                                bâtiments ou toute tentative de menace à l’exclusion des pertes ou
                                                                dommages survenant alors que les bâtiments sont laissés non
                                                                meublés
                                                            </li>
                                                            <li>Impact avec le bâtiment par tut véhicule routier ou animal
                                                                n’appartenant pas à l’assuré ou à tout membre de sa famille
                                                                résidant normalement avec lui </li>
                                                            <li>Tempête mais à l’exclusion des dommages causés par un
                                                                affaissement ou un glissement de terrain ou des dommages à tout
                                                                bâtiment au cours de la construction, de la reconstruction ou des
                                                                réparations auvents, stores, enseignes, antennes extérieures de
                                                                télévision et de radio, accessoires d’antenne, mâts et tours ou
                                                                autres installations et accessoires d’extérieur, y compris portails et
                                                                clôtures
                                                            </li>
                                                            <li>
                                                                Frais supplémentaires de logement alternatif et perte de loyer (ne
                                                                dépassant pas dix pour cent de la somme assurée) dans le cas où
                                                                les bâtiments seraient tellement endommagés par l’un des risques
                                                                ci-dessus qu’ils deviendraient inhabitables.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            
                                            <div class="col-xl-12">
                                                <div class="mt30">
                                                    <h4 class="mb5">Information Connexe</h4>
                                                    <p>Visitez <a href="https://drc.mayfairinsurance.africa/">MyFairInsurance</a> notre site !</p>
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