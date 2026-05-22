<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    protected function getUsuariosModel()
    {
        return new UsuariosModel();
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }

    public function autenticar()
    {
        $model = $this->getUsuariosModel();

        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        $usuario = $model->autenticar($usuario, $senha);

        if ($usuario) {
            return redirect()->to(base_url('home'));
        } else {
            return redirect()->to(base_url('erro'));
        }
    }

    public function cadastrar()
    {
        $model = $this->getUsuariosModel();

        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        $usuario = $model->cadastrar($usuario, $senha);

        if ($usuario) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->to(base_url('erro'));
        }
    }

    public function erro(): string
    {
        return view('erro');
    }

    public function cadastro(): string
    {
        return view('cadastro');
    }
}
