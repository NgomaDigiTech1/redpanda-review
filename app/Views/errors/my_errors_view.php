<?= $this->extend("layouts/base")?>

<?= $this->section("content")?>
<div class="row">	
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="container text-center mt-4">
			<div class="jumbotron" style="background-color: #dbe6d7">
				<h2>The page you're trying to access doesn't exist</h2>
				<p>Try something else</p>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm mb5">Home</a>
                    <a href="#!" class="btn btn-outline-success btn-sm mb5" onclick="history.back();">Back</a>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
<?= $this->endSection()?>