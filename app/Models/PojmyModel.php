<?php

namespace App\Models;

use CodeIgniter\Model;

class PojmyModel extends Model
{
    protected $table = 'pojmy';
    protected $primaryKey = 'idpojmy';
    protected $allowedFields = ['idpojmy', 'nazev', 'kategorie_idkategorie', 'schvaleno'];
}