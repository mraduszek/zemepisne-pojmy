<?php

namespace App\Models;

use CodeIgniter\Model;

class PojmyKategorieModel extends Model
{
    protected $table = 'pojmy_has_kategorieZkouseni';
    protected $primaryKey = ['pojmy_idpojmy', 'kategorieZkouseni_idkategorieZkouseni']; // Bez primárního klíče
    protected $allowedFields = ['pojmy_idpojmy', 'kategorieZkouseni_idkategorieZkouseni'];
}