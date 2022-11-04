<?php 

namespace APP;

use MercadoPago\Customer;
use APP\Curl;

class Client{

    public $fields;

    public function setProp($prop, $value){
        $this->$prop = $value;
    }

    public function saveClient(){

        $client = new Customer();
        $client->email = $this->fields['email'];
        $client->first_name = $this->fields['first_name'];
        $client->last_name = $this->fields['last_name'];
        $client->save();

    }

    public function updateClient(){

        $client = new Customer();
        $client->email = $this->fields['email'];
        $client->first_name = $this->fields['first_name'];
        $client->last_name = $this->fields['last_name'];
        $client->update();

    }

    public function deleteClient(){

        $client = new Customer();
        $client->id = $this->fields['id'];
        $client->delete();

    }

    public function getClients(){

        $filters = @http_build_query($this->fields);

        $curl = new Curl();
        $curl->setProp('url','https://api.mercadopago.com/v1/customers/search?'.$filters);
        return $curl->getResponse();
        

    }


}