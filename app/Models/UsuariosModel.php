<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    public function autenticar($usuario, $senha) {

        $db = \Config\Database::connect();
        
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ? LIMIT 1";

        $query = $this->db->query($sql, [$usuario, $senha]);

        return $query->getRowArray();
    }

    public function cadastrar($usuario, $senha) {

        $db = \Config\Database::connect();
        $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";

        $query = $this->db->query($sql, [$usuario, $senha]);

        return view('index.php');
    }
}
