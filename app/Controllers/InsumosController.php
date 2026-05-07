<?php

namespace App\Controllers;

use App\Models\InsumosModel;

class InsumosController extends BaseController
{
    public function listarInsumos()
    {
        $model = new InsumosModel();

        $dados['insumos'] = $model->buscarTodosInsumos();

        return view('estoque', $dados);
    }
    public function cadastrarInsumo()
    {
        $model = new InsumosModel();

        $nome = $this->request->getPost("nome");
        $risco = $this->request->getPost("risco");
        $unidade_medida = $this->request->getPost("unidade_medida");
        $descricao = $this->request->getPost("descricao");
        $quantidade_atual = $this->request->getPost("quantidade_atual");
        $estoque_minimo = $this->request->getPost("estoque_minimo");
        $data_validade = $this->request->getPost("data_validade");

        $model->inserirInsumo($nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade);

        return redirect()->to(base_url('estoque'));
    }

    public function filtrarEstoque()
    {
        $model = new InsumosModel();

        // pega o filtro da URL
        $risco = $this->request->getGet('risco');

        // se existir filtro
        if ($risco) {

            $insumos = $model
                ->where('risco', $risco)
                ->findAll();

        } else {

            // sem filtro = todos
            $insumos = $model->findAll();
        }

        return view('estoque', [
            'insumos' => $insumos
        ]);
    }
}
