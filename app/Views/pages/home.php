<?= $this->extend("layouts/base")?>
<?= $this->section("content")?>

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
        <?php if ($sectors):?>
          <?php foreach ($sectors as $value): ?>
            <div class="col-lg-3 col-md-4">
              <a
                href="<?= base_url()?>/product-by-sector/<?= $value['_id']?>/<?=url_title(strtolower($value['sector_name']))?>"
                class="card bg-white text-center shadow border-0 lift"
              >
                <div class="card-body p-3">
                  <div
                    class="icon-shape bg-warning-light rounded-circle icon-lg mb-3"
                  >
                    <img 
                        src="<?= base_url();?>/assets/rp_admin/images/sector/<?= $value['sector_image'] ?? "sect.jpg";?>" 
                        alt="img" class="rounded-circle" 
                        style="width:60px !important; height:60px !important" 
                    />
                  </div>
                  <h4><?= $value['sector_name'] ?></h4>
                </div>
              </a>
            </div>
            <?php endforeach;?>
          <?php endif;?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <hr class="" />
</div>

<div class="section-space80 bg-light">
  <div class="container">
    <div class="row">
      <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
        <div class="text-center">
          <img src="<?= base_url()?>/assets/rp_website/images/shield.svg" alt="Red Panda Prices" class="mb-4" />
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

<?= $this->endSection()?>