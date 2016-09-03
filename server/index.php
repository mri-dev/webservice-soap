<?php
class Server
{
    public function __construct()
    {
    }
    public function Test()
    {
        return 'MRIDEV';
    }
}
$params = array(
    'uri' => '/home/mridevco/public_html/webservice-soap/server/index.php'
);
$soap = new SoapServer(NULL, $params);
$soap->setClass('server');
$soap->handle();
