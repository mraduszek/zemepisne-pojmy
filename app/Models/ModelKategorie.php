<?php

namespace App\Models;


use Config\Database;

    class ModelKategorie
    {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function get(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev, schvaleno');
        $builder->where('schvaleno', 1);

        $data = $builder->get()->getResult();
        return $data;
    }

    function getUziv(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev, schvaleno');
        

        $data = $builder->get()->getResult();
        return $data;
    }


    function pridatKategorie($data) {
        $builder = $this->db->table("kategorie");
        $builder->insert($data);
    }

    



}