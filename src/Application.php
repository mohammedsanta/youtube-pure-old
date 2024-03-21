<?php
namespace Santa;

use Santa\Database\DB;
use Santa\Http\Routes;
use Santa\Http\Request;
use Santa\Http\Response;
use Santa\Support\Session;
use Santa\Database\Manager\MySQLManager;

class Application
{

    public Routes $route;
    public Request $request;
    public Response $response;
    public Session $session;
    public DB $db;

    public function __construct()
    {

        $this->request = new Request;
        $this->response = new Response;
        $this->session = new Session;
        $this->route = new Routes($this->request,$this->response);
        $this->db = new DB($this->getConfigurations());

    }

    protected function getConfigurations()
    {
        return match('mysql'){
            'mysql' => new MySQLManager,
        };
    }

    public function run()
    {
        $this->db->init();
        $this->route->dispatch();
    }

}