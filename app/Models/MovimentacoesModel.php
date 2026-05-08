<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentacoesModel extends Model
{
    protected $table = 'movimentacoes';
    protected $primaryKey = 'id';

    public function buscarTodasMovimentacoes()
    {
        $db = \Config\Database::connect();

        $sql = "SELECT id, insumo_id, usuario_id, tipo, quantidade, data_movimentacao, observacao FROM movimentacoes";

        return $db->query($sql)->getResultArray();
    }

    public function cadastrarMovimentacao($insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao)
    {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO movimentacoes (insumo_id, usuario_id, tipo, quantidade, data_movimentacao, observacao) VALUES (?, ?, ?, ?, ?, ?)";

        return $db->query($sql, [$insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao]);
    }
}

