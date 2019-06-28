<?php

namespace Therour\SbAdmin2;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        $name = Str::snake($name);
        $this->set($name, $value);
    }

    public function __get($name)
    {
        $name = Str::snake($name);
        return $this->get($name);
    }
}