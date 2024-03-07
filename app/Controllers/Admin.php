<?php

namespace App\Controllers;

class Admin extends BaseController
{
    function __construct(){
        $this->model = new \App\Models\ModelAdmin();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    

    public function pojmy(){
        $data["seznam"] = $this->model->pojmy();
        return view('schvaleni-pojmu', $data);
    }

    public function schvalitSmazat()
    {
        $selectedIds = $this->request->getPost('box');

        if ($selectedIds) {
            $action = $this->request->getPost('action'); // 'approve' nebo 'delete'
            
            //$model = new ModelAdmin(); // Nahraďte YourModel za skutečný model
            foreach ($selectedIds as $id) {
                if ($action == 'schvalit') {
                    // Aktualizace schvaleno na 1
                    $this->model->update($id, ['schvaleno' => 1]);
                } elseif ($action == 'smazat') {
                    // Smazání záznamu
                    $this->model->delete($id);

                }
            }
        }

        return redirect()->to(base_url('admin/pojmy'));
    }

    public function kategorie(){
        $data["seznam"] = $this->model->kategorie();
        
        return view('schvaleni-kategorie', $data);
    }

    public function schvalitVymazat2()
    {
        $selectedIds = $this->request->getPost('box');

        if ($selectedIds) {
            $action = $this->request->getPost('action'); // 'approve' nebo 'delete'
            
            foreach ($selectedIds as $id) {
                if ($action == 'schvalit') {
                    // Aktualizace schvaleno na 1
                    $this->model->updateKat($id, ['schvaleno' => 1]);
                } elseif ($action == 'smazat') {
                    // Smazání záznamu
                    $this->model->deleteKat($id);

                }
            }
        }

        return redirect()->to(base_url('admin/kategorie'));
    }


    //úpravy pojmů a mazání --------------------------------------------------------------

    public function upravit (){
        $data["seznam"] = $this->model->getEdit();
        echo view('upravaForm', $data);
    }

    function upravitPojem($id){
        $data["seznam"] = $this->model->getKategorie();
        $data["seznam"] = $this->model->edit($id);

        echo view('upravitPojem', $data);
    }
    function upravKonec (){
        $id = $this->request ->getPost ('pojmy');

        $nazev = $this->request->getPost ('nazev');
        $cislo = $this->request->getPost ('cislo');


        $data = array (
            'nazev' => $nazev,
            'cislo' => $cislo,
        );

        $res = $this->model->db
        ->table ('vyrobce')
        ->where ('idvyrobce', $id)
        ->set ($data)
        ->update();

        //$result = $this->model->save ($data);
        if ($res) {
            return redirect()->route('admin/pojmy/upravit');
        } else {
            echo "Bohužel, nepovedlo se";}
        }

        function deletePoj($id){
            $this->model->delete($id);

            return redirect()->to(base_url('admin/pojmy/upravit'));
        }

//úpravy a mazání kategorie--------------------------------------------------------------

    public function upravitKat (){
        $data["seznam"] = $this->model->getEdit();
        echo view('upravaKat', $data);
    }

    function upravitKategorie($id){
        $data["seznam"] = $this->model->getKategorie();
        $data["seznam"] = $this->model->edit($id);

        echo view('upravitKat', $data);
    }
    function upravKonec (){
        $id = $this->request ->getPost ('kategorie');

        $nazev = $this->request->getPost ('nazev');
        $cislo = $this->request->getPost ('cislo');


        $data = array (
            'nazev' => $nazev,
            'cislo' => $cislo,
        );

        $res = $this->model->db
        ->table ('kategorie')
        ->where ('idvyrobce', $id)
        ->set ($data)
        ->update();

        //$result = $this->model->save ($data);
        if ($res) {
            return redirect()->route('admin/kategorie/upravit');
        } else {
            echo "Bohužel, nepovedlo se";}
        }

        function deleteKat($id){
            $this->model->deleteKat($id);

            return redirect()->to(base_url('admin/kategorie/upravit'));
        }


    }