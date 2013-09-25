<?php

namespace TakeATea\Model;

abstract class AbstractModel
{    
    public function exchangeArray(array $data)
    {
        $attributes = get_object_vars($this);
        foreach($attributes as $attribute => $value) {
            if(isset($data[$attribute])) {
                $this->{$attribute} = $data[$attribute];
            }
        }
        return $this;
    }
    
    public function toArray()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}