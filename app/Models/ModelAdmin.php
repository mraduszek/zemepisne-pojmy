<?php

namespace App\Models;


use Config\Database;

class ModelAdmin
{
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function pojmy(){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, pojmy.schvaleno, kategorie.nazev as nazevKat');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner');
        $builder->where('pojmy.schvaleno', 0);

        $data = $builder->get()->getResult();
        return $data;
    }

    public function update($id)
    {
        $builder = $this->db->table('pojmy');
        $builder->where('idpojmy', $id);
        return $builder->update(['schvaleno' => 1]);
    }

    // Metoda pro smazání záznamu
    public function delete($id)
    {
        $builder = $this->db->table('pojmy');
        $builder->where('idpojmy', $id);
        return $builder->delete();
    }

    public function kategorie(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev, schvaleno');
        $builder->where('schvaleno', 0);

        $data = $builder->get()->getResult();
        return $data;
    }

    public function getKategorie(){
        $builder = $this->db->table('kategorie');
        $builder->select('idkategorie, nazev, schvaleno');
        $builder->where('schvaleno', 1);

        $data = $builder->get()->getResult();
        return $data;
    }

    public function updateKat($id)
    {
        $builder = $this->db->table('kategorie');
        $builder->where('idkategorie', $id);
        return $builder->update(['schvaleno' => 1]);
    }

    // Metoda pro smazání záznamu
    public function deleteKat($id)
    {
        $builder = $this->db->table('kategorie');
        $builder->where('idkategorie', $id);
        return $builder->delete();
    }


    public function getEdit(){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, kategorie.idkategorie as idkategorie, kategorie.nazev as kategorie, pojmy.schvaleno');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner'); 

        $data = $builder->get()->getResult();
        return $data;
    }

    public function edit($id){
        $builder = $this->db->table('pojmy');
        $builder->select('pojmy.idpojmy, pojmy.nazev, kategorie.idkategorie as idkategorie, kategorie.nazev as kategorie, pojmy.schvaleno');
        $builder->join('kategorie', 'pojmy.kategorie_idkategorie=kategorie.idkategorie', 'inner');
        $builder->where('pojmy.idpojmy', $id);

        $data = $builder->get()->getResult();
        return $data;
    }

    

    



}