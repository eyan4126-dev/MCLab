<?php

namespace App\Models;

use CodeIgniter\Model;

class InsumosModel extends Model
{
    protected $table = "insumos";
    protected $primaryKey = "id";

    public function buscarTodosInsumos()
    {
        $db = \Config\Database::connect();

        $sql = "SELECT id, nome, risco, unidade_medida, descricao, quantidade_atual, estoque_minimo, data_validade FROM insumos";

        return $db->query($sql)->getResultArray();
    }

    public function inserirInsumo($nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade)
    {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO insumos (nome, risco, unidade_medida, descricao, quantidade_atual, estoque_minimo, data_validade) VALUES (?, ?, ?, ?, ?, ?, ?)";

        return $db->query($sql, [$nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade]);
    }

}
