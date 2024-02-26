<?php


echo $this->extend("layout/master");

echo $this->section("content");

echo '<div class="container">';
echo '<div class="row">';

helper("form");

echo form_open("uzivatel/podminky/novy");

?>

<h1>Vytvoř skupinu zkoušení</h1><br>
<label>Název skupiny</label><br>
<input type="text" name="nazev"><br>
<label>Pojmy</label>
<select name="pojmy[]" class="form-control multiple-select" multiple>
    <option value="0" disabled>--Vyber požadované pojmy--</option>
    

    <?php 
    foreach ($seznam as $row){
        ?>

        <option value="<?php echo $row->idpojmy;?>"><?php echo $row->nazev;?></option><br>
        <?php

    }
?>
</select>

<input class="btn btn-primary center" type="submit" name="vlozit" value="Přidat skupinu">


<?php

echo form_close();

echo '</div>';
echo '</div>';
echo $this->endSection();
?>
