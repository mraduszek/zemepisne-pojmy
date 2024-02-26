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


}