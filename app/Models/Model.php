<?php

namespace App\Models;


use Config\Database;

    class Model
    {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    /*
    function getPojmy(){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, kategorie.nazev as nazevKat');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner');

        $data = $builder->get()->getResult();
        return $data;
    }

    function getKategorie(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev');

        $data = $builder->get()->getResult();
        return $data;
    }

    function pridatPojmy($data) {
        $builder = $this->db->table("pojmy");
        $builder->insert($data);
    }
    */

    


}