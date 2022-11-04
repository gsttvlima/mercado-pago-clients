<?php 

namespace APP;

use MercadoPago\Customer;
use APP\Curl;

class Costumer{

    public $fields;

    public function setProp($prop, $value){
        $this->$prop = $value;
    }

    public function saveCostumer(){

        $customer = new Customer();
        $customer->email = $this->fields['email'];
        $customer->first_name = $this->fields['first_name'];
        $customer->last_name = $this->fields['last_name'];
        $customer->save();

    }

    public function updateCostumer(){

        $customer = new Customer();
        $customer->email = $this->fields['email'];
        $customer->first_name = $this->fields['first_name'];
        $customer->last_name = $this->fields['last_name'];
        $customer->update();

    }

    public function deleteCostumer(){

        $customer = new Customer();
        $customer->id = $this->fields['id'];
        $customer->delete();

    }

    public function getCostumers(){

        $filters = @http_build_query($this->fields);

        $curl = new Curl();
        $curl->setProp('url','https://api.mercadopago.com/v1/customers/search?'.$filters);
        return $curl->getResponse();
        

    }


}