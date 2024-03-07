<?php

echo $this->extend('layout/master');

echo $this->section("content");

$table = new \CodeIgniter\View\Table();
$table->setHeading("Název", "Kategorie");
foreach ($seznam as $row) {
	$upravit = '<a href="'. base_url("admin/pojmy/upravit/" . $row->idpojmy) . '" class=""><button type="submit" class="btn btn-success btn-sm">Upravit</button></a>';
	$smazat = '<a href="' . base_url("admin/pojmy/smazat/" . $row->idpojmy) . '" class=""><button type="submit" class="btn btn-danger btn-sm">Smazat</button></a>';
	$akce = '<div class="text-right">' . $upravit . ' ' . $smazat . '</div>'; // Zarovnání tlačítek vpravo
    $radek = array($row->nazev, $row->kategorie, $akce);
    $table->addRow($radek);
}

$template = [
    'table_open'         => '<table id="dataTable" class="table table-hover">',
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
