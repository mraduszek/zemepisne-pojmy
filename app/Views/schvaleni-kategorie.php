<?php

echo $this->extend('layout/master');

echo $this->section("content");

$table = new \CodeIgniter\View\Table();
$table->setHeading("", "Název");
foreach ($seznam as $row) {
    $box = '<input type="checkbox" name="box[]" value="' . $row->idkategorie . '">';
    $radek = array($box, $row->nazev);
    $table->addRow($radek);
}

$template = [
    'table_open'         => '<table class="table table-hover">',
    'thead_open'         => '<thead>',
    'thead_close'        => '</thead>',
    'heading_row_start'  => '<tr>',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end'   => '</th>',
    'tfoot_open'         => '<tfoot>',
    'tfoot_close'        => '</tfoot>',
    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',
    'tbody_open'         => '<tbody>',
    'tbody_close'        => '</tbody>',
    'row_start'          => '<tr>',
    'row_end'            => '</tr>',
    'cell_start'         => '<td>',
    'cell_end'           => '</td>',
    'row_alt_start'      => '<tr>',
    'row_alt_end'        => '</tr>',
    'cell_alt_start'     => '<td>',
    'cell_alt_end'       => '</td>',
    'table_close'        => '</table>',
];

$table->setTemplate($template);
?>

<div class="container">
    <div class="row">
        <div class="col-12 m-2">
            <form id="approvalForm" action="<?= base_url('admin/schvalitVymazat2') ?>" method="post">
                <?=$table->generate();?>
                <input type="hidden" name="action" id="action" value="">
                <button class="btn btn-success" type="button" onclick="setActionAndSubmit('schvalit')">Schválit</button>
                <button class="btn btn-danger" type="button" onclick="setActionAndSubmit('smazat')">Smazat</button>
            </form>
        </div>
    </div>
</div>

<script>
    function setActionAndSubmit(action) {
        document.getElementById('action').value = action;
        document.getElementById('approvalForm').submit();
    }
</script>

<?php
echo $this->endSection();
?>
