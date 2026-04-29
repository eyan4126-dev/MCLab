<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        #return view('index');
        return view('index');
    }

    public function autenticar()
    {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario == 'admin' && $senha == '1234') {
            return view('dashboard');
        } else {
            return view('index');
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

}
