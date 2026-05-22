<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* ------ ROTAS GET PARA REDIRECIONAMENTO DE PÁGINA ------ */

// rota para página de login
$routes->get('/', 'LoginController::index');

//rota para página de cadastro de usuário
$routes->get('cadastrar','LoginCOntroller::cadastro');

//rota para página de erro de login
$routes->get('erro','LoginController::erro');

// rota do login/sidebar para página do home
$routes->get('home','Home::home');

// rota do sidebar para página do estoque
$routes->get('estoque','InsumosController::listarInsumos');

// rota do sidebar para página das movimentações
$routes->get('movimentacoes','Home::listarMovimentacoes');


/* ------ ROTAS POST PARA ENVIO DE DADOS ------ */

// rota dos dados de login
$routes->post('autenticar','LoginController::autenticar');

//rota dos dados de cadastro de usuário
$routes->post('cadastrar','LoginController::cadastrar');

// rota dos dados de cadastro de insumos
$routes->post('cadastrar_insumo','InsumosController::cadastrarInsumo');

// rota dos dados de edição de insumos
$routes->post('editar_insumo/(:num)','InsumosController::atualizarInsumo');

// rota do modal de edição de insumo para estoque atualizado
$routes->post('estoque','InsumosController::atualizarInsumo');

// rota dos dados de cadastro de movimentações
$routes->post('cadastrar_movimentacao','Home::cadastrarMovimentacao');
