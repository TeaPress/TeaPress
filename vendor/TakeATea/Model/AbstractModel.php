<?php

namespace TakeATea\Model;

abstract class AbstractModel
{
    /**
     * Exchange array to data
     * @param array $data
     * @return \TakeATea\Model\AbstractModel
     */
    public function exchangeArray(array $data)
    {
        $attributes = get_object_vars($this);
        foreach($attributes as $attribute => $value) {
            if(isset($data[$attribute])) {
                $this->{$attribute} = $data[$attribute];
            } else {
                $this->{$attribute} = null;
            }
        }
        return $this;
    }
    
    /**
     * Transform object to array
     * @return array
     */
    public function toArray()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
    
    /**
     * Get copy array
     * @return array
     */
    public function getArrayCopy()
    {
        return $this->toArray();
    }
}