<?php
    require_once '../../zend/library/Zend/Loader/StandardAutoloader.php';
    $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
    $loader->register();

    ini_set("soap.wsdl_cache_enabled", 0);
    class Server
    {
        public function __construct()
        {
        }
        /**
         * Test object function
         * @return string
         * */
        public function Test()
        {
            //return 'TEST';
            return $this->output(__FUNCTION__, $param);
        }
        /**
         * Return hotel numbers
         * @param int $num Numbers of hotel to generate
         * @return string
         * */
        public function HotelNumbers($num)
        {
            $rooms = array();
            while($num >= 1 ){
                $rooms[] = $num . '.' .md5(microtime());
                $num--;
            }
           $rooms = array_reverse($rooms);
            return $this->output(__FUNCTION__, $rooms);
        }

        private function output( $function, $data = array() )
        {
            $back               = array();
            $back[serviceName]  = $function;
            $back[error]        = false;
            $back[error_msg]    = false;

            $back['result'] = $data;
            return json_encode( $back, JSON_UNESCAPED_UNICODE );
        }
    }

    if( isset( $_GET['wsdl'] ) )
    {
        $autodiscover = new Zend\Soap\AutoDiscover();
        $autodiscover->setClass( 'Server' );
        $autodiscover->setUri('http://mri-dev.com/webservice-soap/server/');
        $autodiscover->handle();
    } else {
        $soap = new Zend\Soap\Server("http://mri-dev.com/webservice-soap/server/?wsdl");
        $soap->setClass('Server');
        $soap->handle();
    }
?>
