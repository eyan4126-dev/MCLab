<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{

    public function getResumo()
    {
        $db = \Config\Database::connect();

        return [
            'total' => $db->query("SELECT COUNT(*) as total FROM insumos")->getRow()->total,
            'risco_alto' => $db->query("SELECT COUNT(*) as total FROM insumos WHERE risco = 'alto'")->getRow()->total,
            'estoque_baixo' => $db->query("SELECT COUNT(*) as total FROM insumos WHERE quantidade_atual < estoque_minimo")->getRow()->total,
            'movimentacoes' => $db->query("SELECT COUNT(*) as total FROM movimentacoes")->getRow()->total,
        ];
    }
}
