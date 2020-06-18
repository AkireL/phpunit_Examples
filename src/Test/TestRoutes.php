<?php
use Slim\Http\Environment;
use Slim\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * Test URL
 */

class TestRoutes extends TestCase
{
    protected $app;

    /**
     *  En el método setUp() 
     *  es donde creamos el objeto 
     *  contra el que probaremos. 
     */
    public function setUp():void
    {
        $this->app = (new App\Main\App())->get();
    }

    public function testTodoGet() {
        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI'    => '/',
            ]);
        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);
        $this->assertSame($response->getStatusCode(), 200);
        $this->assertSame((string)$response->getBody(), "Hello, Todo");
    } 

}


/**
 * Para ejecurtar todas las pruebas completamente
 * ../../vendor/bin/phpunit --bootstrap ../../vendor/autoload.php ../Test
 */