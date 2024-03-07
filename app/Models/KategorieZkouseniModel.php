<?php

namespace App\Models;

use CodeIgniter\Model;

class KategorieZkouseniModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table = 'kategorieZkouseni';
    protected $primaryKey = 'idkategorieZkouseni';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['idkategorieZkouseni', 'nazev', 'uzivatel_iduzivatel'];
}