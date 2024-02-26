<?php

namespace App\Controllers;

class Projekt extends BaseController
{
    function __construct(){
        $this->model = new \App\Models\Model();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function zkouska()
    {
        return view('zkouska');
    }

    public function zkouseni(){
        return view('zkouseni');
    }

    public function getPojmy(){
        $data["seznam"] = $this->model->getPojmy();
        return view('pojmy', $data);
    }

    public function pridatPojem(){
        $data["seznam"] = $this->model->getKategorie();

        return view('pridatPojem', $data);
    }

    public function pridat(){
        if ($this->request->getMethod() == "post") {

            $nazev = $this->request->getPost("nazev");
            $idkategorie = $this->request->getPost("idkategorie");
            $idautor = $this->request->getPost("idautor");
            $schvaleno = $this->request->getPost("schvaleno");
            /*$this->model->pridatUzivatele([
                "jmeno" => $jmeno
            ]);*/

            $this->model->pridatPojmy([
                "nazev" => $nazev,
                "idkategorie" => $idkategorie,
                "idautor" => $idautor,
                "schvaleno" => $schvaleno

            ]);
        


            return redirect()->redirect(site_url("/pojmy"));
            }else{
       $data["title"] = "přidat pojmy";
        //echo view('pridatUzivatele', $data);
   }
    }
}