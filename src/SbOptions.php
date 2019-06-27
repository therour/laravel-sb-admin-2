<?php

namespace Therour\SbAdmin2;

use Illuminate\Support\Arr;

class SbOptions
{
    protected $options = [];

    public function __construct()
    {
        //
    }

    public function get($name)
    {
        return Arr::get($this->options, strtolower($name));
    }

    public function set($name, $value)
    {
        Arr::set($this->options, strtolower($name), $value);
    }

    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    public function __get($name)
    {
        return $this->get($name);
    }
}