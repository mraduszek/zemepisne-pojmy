<?php

namespace App\Controllers;

class Kategorie extends BaseController
{
    function __construct(){
        $this->model = new \App\Models\ModelKategorie();
    }

    public function get(){
        $data["seznam"] = $this->model->get();
        return view('kategorie', $data);
    }

    public function getUziv(){
        $data["seznam"] = $this->model->getUziv();
        return view('kategorieUziv', $data);
    }

    public function pridatKat(){
        

        return view('pridatKategorie');
    }

    public function pridat(){
        if ($this->request->getMethod() == "post") {

            $nazvy = $this->request->getPost("nazvy");


            foreach ($nazvy as $nazev) {
            $this->model->pridatKategorie([
                "nazev" => $nazev,
                "schvaleno" => 0

            ]);}
        


            return redirect()->redirect(site_url("/uzivatel/kategorie"));
            }else{
       $data["title"] = "přidat kategorie";
    }}

    public function kategorie($cid){
        $data["seznam"] = $this->model->druhy($cid);
        

        echo view('kategorie', $data);
    }

}