<?php

namespace App\Controllers;
use App\Models\MovimentacoesModel;
use App\Models\UsuariosModel;
use App\Models\DashboardModel;

class Home extends BaseController
{
    public function home(): string
    {
        $model = new DashboardModel();

        $data['resumo'] = $model->getResumo();

        return view('home', $data);
    }

    public function listarMovimentacoes()
    {
        $model = new MovimentacoesModel();

        $tipo = $this->request->getGet('tipo');

        if ($tipo) {
            $dados['movimentacoes'] = $model->buscarMovimentacaoPorTipo($tipo);
        } else {
            $dados['movimentacoes'] = $model->buscarTodasMovimentacoes();
        }

        return view('movimentacoes', $dados);
    }

    public function cadastrarMovimentacao()
    {
        $model = new MovimentacoesModel();

        $insumo_id = $this->request->getPost("insumo_id");
        $usuario_id = $this->request->getPost("usuario_id");
        $tipo = $this->request->getPost("tipo");
        $quantidade = $this->request->getPost("quantidade");
        $data_movimentacao = $this->request->getPost("data_movimentacao");
        $observacao = $this->request->getPost("estoque_minimo");

        $model->cadastrarMovimentacao($insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao);

        return redirect()->to(base_url('movimentacoes'));
    }
}
