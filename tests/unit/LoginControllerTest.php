<?php

use PHPUnit\Framework\TestCase;
use App\Models\UsuariosModel;
use App\Controllers\LoginController;
use CodeIgniter\HTTP\IncomingRequest;

class LoginControllerTest extends TestCase
{
    public function testAutenticacaoComSucesso()
    {
        // mock do model
        $mockModel = $this->createMock(UsuariosModel::class);

        // simula login válido
        $mockModel->method('autenticar')
            ->willReturn(true);

        // mock parcial do controller
        $controller = $this->getMockBuilder(LoginController::class)
            ->onlyMethods(['getUsuariosModel'])
            ->getMock();

        // substitui model real pelo mock
        $controller->method('getUsuariosModel')
            ->willReturn($mockModel);

        // mock da request
        $request = $this->createMock(IncomingRequest::class);

        // simula dados enviados no POST
        $request->method('getPost')
            ->willReturnMap([
                ['usuario', null, 'daniel'],
                ['senha', null, '123']
            ]);

        //injeta request no controller
        $controller->setRequest($request);

        // executa método
        $response = $controller->autenticar();

        // verifica resposta
        $this->assertEquals(base_url('home'),
            $response->getHeaderLine('Location')
        );
    }

    public function testAutenticacaoComCamposVazios()
    {
        // mock do model
        $mockModel = $this->createMock(UsuariosModel::class);

        // simula falha no login
        $mockModel->method('autenticar')
            ->willReturn(false);

        // mock do controller
        $controller = $this->getMockBuilder(LoginController::class)
            ->onlyMethods(['getUsuariosModel'])
            ->getMock();

        // substitui model real pelo mock
        $controller->method('getUsuariosModel')
            ->willReturn($mockModel);

        // mock do request
        $request = $this->createMock(IncomingRequest::class);

        // simula campos vazios
        $request->method('getPost')
            ->willReturnMap([
                ['usuario', null, ''],
                ['senha', null, '']
            ]);

        // injeta request no controller
        $controller->setRequest($request);

        // executa método
        $response = $controller->autenticar();

        // verifica redirect pra erro
        $this->assertEquals(base_url('erro'),
            $response->getHeaderLine('Location')
        );
    }

    public function testAutenticacaoComEntradaInvalida()
    {
        // mock do model
        $mockModel = $this->createMock(UsuariosModel::class);

        // simula falha na autenticação
        $mockModel->method('autenticar')
            ->willReturn(false);

        // mock parcial do controller
        $controller = $this->getMockBuilder(LoginController::class)
            ->onlyMethods(['getUsuariosModel'])
            ->getMock();

        // substitui model real
        $controller->method('getUsuariosModel')
            ->willReturn($mockModel);

        // mock da request
        $request = $this->createMock(IncomingRequest::class);

        // simula entrada inválida
        $request->method('getPost')
            ->willReturnMap([
                ['usuario', null, ['array_invalido']],
                ['senha', null, 12345]
            ]);

        // injeta request
        $controller->setRequest($request);

        // executa método
        $response = $controller->autenticar();

        // verifica redirect pra erro
        $this->assertEquals(
            base_url('erro'),
            $response->getHeaderLine('Location')
        );
    }
}
?>