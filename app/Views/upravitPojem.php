<?php

echo $this->extend('layout/master');

echo $this->section("content");
echo '<div class="d-flex justify-content-center">';
helper('form');

foreach($seznam as $row){
	?>
	<div class="col-sm-12 col-lg-6 col-sm-xl-3">
		<form method="post" action="<?=base_url("konecUprav/")?>" class="">
			<div class="card" style="width:100%">
				

				<div class="card-tittle">

					<input type="text" class="form-control" id="nazev" name="nazev" value="<?= $row->nazev ?>">
				</div>
				<label>Kategorie</label>
				<select name="idkategorie" class="form-control">
					<option value="<?= $row->idkategorie ?> selected" ><?= $row->kategorie ?></option>


					<?php 
					foreach ($seznam as $row){
						?>

						<option value="<?php echo $row->idkategorie;?>"><?php echo $row->kategorie;?></option><br>
						<?php

					}
					?>
				</select>
			</div>
			<input type="hidden" id="idvyrobce" name="idpojmy" value="<?= $row->idpojmy ?>">
			<input type="hidden" name="_method" value="PUT">

			<button type="submit" class="btn btn-primary">Odeslat</button>
		</form>
	</div>
</div>
</div>
<?php
}

echo '</div>';

echo $this->endSection();