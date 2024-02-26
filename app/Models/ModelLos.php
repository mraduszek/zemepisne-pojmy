<?php

namespace App\Models;


use Config\Database;

    class ModelLos
    {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    protected $tablePojmy = 'pojmy';
    protected $tableKategorie = 'kategorie';

    public function getRandomApprovedTerm($categoryIds)
    {
        $this->select('pojmy.*');
        $this->join('kategorie', 'kategorie.idkategorie = pojmy.kategorie_idkategorie');
        $this->where('pojmy.schvaleno', 1);
        $this->whereIn('pojmy.kategorie_idkategorie', $categoryIds);
        $this->orderBy('RAND()');
        $this->limit(1);

        return $this->first();
    }

    public function getApprovedCategories()
{
    $builder = $this->db->table('kategorie');
    $builder->select('*');
    $builder->where('schvaleno', 1);

    return $builder->get()->getResultArray();
}

    



}