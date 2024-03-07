<?php

namespace App\Controllers;

use App\Models\PojmyModel;
use App\Models\KategorieZkouseniModel;
use App\Models\PojmyKategorieModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class PodminkyVlozeni extends BaseController
{
    public function index()
    {
        $pojmyModel = new PojmyModel();
        $kategorieModel = new KategorieZkouseniModel();

        $data['pojmy'] = $pojmyModel->findAll();
        $data['kategorie'] = $kategorieModel->findAll();

        return view('pridatPod', $data);
    }

    public function ulozit()
{
    $nazev = $this->request->getPost('nazev');
    $selectedPojmy = $this->request->getPost('pojmy');

    $kategorieZkouseniModel = new \App\Models\KategorieZkouseniModel();
    $kategorieZkouseniModel->insert([
        'nazev' => $nazev,
        'uzivatel_iduzivatel' => 1,
    ]);

    // Získání posledního autoincrement ID
    $idKategorieZkouseni = $kategorieZkouseniModel->insertID();

    // Vložení dat do tabulky pojmy_has_kategorieZkouseni
    $pojmyHasKategorieModel = new \App\Models\PojmyKategorieModel();
    foreach ($selectedPojmy as $idPojmy) {
        $data = [
            'pojmy_idpojmy' => $idPojmy,
            'kategorieZkouseni_idkategorieZkouseni' => $idKategorieZkouseni,
        ];
        $pojmyHasKategorieModel->insert($data);
    }

    // Přesměrování nebo zobrazení potvrzovací stránky
    //return redirect()->to('/success');
    echo "úspěch!";
}
}