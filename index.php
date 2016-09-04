<?php

$client = new SoapClient( 'http://mri-dev.com/webservice-soap/server/?wsdl' );

$re = $client->Test();

echo '<pre>';
print_r(json_decode($re, true));
print_r(json_decode($client->HotelNumbers(10), true));
