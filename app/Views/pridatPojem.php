<?php


echo $this->extend("layout/master");

echo $this->section("content");

echo '<div class="container">';
echo '<div class="row">';

helper("form");

echo form_open("uzivatel/pojmy/novy");

?>
<div id="form">

    <h1>Přidej pojem</h1><br>
    <label>Název</label>
    <div class="polozky">
        <input type="text" name="nazvy[]"><br>
        <label>Kategorie</label>
        <select name="idkategorie[]" class="form-control">
            <option value="0" >--Vyber kategorii--</option>


            <?php 
            foreach ($seznam as $row){
                ?>

                <option value="<?php echo $row->idkategorie;?>"><?php echo $row->nazev;?></option><br>
                <?php

            }
            ?>
        </select>
    </div>
</div>
<button type="button" class="btn btn-primary" onclick="appendPolozka()">Přidat další</button><br>


<script>
    function appendPolozka() {
        var novy_input = '<div class="polozky">' +
            '<label>Název</label><br>'+
            '<input type="text" name="nazvy[]"><br>' +
            '<label>Kategorie</label>' +
            '<select name="idkategorie[]" class="form-control">' +
            '<option value="0">--Vyber kategorii--</option>';

        <?php
        foreach ($seznam as $row) {
            echo 'novy_input += \'<option value="' . $row->idkategorie . '">' . $row->nazev . '</option>\';';
        }
        ?>

        novy_input += '</select></div>';

        $("#form").append(novy_input);
    }
</script>



<input class="btn btn-primary" type="submit" name="vlozit" value="Přidat pojem">
<?php
//echo form_submit("vlozit", "Přidat pojem");



echo form_close();

echo '</div>';
echo '</div>';
echo $this->endSection();
?>
