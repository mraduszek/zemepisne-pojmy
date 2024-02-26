<?php

namespace App\Controllers;

class Podminky extends BaseController
{
    function __construct(){
        $this->model = new \App\Models\ModelPodminky;
        $this->model2 = new \App\Models\ModelPojem;
    }


    public function get(){
        $data["seznam"] = $this->model->get();

        return view('podminky', $data);
    }

    public function pridatPod(){
        $data["seznam"] = $this->model2->get();

        return view('pridatPod', $data);
    }

    public function pridat(){

    }

    
    
}