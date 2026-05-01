<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// rota do sidebar para o dashboard
$routes->get('dashboard','Home::dashboard');

// rota do sidebar para o estoque com READ dos insumos
$routes->get('estoque','InsumosController::listarInsumos');

// rota do sidebar para as movimentações
$routes->get('movimentacoes','Home::movimentacoes');

// rota para o usuario fazer login
$routes->post('autenticar','Home::autenticar');

//rota para página de erro de login
$routes->get('erro','Home::autenticar');

//rota para cadastrar usuario
$routes->get('cadastrar','Home::cadastro');

// rota para cadastrar insumos no BD
$routes->post('cadastrar_insumo','InsumosController::cadastrarInsumo');



