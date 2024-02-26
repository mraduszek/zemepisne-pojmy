<?php

echo $this->extend("layout/master");

echo $this->section("content");

echo '<div class="container">';
echo '<div class="row">';

helper("form");

echo form_open("uzivatel/kategorie/novy");

?>
<div id="form">
    <h1>Přidej kategorii</h1><br>
    <label>Název</label>
    <div class="polozky">
        <input type="text" name="nazvy[]"><br>


    </div>




<button type="button" class="btn btn-primary" onclick="appendPolozka()">Přidat další</button><br>
<input class="btn btn-primary center" type="submit" name="vlozit" value="Přidat kategorie">
</div>

<?php


echo form_close();

echo '</div>';
echo '</div>';
?>
<script>
    function appendPolozka(){
        var novy_input = '<label>Název</label><br>'+
            '<input type="text" name="nazvy[]"><br>';
        
        $("#form .polozky").append(novy_input);
    }
</script>

<?php
$this->endSection();
?>



