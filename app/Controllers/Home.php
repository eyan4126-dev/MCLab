<?php

namespace App\Controllers;
use App\Models\MovimentacoesModel;
use App\Models\UsuariosModel;
use App\Models\InsumosModel;
use App\Models\DashboardModel;

class Home extends BaseController
{
    public function index(): string
    {
        #return view('index');
        return view('index');
    }

    public function autenticar()
    {
        $model = new UsuariosModel();

        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        $usuario = $model->autenticar($usuario, $senha);

        if ($usuario) {
            return redirect()->to(base_url('dashboard'));
        } else {
            return redirect()->to(base_url('erro'));
        }
    }

    public function cadastrar()
    {
        $model = new UsuariosModel();

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $usuario = $model->cadastrar($usuario, $senha);

        if ($usuario) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->to(base_url('erro'));
        }
    }

    public function dashboard(): string
    {
        $model = new DashboardModel();

        $data['resumo'] = $model->getResumo();

        return view('dashboard', $data);
    }

    public function cadastro(): string
    {
        return view('cadastro');
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
