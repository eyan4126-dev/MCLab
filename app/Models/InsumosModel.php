<?php

namespace App\Models;

use CodeIgniter\Model;

class InsumosModel extends Model
{
    protected $table = "insumos";
    protected $primaryKey = "id";

    public function buscarTodosInsumos()
    {
        return $this->findAll();
    }

    public function buscarInsumoPorId($id)
    {
        return $this->find($id);
    }

    public function buscarPorRisco($risco)
    {
        return $this->where('risco', $risco)->findAll();
    }

    public function atualizarInsumo($id, $nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade)
    {
        $db = \Config\Database::connect();

        $sql = "UPDATE insumos SET nome = ?, risco = ?, unidade_medida = ?, descricao = ?, quantidade_atual = ?, estoque_minimo = ?, data_validade = ?
                WHERE id = ?";

        return $db->query($sql, [$nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade, $id]);
    }

    public function inserirInsumo($nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade)
    {
        $db = \Config\Database::connect();

        $sql = "INSERT INTO insumos (nome, risco, unidade_medida, descricao, quantidade_atual, estoque_minimo, data_validade) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        return $db->query($sql, [$nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade]);
    }
}
