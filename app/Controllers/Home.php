<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\InsumosModel;

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
        return view('dashboard');
    }

    public function cadastro_insumo(): string
    {
        return view('cadastrar_insumo');
    }

    public function estoque(): string
    {
        return view('estoque');
    }

    public function movimentacoes(): string
    {
        return view('movimentacoes');
    }

    public function cadastro(): string
    {
        return view('cadastro');
    }

    public function cadastrarMovimentacao()
    {
        $model = new InsumosModel();

        $insumo_id = $this->request->getPost("insumo_id");
        $usuario_id = $this->request->getPost("usuario_id");
        $tipo = $this->request->getPost("tipo");
        $quantidade = $this->request->getPost("quantidade");
        $data_movimentacao = $this->request->getPost("data_movimentacao");
        $observacao = $this->request->getPost("estoque_minimo");

        $model->cadastrarMovimentacao($insumo_id, $usuario_id, $tipo, $quantidade, $data_movimentacao, $observacao);

        return redirect()->to(base_url('estoque'));
    }

    //controller para filtrar consulta de estoque
    /* public function estoqueFiltros()
    {
        $risco = $this->request->getGet('risco');

        $model = new InsumosModel();

        if ($risco) {
            $data['insumos'] = $model->where('risco', $risco)->findAll();
        } else {
            $data['insumos'] = $model->findAll();
        }

        return view('estoque', $data);
    } */

}
