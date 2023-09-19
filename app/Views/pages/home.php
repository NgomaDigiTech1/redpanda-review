<?= $this->extend("layouts/base") ?>
<?= $this->section("content") ?>

<div class="bg-primary bg-shape section-space100">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="text-center mb80">
          <h1 class="text-white">
            Compare Insurance, Products and Services
          </h1>
          <p class="text-white">
            Easily compare tons of options to make your quote
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="row hero-compare-features justify-content-center">
        <?php if ($sectors) : ?>
          <?php foreach ($sectors as $value) : ?>
            <div class="col-lg-3 col-md-4">
              <a href="<?= base_url() ?>/products-by-sector/<?= $value['sector_slug'] ?>/" class="card bg-white text-center shadow border-0 lift">

                <div class="card-body p-3">
                  <div class="icon-shape bg-warning-light rounded-circle icon-lg mb-3">
                    <img src="<?= base_url(); ?>/assets/rp_admin/images/sector/<?= $value['sector_image'] ?? "sect.jpg"; ?>" alt="img" class="rounded-circle" style="width:60px !important; height:60px !important" />
                  </div>
                  <h4><?= $value['sector_name'] ?></h4>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <hr class="" />
</div>
<!-- <div class="container section-space80">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <div class="mb-5 text-center">
        <h1 class="">Featured Articles</h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-12">
      <div class="mb-4">
        <a href="#!" class="mb-4 d-block">
          <img src="images/ft-post.jpg" alt="img" class="img-fluid w-100" />
        </a>
        <a href="#!">
          <h3>
            Coronavirus and cash: Why consumers should be cautious, but
            not fearful of handling dollars
          </h3>
        </a>
        <p>
          Here’s what you should know about handling cash during a
          pandemic.
        </p>
        <span class="font-14"><a href="#!" class="mr-2">Saving</a>|<span class="ml-2">
            MAR 26, 2020</span></span>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12">
      <div class="media mb-4">
        <div class="media-body">
          <a href="#!">
            <h3>
              List of banks offering help to customers impacted by the
              coronavirus
            </h3>
          </a>
          <span class="font-14"><a href="#!" class="mr-2">Saving</a>|<span class="ml-2">
              MAR 25, 2020</span></span>
        </div>
        <a href="#!"><img src="images/small-post-1.jpg" alt="img" class="img-fluid ml-5" /></a>
      </div>
      <div class="media mb-4 border-top pt-4">
        <div class="media-body">
          <a href="#!">
            <h3>
              13 steps to take if you’ve lost your job due to the
              coronavirus crisis
            </h3>
          </a>
          <span class="font-14"><a href="#!" class="mr-2">Banking</a>|<span class="ml-2">
              MAR 24, 2020</span></span>
        </div>
        <a href="#!"><img src="images/small-post-2.jpg" alt="img" class="img-fluid ml-5" /></a>
      </div>
      <div class="media mb-4 border-top pt-4">
        <div class="media-body">
          <a href="#!">
            <h3>
              Credit card issuers offer customer assistance in response to
              coronavirus
            </h3>
          </a>
          <span class="font-14"><a href="#!" class="mr-2">Credit card</a>|<span class="ml-2">
              MAR 23, 2020</span></span>
        </div>
        <a href="#!"><img src="images/small-post-3.jpg" alt="img" class="img-fluid ml-5" /></a>
      </div>
    </div>
  </div>
</div> -->
<div class="section-space80 bg-light">
  <div class="container">
    <div class="row">
      <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
        <div class="text-center">
          <img src="<?= base_url() ?>/assets/rp_website/images/shield.svg" alt="Red Panda Prices" class="mb-4" />
          <h1 class="">Your security. Our priority.</h1>
          <p>
            We always have your security in mind. Rest easy knowing your
            data is protected with 128-bit encryption.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  })
</script>

<?= $this->endSection() ?>