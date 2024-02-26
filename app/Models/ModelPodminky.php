<?php

namespace App\Models;


use Config\Database;

    class ModelPodminky
    {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function getPojmy(){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, pojmy.schvaleno, kategorie.nazev as nazevKat');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner');
        $builder->where('pojmy.schvaleno', 1);

        $data = $builder->get()->getResult();
        return $data;
    }

    function getUziv(){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, kategorie.nazev as nazevKat, pojmy.schvaleno');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner');

        $data = $builder->get()->getResult();
        return $data;
    }

    function getKategorie(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev');
        $builder->where('schvaleno', 1);

        $data = $builder->get()->getResult();
        return $data;
    }


    function pridatPojmy($data) {
        $builder = $this->db->table("pojmy");
        $builder->insert($data);
    }

    



}