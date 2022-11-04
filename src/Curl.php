<?php

namespace APP;

use MercadoPago\SDK;

class Curl{

    public $token;
    public $authorization;
    public $url;

    public function __construct(){

        $this->token = SDK::getAccessToken();
        $this->authorization = 'Bearer';

    }

    public function setProp($prop, $value){
        $this->$prop = $value;
    }
    
    public function getResponse(){

        $url = "{$this->url}";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: {$this->authorization} {$this->token}",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        
        return $resp;

    }


}

