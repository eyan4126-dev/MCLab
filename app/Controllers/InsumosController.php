<?php

namespace App\Controllers;

use App\Models\InsumosModel;

class InsumosController extends BaseController
{
    public function listarInsumos()
    {
        $model = new InsumosModel();

        $risco = $this->request->getGet('risco');

        if ($risco) {
            $dados['insumos'] = $model->buscarPorRisco($risco);
        } else {
            $dados['insumos'] = $model->buscarTodosInsumos();
        }

        return view('estoque', $dados);
    }

    public function cadastrarInsumo()
    {
        $model = new InsumosModel();

        $nome =             $this->request->getPost("nome");
        $risco =            $this->request->getPost("risco");
        $unidade_medida =   $this->request->getPost("unidade_medida");
        $descricao =        $this->request->getPost("descricao");
        $quantidade_atual = $this->request->getPost("quantidade_atual");
        $estoque_minimo =   $this->request->getPost("estoque_minimo");
        $data_validade =    $this->request->getPost("data_validade");

        $model->inserirInsumo($nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade);

        return redirect()->to(base_url('estoque'));
    }

    public function atualizarInsumo()
    {
        $model = new InsumosModel();

        $id = $this->request->getPost("id");
        $nome = $this->request->getPost("nome");
        $risco = $this->request->getPost("risco");
        $unidade_medida = $this->request->getPost("unidade_medida");
        $descricao = $this->request->getPost("descricao");
        $quantidade_atual = $this->request->getPost("quantidade_atual");
        $estoque_minimo = $this->request->getPost("estoque_minimo");
        $data_validade = $this->request->getPost("data_validade");

        if($model->atualizarInsumo($id, $nome, $risco, $unidade_medida, $descricao, $quantidade_atual, $estoque_minimo, $data_validade)) {
            return redirect()->to(base_url('estoque'))->with('msg', 'Insumo editado com sucesso!');
        };
    }
}
