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

        $sql = "SELECT m.id, m.usuario_id, m.tipo, m.quantidade, m.data_movimentacao, m.observacao, i.nome AS insumo_nome, u.usuario AS usuario_nome
                FROM movimentacoes m
                INNER JOIN insumos i ON i.id = m.insumo_id
                INNER JOIN usuarios u ON u.id = m.usuario_id";

        return $db->query($sql)->getResultArray();
    }

    public function buscarMovimentacaoPorTipo($tipo)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT m.id, m.usuario_id, m.tipo, m.quantidade, m.data_movimentacao, m.observacao, i.nome AS insumo_nome, u.usuario AS usuario_nome
                FROM movimentacoes m
                INNER JOIN insumos i ON i.id = m.insumo_id
                INNER JOIN usuarios u ON u.id = m.usuario_id
                WHERE m.tipo = ?";

        return $db->query($sql, [$tipo])->getResultArray();
    }

    public function cadastrarMovimentacao($insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao)
    {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO movimentacoes (insumo_id, usuario_id, tipo, quantidade, data_movimentacao, observacao) VALUES (?, ?, ?, ?, ?, ?)";

        return $db->query($sql, [$insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao]);
    }
}

