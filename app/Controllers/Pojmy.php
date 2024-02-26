<?php

namespace App\Controllers;

class Pojmy extends BaseController
{
    function __construct(){
        $this->model = new \App\Models\ModelPojem();
    }


    public function get(){
        $data["seznam"] = $this->model->get();
        return view('pojmy', $data);
    }

    public function getUziv(){
        $data["seznam"] = $this->model->getUziv();
        return view('pojmyUziv', $data);
    }

    public function pridatPojem(){
        $data["seznam"] = $this->model->getKategorie();

        return view('pridatPojem', $data);
    }

    public function pridat(){
        if ($this->request->getMethod() == "post") {

            $nazvy = $this->request->getPost("nazvy");
            $kategorie_idkategorie = $this->request->getPost("idkategorie");
            //$schvaleno = $this->request->getPost("schvaleno");
            /*$this->model->pridatUzivatele([
                "jmeno" => $jmeno
            ]);*/

            foreach ($nazvy as $key => $nazev) {
            $this->model->pridatPojmy([
                "nazev" => $nazev,
                "kategorie_idkategorie" => $kategorie_idkategorie[$key],
                "schvaleno" => 0

            ]);}
        


            return redirect()->redirect(site_url("/uzivatel/pojmy"));
            }else{
       $data["title"] = "přidat pojmy";
        //echo view('pridatUzivatele', $data);
   }
    }
}