<?php

namespace App\Controllers;

use App\Models\KategorieZkouseniModel;
use App\Models\PojmyModel;

class VlozeniController extends BaseController
{
    public function vlozitData()
    {
        // Získání dat z formuláře
        $nazevKategorie = $this->request->getPost('nazevKategorie');
        $selectedPojmy = $this->request->getPost('selectedPojmy');

        // Vložení dat do tabulky kategorieZkouseni
        $kategorieModel = new KategorieZkouseniModel();
        $kategorieData = ['nazev' => $nazevKategorie];
        $kategorieModel->insert($kategorieData);

        // Získání ID nově vložené kategorie
        $idKategorie = $kategorieModel->getInsertID();

        // Vložení dat do tabulky kategorie_has_pojmy
        $kategoriePojmyModel = new KategoriePojmyModel();
        foreach ($selectedPojmy as $idPojmu) {
            $data = [
                'idkategorieZkouseni' => $idKategorie,
                'idpojmy' => $idPojmu,
            ];
            $kategoriePojmyModel->insert($data);
        }

        // Odeslání zpět na formulář nebo jiné vhodné místo
        return redirect()->to('formular')->with('success', 'Data byla úspěšně vložena.');
    }
}