<?php

namespace Mikelnavarro\Exotic;
use Mikelnavarro\Exotic\Db;
use PDO;
class Usuario
{

    protected $db;
    public function __construct() {
        $this->db = new Db();
    }

    // Funciones
}