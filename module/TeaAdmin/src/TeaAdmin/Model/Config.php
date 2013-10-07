<?php

namespace TeaAdmin\Model;

use TakeATea\Model\AbstractModel;

class Config extends AbstractModel
{
    protected $config_id;
    protected $path;
    protected $value;
    
    public function getConfigId() {
        return $this->config_id;
    }

    public function setConfigId($config_id) {
        $this->config_id = $config_id;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }
}