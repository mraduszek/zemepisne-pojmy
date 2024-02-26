<?php

namespace App\Controllers;

class Zkouska extends BaseController
{
    public function losuj()
    {
        $myModel = new \App\Models\ModelLos();

        $data['kategorie'] = $myModel->getApprovedCategories();

        if ($this->request->getPost('submit')) {
            $selectedCategories = $this->request->getPost('kategorie');

            $vybranePojmy = $this->session->get('vybranePojmy') ?? [];

            do {
                $nahodnyPojem = $myModel->getRandomApprovedTerm($selectedCategories);
            } while (in_array($nahodnyPojem['idpojmy'], $vybranePojmy));

            $vybranePojmy[] = $nahodnyPojem['idpojmy'];
            $this->session->set('vybranePojmy', $vybranePojmy);

            $data['nahodnyPojem'] = $nahodnyPojem;
        }

        echo view('losovani', $data);
    }


}