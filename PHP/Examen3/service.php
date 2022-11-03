<?php
    alert('PHPHPHPHPHP');
    if (isset($_POST['numero'])) {
        // $url = 'https://www.dataaccess.com/webservicesserver/numberconversion.wso';
        // $uri = 'https://www.dataaccess.com/webservicesserver/';
        $cliente = new SoapClient('https://www.dataaccess.com/webservicesserver/numberconversion.wso?WSDL');
        $letras = $cliente->NumberToWords($_POST['numero']);
        return $letras;
    }
?>