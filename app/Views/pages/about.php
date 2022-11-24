<?= $this->extend("../layouts/main")?>

<?= $this->section("title")?>
    <?= $title ?>
<?= $this->endSection("title")?>

<?= $this->section("content")?>
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="jumbotron m-5">
			<h1><?= $title ?></h1>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Assumenda, voluptas commodi, necessitatibus vitae quisquam repellendus fuga esse magnam deleniti hic facere nihil soluta alias dolores maxime eius ea non in.	</p>
			<br>

			<?= $this->include("authers/training")?>	

		</div>
	</div>
	<div class="col-md-2"></div>
</div>
<?= $this->endSection()?>