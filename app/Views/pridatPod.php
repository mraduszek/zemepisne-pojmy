<?php


echo $this->extend("layout/master");

echo $this->section("content");

echo '<div class="container">';
echo '<div class="row">';
?>

<h1>Vytvoř skupinu zkoušení</h1><br>
<form action="<?= base_url('skupiny/vlozeni/ulozit') ?>" method="post">
    <label for="nazev">Název kategorie:</label>
    <input type="text" name="nazev" id="nazev" required>

    <label for="pojmy">Vyberte pojmy:</label>
    <select name="pojmy[]" id="pojmy" class="form-control multiple-select" multiple>
        <?php foreach ($pojmy as $pojem): ?>
            <option value="<?= $pojem['idpojmy'] ?>"><?= $pojem['nazev'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Uložit</button>
</form>

<?php
echo '</div>';
echo '</div>';
echo $this->endSection();
?>