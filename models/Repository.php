<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Repository implements IModel
{
    protected $props = [];

    public function __set($name, $value)
    {
        //TODO разрешать менять только те поля, что есть в params
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        //TODO разрешать читать только те поля, что есть в params
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }


}