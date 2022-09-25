<?php

namespace App\Router;

class Route
{
public function __construct($path, $callable){
    $this->path = $path;
    $this->callable = $callable;
}
}