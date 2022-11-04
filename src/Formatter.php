<?php 

namespace APP;

class Formatter{

    public function jsonToObject($json){

        return json_decode($json);

    }

}