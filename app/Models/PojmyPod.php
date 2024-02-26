<?php

namespace App\Models;


use Config\Database;

    class PojmyPod
    {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    

    



}