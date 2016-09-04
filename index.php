<?php

$client = new SoapClient( null, array(
    'location' => 'http://mri-dev.com/webservice-soap/server/',
    'uri' => 'http://mri-dev.com/webservice-soap/server/'
) );

$re = $client->Test();

echo '<pre>';
print_r(json_decode($re, true));
print_r(json_decode($client->HotelNumbers(10), true));
