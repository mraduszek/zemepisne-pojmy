<?php

echo $this->extend('layout/master');

echo $this->section("content");
$nahodnyPojem
?>
<form method="post" action="zkouseni">
    <label for="kategorie">Vyberte kategorie:</label>
    <select name="kategorie[]" id="kategorie" class="form-control multiple-select" multiple>
        <?php foreach ($kategorie as $kategorieItem): ?>
            <option value="<?= $kategorieItem['idkategorie']; ?>"><?= $kategorieItem['nazev']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit" name="submit">Losovat</button>
</form>

<?php if (isset($nahodnyPojem)): ?>
    <p>Náhodně vybraný pojem: <?= $nahodnyPojem['nazev']; ?></p>
<?php endif; ?>

<?php
echo $this->endSection();
?>
