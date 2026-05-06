<?php

namespace App\Controllers;
use App\Models\UsuariosModel;

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
        $senha = $this->request->getPost('usuario');

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
            return redirect()->to(base_url('dashboard'));
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

}
