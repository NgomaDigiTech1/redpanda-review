<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt40">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?= site_url() ?>">Accueil</a></li>
                    <li class="active text-light">Assurance risque chantier</li>
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
                    <h1 class="text-bold">Compagnies pour l'Assurance risque chantier</h1>
                    <p class="lead">Voici ici la liste de quelques compagnies offrant l'assurance risque chantier </p>
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
                                <td class="text-dark text-bold">Tous chantiers risques</td>
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
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Chantiers Risques</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Dommage à l’ouvrage</li>
                                                            <li>Période d’entretien</li>
                                                            <li> La responsabilité civile</li>
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
                                <td class="text-dark text-bold">Tous risques chantiers, Montage-Essai</td>
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
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Tous risques Chantiers / Montage - Essai</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <i> <b>En cas de sinistre</b>, Activa remboursera</i>
                                                            <p style="text-align: justify;">
                                                                Les frais pour la remis en état de l’ouvrage ou parti de l’ouvrage
                                                                endommagé par un évènement garantie;
                                                                Les dommages subis par les tiers fait de l’exécution des travaux
                                                            </p>
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
                                <td class="text-dark text-bold">Tous Risques Chantiers Plus</td>
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
                                                        <h4 class="mb20">Risques Chantiers Plus</h4>
                                                        <p style="text-align: justify;">
                                                            La SFA assure tous dégâts et pertes affectant les biens à ériger
                                                            définitivement qui sont mentionnés dans les contrats d’entreprise y
                                                            compris les ouvrages provisoires, baraquements de chantier, les matériels
                                                            et équipements de chantier, les engins de chantier, etc… cette garantie
                                                            couvre la valeur totale de l’ouvrage, y compris : les matériaux et éléments
                                                            de construction qui y sont incorporés ; les équipements qui y sont
                                                            installés : machines, appareils et installations
                                                        </p>
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
                        <tbody>
                            <tr>
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/myfair.png" alt="myfair" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title"> MAYFAIR Insurance</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">Tous Risques Chantiers</td>
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
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Tous Risques Chantiers</h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Incendie, foudre, explosion</li>
                                                            <li>Innondation, crue</li>
                                                            <li>Tempête de vent de toute nature</li>
                                                            <li>Tremblement de terre</li>
                                                            <li>Vol, cambriolage</li>
                                                            <li>
                                                                Mauvaise exécution, manque de compétence, négligence, actes
                                                                malveillants ou erreur humain
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
                        <tbody>
                            <tr>
                                <td><img src="<?= site_url() ?>assets/rp_website/images/companies/sonas.png" alt="sonas" class="img-fluid"></td>
                                <td>
                                    <span class="text-dark compare-card-title"> SONAS</span>
                                    <br>
                                    <div class="icon rate-done mb10"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star "></i></div>
                                </td>
                                <td class="text-dark text-bold">Tous Risques Chantiers</td>
                                <td class="text-dark text-bold"><a href="https://www.sonas.cd/" target="_blank">sonas.cd</a></td>
                                <td class="text-center">
                                    <a href="#!" class="btn btn-secondary btn-sm mb5">Apply Now</a>
                                    <div class="mt10"><a class="btn-link" id="example-one" data-text-swap="Hide Details" data-text-original="Expand Details" data-toggle="collapse" href="#collapseExample-sonas" aria-expanded="false" aria-controls="collapseExample-raw">Détails </a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="collapseExample-sonas">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <h4 class="mb20">Tous Risques Chantiers </h4>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Responsabilité civile croisé</li>
                                                            <li>Garantie de dommages d’ouvrage.</li>
                                                        </ul>
                                                        <b>Les biens non assurés</b>
                                                        <ul class="bullet bullet-check-circle list-unstyled">
                                                            <li>Equipements de chantier : engins e baraquement</li>
                                                            <li>Biens non arrivés sur le site</li>
                                                            <li>Terrain de construction n’est pas un bien assurable</li>
                                                            <li>Biens des tiers au chantiers (les avoisinants)</li>
                                                            <li>Les existants</li>
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