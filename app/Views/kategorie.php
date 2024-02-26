<?php

echo $this->extend('layout/master');

echo $this->section("content");

$table = new \CodeIgniter\View\Table();
$table->setHeading("Název");
foreach ($seznam as $row) {
    $radek = array($row->nazev);
    $table->addRow($radek);
}

$template = [
    'table_open'         => '<table id="dataTable" class="table table-striped">',
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
        <?=$table->generate();?>
        </div>
    </div>
</div>

<?php
echo $this->endSection();
?>
