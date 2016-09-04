<?php
    class Server
    {
        public function __construct()
        {
        }
        public function Test( $param = array() )
        {
            return $this->output(__FUNCTION__, $param);
        }

        public function HotelNumbers($num = 1)
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
        $autodiscover = new Zend_Soap_AutoDiscover();
        $autodiscover->setClass( 'Server' );
        $autodiscover->handle();
    } else {
        $soap = new SoapServer(null, array(
            'uri' => 'http://mri-dev.com/webservice-soap/server/'
        ));
        $soap->setClass('Server');
        $soap->handle();
    }


?>
