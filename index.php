<?php

try{
    ini_set("soap.wsdl_cache_enabled", 0);
    $client = new SoapClient( 'http://mri-dev.com/webservice-soap/server/?wsdl' );

    $re = $client->HotelNumbers(1);

}catch(SOAPFault $s){
     echo $s->getMessage();
}




echo '<pre>';
print_r(json_decode($re, true));
