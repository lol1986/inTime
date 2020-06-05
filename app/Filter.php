<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Filter extends Model

{
    public function __construct($class)
    {
        $this->class=$class;
        $this->parameters=$class->getPrintable();
    }

    public function setParameters($parameters){
        $this->parameters=$parameters;
    }
    
    public function getParameters(){
        return $this->parameters;
    }

    public function filter()
    {
        $params = $this->parameters;
        $fields="";
        foreach($params as $param){
            $fields.=$param.', ';
        }
        $fields=substr($fields,0,strlen($fields)-2);

        $query= "select ".$fields." from ".$this->class->getAlias();
       // dd($fields);
        //DB::select($query);

    }

}
