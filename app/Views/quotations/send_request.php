<?= $this->extend("layouts/base")?>
<?= $this->section("title")?>
<?= $title ?? "Red Panda Devis" ?>
<?= $this->endSection("title")?>
<?= $this->section("content")?>
<?php
$page_session = \Config\Services::session();
?>

<div class="row">	
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="container text-center mt-4">
			<div class="jumbotron" style="background-color: lightblue">
                <?php if($page_session->getTempdata('success')):?>
                    <div class="alert alert-success">
                        <?= $page_session->getTempdata('success');?>
                    </div>
                <?php endif?>
                <?php if($page_session->getTempdata('error')):?>
                    <div class="alert alert-danger">
                        <?= $page_session->getTempdata('error');?>
                    </div>
                <?php endif?>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm mb5">Home</a>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

<?= $this->endSection()?>